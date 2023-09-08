<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('wards', function (Blueprint $table) {
            $table->integer('xaid');
            $table->string('name');
            $table->string('type');
            $table->integer('maqh');
            $table->primary(['xaid']);
            $table->foreign('maqh')
            ->references('maqh')->on('districts')
            ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
