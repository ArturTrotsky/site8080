<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 70);
            $table->integer('naimen_id');
            $table->integer('kabinet_id');
            $table->integer('group_id');
            $table->integer('periodPpr')->default(0);
            $table->integer('periodTo')->default(0);
            $table->integer('periodVerification')->default(0);
            $table->double('cenaKalibrovki', 7, 2)->default(0);
            $table->string('kodKalibrovki', 30)->default(0);
            $table->double('cenaPoverki', 7, 2)->default(0);
            $table->string('kodPoverki', 30)->default(0);
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
        Schema::dropIfExists('types');
    }
}
