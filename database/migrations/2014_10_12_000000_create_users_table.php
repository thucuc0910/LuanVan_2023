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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->Unique()->nullable();
            $table->string('email')->Unique()->nullable();
            $table->string('password')->nullable();
            $table->string('picture')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->enum('status',['Pending','Active'])->default('Pending');
            $table->string('payment_method')->nullable();
            $table->string('email_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
