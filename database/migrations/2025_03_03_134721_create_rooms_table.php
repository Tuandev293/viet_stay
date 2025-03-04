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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->unsignedBigInteger('property_id');
            $table->string('name', 50);
            $table->decimal('size', 5, 2);
            $table->tinyInteger('bed_count')->unsigned();
            $table->decimal('price', 15, 2);
            $table->integer('quantity')->unsigned();
            $table->text('cancellation_policy');

            // Foreign Key
            $table->foreign('property_id')->references('property_id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
