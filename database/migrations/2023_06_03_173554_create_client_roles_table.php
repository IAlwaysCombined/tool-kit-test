<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')
                ->nullable()
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->foreignId('client_id')
                ->nullable()
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_roles');
    }
};