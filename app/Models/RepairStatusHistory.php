<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['repair_order_id', 'status_code', 'status_label', 'changed_at'])]
class RepairStatusHistory extends Model
{
    protected $table = 'repair_status_history';

    protected function casts(): array
    {
        return [
            'changed_at' => 'datetime',
            'status_code' => 'integer',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(RepairOrder::class, 'repair_order_id');
    }
}
