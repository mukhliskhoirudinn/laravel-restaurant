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
        Schema::create('vidios', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('vidio_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vidios');
    }
};
