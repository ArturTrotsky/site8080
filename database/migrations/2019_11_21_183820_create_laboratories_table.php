<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->unique();
            $table->string('name_full')->nullable()->unique();
            $table->string('address', 200)->nullable();
            $table->string('dir_posada')->nullable();
            $table->string('dir_name', 30)->nullable();
            $table->string('edrpou', 20)->nullable();
            $table->string('tel', 50)->nullable();
            $table->string('iban', 50)->nullable();
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
        Schema::dropIfExists('laboratories');
    }
}
