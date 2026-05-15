<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repair_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repair_order_id')
                ->constrained('repair_orders')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('status_code');
            $table->string('status_label', 40);
            $table->dateTime('changed_at');

            $table->timestamps();

            $table->index(['repair_order_id', 'changed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repair_status_history');
    }
};
