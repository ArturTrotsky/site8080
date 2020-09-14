<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type_id');
            $table->string('number', 30);
            $table->string('pohibka', 30);
            $table->integer('podrazdelenie_id');
            $table->integer('brigade_id');
            $table->integer('status_id');
            $table->string('diapazon', 20);
            $table->integer('edizm_id');
            $table->double('minShkaly', 10, 4);
            $table->double('maxShkaly', 10, 4);
            $table->integer('work_id');
            $table->integer('periodMetrology');
            $table->integer('laboratory_id');
            $table->integer('laboratoryObladnannya_id');
            $table->integer('laboratoryMesto_id');
            $table->date('dateLastWork');
            $table->date('dateNextWork')->nullable();
            $table->date('dateBirka')->nullable();
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
        Schema::dropIfExists('sits');
    }
}
