<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RepairOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RepairOrderController extends Controller
{
    /**
     * Upsert por UUID: crea o actualiza la orden y registra el cambio
     * de estado en el historial si cambió respecto a la última fila.
     */
    public function upsert(Request $request): JsonResponse
    {
        $data = $request->validate([
            'uuid' => ['required', 'uuid'],
            'external_id' => ['required', 'integer', 'min:1'],
            'customer_name' => ['required', 'string', 'max:120'],
            'customer_phone_last4' => ['nullable', 'string', 'size:4'],
            'equipment' => ['required', 'string', 'max:120'],
            'serial' => ['nullable', 'string', 'max:80'],
            'problem' => ['nullable', 'string'],
            'public_notes' => ['nullable', 'string'],
            'status_code' => ['required', 'integer', 'between:1,99'],
            'status_label' => ['nullable', 'string', 'max:40'],
            'technician_name' => ['nullable', 'string', 'max:80'],
            'received_at' => ['required', 'date'],
            'promised_at' => ['nullable', 'date'],
            'delivered_at' => ['nullable', 'date'],
        ]);

        $data['status_label'] = $data['status_label']
            ?? config("anica.status_map.{$data['status_code']}.label", 'Estado '.$data['status_code']);
        $data['last_synced_at'] = now();

        $order = DB::transaction(function () use ($data) {
            $order = RepairOrder::firstOrNew(['uuid' => $data['uuid']]);
            $previousStatus = $order->exists ? $order->status_code : null;

            $order->fill($data)->save();

            if ($previousStatus !== $order->status_code) {
                $order->history()->create([
                    'status_code' => $order->status_code,
                    'status_label' => $order->status_label,
                    'changed_at' => now(),
                ]);
            }

            return $order;
        });

        return response()->json([
            'uuid' => $order->uuid,
            'public_url' => url('/consulta/'.$order->uuid),
            'status_code' => $order->status_code,
            'status_label' => $order->status_label,
            'synced_at' => $order->last_synced_at->toIso8601String(),
        ], 200);
    }

    /**
     * Registrar un cambio de estado explícito (con su timestamp original
     * de la app Java, distinto al "ahora" del servidor).
     */
    public function recordStatus(Request $request, string $uuid): JsonResponse
    {
        $data = $request->validate([
            'status_code' => ['required', 'integer', 'between:1,99'],
            'status_label' => ['nullable', 'string', 'max:40'],
            'changed_at' => ['required', 'date'],
        ]);

        $order = RepairOrder::where('uuid', $uuid)->firstOrFail();

        $data['status_label'] = $data['status_label']
            ?? config("anica.status_map.{$data['status_code']}.label", 'Estado '.$data['status_code']);

        $order->history()->create([
            'status_code' => $data['status_code'],
            'status_label' => $data['status_label'],
            'changed_at' => $data['changed_at'],
        ]);

        $order->update([
            'status_code' => $data['status_code'],
            'status_label' => $data['status_label'],
            'last_synced_at' => now(),
        ]);

        return response()->json([
            'uuid' => $order->uuid,
            'status_code' => $order->status_code,
            'status_label' => $order->status_label,
        ]);
    }

    public function show(string $uuid): JsonResponse
    {
        $order = RepairOrder::with('history')->where('uuid', $uuid)->firstOrFail();

        return response()->json($order);
    }
}
