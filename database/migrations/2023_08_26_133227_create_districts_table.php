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

        Schema::create('districts', function (Blueprint $table) {
            $table->integer('maqh');
            $table->string('name');
            $table->string('type');
            $table->integer('matp');
            $table->primary(['maqh']);
            $table->foreign('matp')
                ->references('matp')->on('cities')
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
