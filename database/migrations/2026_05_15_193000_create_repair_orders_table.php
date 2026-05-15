<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repair_orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('external_id')->unique()
                ->comment('ordenes.id en Postgres local de la app Java');

            $table->string('customer_name', 120);
            $table->char('customer_phone_last4', 4)->nullable();

            $table->string('equipment', 120);
            $table->string('serial', 80)->nullable();
            $table->text('problem')->nullable();
            $table->text('public_notes')->nullable();

            $table->unsignedTinyInteger('status_code');
            $table->string('status_label', 40);

            $table->string('technician_name', 80)->nullable();

            $table->date('received_at');
            $table->date('promised_at')->nullable();
            $table->date('delivered_at')->nullable();

            $table->timestamp('last_synced_at')->nullable();
            $table->timestamps();

            $table->index('status_code');
            $table->index('received_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repair_orders');
    }
};
