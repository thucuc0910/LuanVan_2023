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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('provider_code')->unique();
            $table->string('provider_name');
            $table->string('provider_email');
            $table->string('provider_phone', length: 10);
            $table->string('provider_city');
            $table->string('provider_district');
            $table->string('provider_ward');
            $table->string('provider_street');
            $table->tinyInteger('status')->default('1')->comment('1=visible,9=hidden');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
