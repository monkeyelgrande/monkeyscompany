<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'uuid',
    'external_id',
    'customer_name',
    'customer_phone_last4',
    'equipment',
    'serial',
    'problem',
    'public_notes',
    'status_code',
    'status_label',
    'technician_name',
    'received_at',
    'promised_at',
    'delivered_at',
    'last_synced_at',
])]
class RepairOrder extends Model
{
    protected function casts(): array
    {
        return [
            'received_at' => 'date',
            'promised_at' => 'date',
            'delivered_at' => 'date',
            'last_synced_at' => 'datetime',
            'status_code' => 'integer',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function history(): HasMany
    {
        return $this->hasMany(RepairStatusHistory::class)->orderBy('changed_at');
    }

    public function statusBadgeClass(): string
    {
        return config("anica.status_map.{$this->status_code}.color")
            ?? 'bg-surface-container text-on-surface-variant';
    }
}
