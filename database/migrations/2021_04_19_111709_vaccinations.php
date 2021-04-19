<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vaccinations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('starttime');
            $table->string('endtime');
            $table->integer('max_participants')->default('10');
            $table->string('vaccination_type');
            $table->bigInteger('vaccination_place')->unsigned();
            $table->foreign('vaccination_place')
                ->references('id')->on('vaccination_places')
                ->onDelete('cascade');
            $table->timestamps();
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
}
