<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('vaccination_id')->unsigned();
            $table->foreign('vaccination_id')
                ->references('id')->on('vaccination')
                ->onDelete('cascade');
            $table->timestamps();
            $table->primary(['user_id', 'vaccination_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccination_user');
    }
}
