<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrafiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grafiks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('next_id')->nullable();
            $table->integer('sit_id');
            $table->integer('work_id');
            $table->integer('status_id');
            $table->integer('laboratory_id');
            $table->integer('laboratoryMesto_id');
            $table->date('datePlanWork');
            $table->date('dateInbox')->nullable();
            $table->date('dateOutbox')->nullable();
            $table->integer('protocol_id')->nullable();
            $table->date('dateFactWork')->nullable();
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
        Schema::dropIfExists('grafiks');
    }
}
