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
        Schema::create('properties', function (Blueprint $table) {
            $table->id('property_id');
            $table->unsignedBigInteger('partner_id');
            $table->string('name', 100);
            $table->string('address', 255);
            $table->string('city', 50);
            $table->enum('type', ['hotel', 'apartment', 'hostel', 'villa', 'resort']);
            $table->tinyInteger('star_rating')->unsigned();
            $table->text('description');
            $table->time('check_in_time');
            $table->time('check_out_time');
            $table->boolean('smoking_policy')->default(0);
            $table->boolean('pet_policy')->default(0);
            $table->text('child_policy')->nullable();

            // Foreign Key
            $table->foreign('partner_id')->references('partner_id')->on('partners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
