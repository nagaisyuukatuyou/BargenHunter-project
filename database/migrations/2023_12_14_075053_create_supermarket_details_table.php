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
        Schema::create('supermarket_details', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('supermarket_id')->constrained();
            $table->string('nearest_station', 100);
            $table->string('web_site', 100);
            $table->string('phone_number', 100)->unique()->nullable();
            $table->string('address', 100)->unique();
            $table->string('close_time', 100);
            $table->string('open_time', 100);
            $table->timestamps();
            $table->primary('supermarket_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supermarket_details');
    }
};
