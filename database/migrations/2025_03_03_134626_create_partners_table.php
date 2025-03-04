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
        Schema::create('partners', function (Blueprint $table) {
            $table->id('partner_id');
            $table->string('full_name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 15);
            $table->string('password', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->boolean('verified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
