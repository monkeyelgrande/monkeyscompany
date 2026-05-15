<?php

namespace App\Http\Controllers;

use App\Models\RepairOrder;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ConsultaController extends Controller
{
    public function show(string $uuid): View|Response
    {
        $order = RepairOrder::with('history')
            ->where('uuid', $uuid)
            ->first();

        if (! $order) {
            return response()->view('pages.consulta-not-found', [], 404);
        }

        return view('pages.consulta', compact('order'));
    }
}
