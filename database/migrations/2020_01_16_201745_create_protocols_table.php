<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->double('temperature', 3, 1);
            $table->double('davlenie', 4, 1);
            $table->double('valazhnost', 3, 1);
            $table->integer('etalon1_id')->nullable();
            $table->integer('etalon2_id')->nullable();
            $table->integer('etalon3_id')->nullable();
            $table->integer('sit_id');
            $table->integer('work_id');
            $table->integer('laboratory_id');
            $table->integer('grafik_id');
            $table->integer('user_id')->nullable();
            $table->double('valueEtalon11', 10, 5)->nullable();
            $table->double('valueEtalon12', 10, 5)->nullable();
            $table->double('valueEtalon13', 10, 5)->nullable();
            $table->double('valueEtalon14', 10, 5)->nullable();
            $table->double('valueEtalon15', 10, 5)->nullable();
            $table->double('valueEtalon16', 10, 5)->nullable();
            $table->double('valueSitPryamoy11', 10, 5)->nullable();
            $table->double('valueSitPryamoy12', 10, 5)->nullable();
            $table->double('valueSitPryamoy13', 10, 5)->nullable();
            $table->double('valueSitPryamoy14', 10, 5)->nullable();
            $table->double('valueSitPryamoy15', 10, 5)->nullable();
            $table->double('valueSitPryamoy16', 10, 5)->nullable();
            $table->double('valueSitObratniy11', 10, 5)->nullable();
            $table->double('valueSitObratniy12', 10, 5)->nullable();
            $table->double('valueSitObratniy13', 10, 5)->nullable();
            $table->double('valueSitObratniy14', 10, 5)->nullable();
            $table->double('valueSitObratniy15', 10, 5)->nullable();
            $table->double('valueSitObratniy16', 10, 5)->nullable();
            $table->double('valueEtalon21', 10, 5)->nullable();
            $table->double('valueEtalon22', 10, 5)->nullable();
            $table->double('valueEtalon23', 10, 5)->nullable();
            $table->double('valueEtalon24', 10, 5)->nullable();
            $table->double('valueEtalon25', 10, 5)->nullable();
            $table->double('valueEtalon26', 10, 5)->nullable();
            $table->double('valueSitPryamoy21', 10, 5)->nullable();
            $table->double('valueSitPryamoy22', 10, 5)->nullable();
            $table->double('valueSitPryamoy23', 10, 5)->nullable();
            $table->double('valueSitPryamoy24', 10, 5)->nullable();
            $table->double('valueSitPryamoy25', 10, 5)->nullable();
            $table->double('valueSitPryamoy26', 10, 5)->nullable();
            $table->double('valueSitObratniy21', 10, 5)->nullable();
            $table->double('valueSitObratniy22', 10, 5)->nullable();
            $table->double('valueSitObratniy23', 10, 5)->nullable();
            $table->double('valueSitObratniy24', 10, 5)->nullable();
            $table->double('valueSitObratniy25', 10, 5)->nullable();
            $table->double('valueSitObratniy26', 10, 5)->nullable();
            $table->double('valueEtalon31', 10, 5)->nullable();
            $table->double('valueEtalon32', 10, 5)->nullable();
            $table->double('valueEtalon33', 10, 5)->nullable();
            $table->double('valueEtalon34', 10, 5)->nullable();
            $table->double('valueEtalon35', 10, 5)->nullable();
            $table->double('valueEtalon36', 10, 5)->nullable();
            $table->double('valueSitPryamoy31', 10, 5)->nullable();
            $table->double('valueSitPryamoy32', 10, 5)->nullable();
            $table->double('valueSitPryamoy33', 10, 5)->nullable();
            $table->double('valueSitPryamoy34', 10, 5)->nullable();
            $table->double('valueSitPryamoy35', 10, 5)->nullable();
            $table->double('valueSitPryamoy36', 10, 5)->nullable();
            $table->double('valueSitObratniy31', 10, 5)->nullable();
            $table->double('valueSitObratniy32', 10, 5)->nullable();
            $table->double('valueSitObratniy33', 10, 5)->nullable();
            $table->double('valueSitObratniy34', 10, 5)->nullable();
            $table->double('valueSitObratniy35', 10, 5)->nullable();
            $table->double('valueSitObratniy36', 10, 5)->nullable();
            $table->double('valueEtalon41', 10, 5)->nullable();
            $table->double('valueEtalon42', 10, 5)->nullable();
            $table->double('valueEtalon43', 10, 5)->nullable();
            $table->double('valueEtalon44', 10, 5)->nullable();
            $table->double('valueEtalon45', 10, 5)->nullable();
            $table->double('valueEtalon46', 10, 5)->nullable();
            $table->double('valueSitPryamoy41', 10, 5)->nullable();
            $table->double('valueSitPryamoy42', 10, 5)->nullable();
            $table->double('valueSitPryamoy43', 10, 5)->nullable();
            $table->double('valueSitPryamoy44', 10, 5)->nullable();
            $table->double('valueSitPryamoy45', 10, 5)->nullable();
            $table->double('valueSitPryamoy46', 10, 5)->nullable();
            $table->double('valueSitObratniy41', 10, 5)->nullable();
            $table->double('valueSitObratniy42', 10, 5)->nullable();
            $table->double('valueSitObratniy43', 10, 5)->nullable();
            $table->double('valueSitObratniy44', 10, 5)->nullable();
            $table->double('valueSitObratniy45', 10, 5)->nullable();
            $table->double('valueSitObratniy46', 10, 5)->nullable();
            $table->double('valueEtalon51', 10, 5)->nullable();
            $table->double('valueEtalon52', 10, 5)->nullable();
            $table->double('valueEtalon53', 10, 5)->nullable();
            $table->double('valueEtalon54', 10, 5)->nullable();
            $table->double('valueEtalon55', 10, 5)->nullable();
            $table->double('valueEtalon56', 10, 5)->nullable();
            $table->double('valueSitPryamoy51', 10, 5)->nullable();
            $table->double('valueSitPryamoy52', 10, 5)->nullable();
            $table->double('valueSitPryamoy53', 10, 5)->nullable();
            $table->double('valueSitPryamoy54', 10, 5)->nullable();
            $table->double('valueSitPryamoy55', 10, 5)->nullable();
            $table->double('valueSitPryamoy56', 10, 5)->nullable();
            $table->double('valueSitObratniy51', 10, 5)->nullable();
            $table->double('valueSitObratniy52', 10, 5)->nullable();
            $table->double('valueSitObratniy53', 10, 5)->nullable();
            $table->double('valueSitObratniy54', 10, 5)->nullable();
            $table->double('valueSitObratniy55', 10, 5)->nullable();
            $table->double('valueSitObratniy56', 10, 5)->nullable();
            $table->double('valueEtalon61', 10, 5)->nullable();
            $table->double('valueEtalon62', 10, 5)->nullable();
            $table->double('valueEtalon63', 10, 5)->nullable();
            $table->double('valueEtalon64', 10, 5)->nullable();
            $table->double('valueEtalon65', 10, 5)->nullable();
            $table->double('valueEtalon66', 10, 5)->nullable();
            $table->double('valueSitPryamoy61', 10, 5)->nullable();
            $table->double('valueSitPryamoy62', 10, 5)->nullable();
            $table->double('valueSitPryamoy63', 10, 5)->nullable();
            $table->double('valueSitPryamoy64', 10, 5)->nullable();
            $table->double('valueSitPryamoy65', 10, 5)->nullable();
            $table->double('valueSitPryamoy66', 10, 5)->nullable();
            $table->double('valueSitObratniy61', 10, 5)->nullable();
            $table->double('valueSitObratniy62', 10, 5)->nullable();
            $table->double('valueSitObratniy63', 10, 5)->nullable();
            $table->double('valueSitObratniy64', 10, 5)->nullable();
            $table->double('valueSitObratniy65', 10, 5)->nullable();
            $table->double('valueSitObratniy66', 10, 5)->nullable();
            $table->double('valueEtalon71', 10, 5)->nullable();
            $table->double('valueEtalon72', 10, 5)->nullable();
            $table->double('valueEtalon73', 10, 5)->nullable();
            $table->double('valueEtalon74', 10, 5)->nullable();
            $table->double('valueEtalon75', 10, 5)->nullable();
            $table->double('valueEtalon76', 10, 5)->nullable();
            $table->double('valueSitPryamoy71', 10, 5)->nullable();
            $table->double('valueSitPryamoy72', 10, 5)->nullable();
            $table->double('valueSitPryamoy73', 10, 5)->nullable();
            $table->double('valueSitPryamoy74', 10, 5)->nullable();
            $table->double('valueSitPryamoy75', 10, 5)->nullable();
            $table->double('valueSitPryamoy76', 10, 5)->nullable();
            $table->double('valueSitObratniy71', 10, 5)->nullable();
            $table->double('valueSitObratniy72', 10, 5)->nullable();
            $table->double('valueSitObratniy73', 10, 5)->nullable();
            $table->double('valueSitObratniy74', 10, 5)->nullable();
            $table->double('valueSitObratniy75', 10, 5)->nullable();
            $table->double('valueSitObratniy76', 10, 5)->nullable();
            $table->double('valueEtalon81', 10, 5)->nullable();
            $table->double('valueEtalon82', 10, 5)->nullable();
            $table->double('valueEtalon83', 10, 5)->nullable();
            $table->double('valueEtalon84', 10, 5)->nullable();
            $table->double('valueEtalon85', 10, 5)->nullable();
            $table->double('valueEtalon86', 10, 5)->nullable();
            $table->double('valueSitPryamoy81', 10, 5)->nullable();
            $table->double('valueSitPryamoy82', 10, 5)->nullable();
            $table->double('valueSitPryamoy83', 10, 5)->nullable();
            $table->double('valueSitPryamoy84', 10, 5)->nullable();
            $table->double('valueSitPryamoy85', 10, 5)->nullable();
            $table->double('valueSitPryamoy86', 10, 5)->nullable();
            $table->double('valueSitObratniy81', 10, 5)->nullable();
            $table->double('valueSitObratniy82', 10, 5)->nullable();
            $table->double('valueSitObratniy83', 10, 5)->nullable();
            $table->double('valueSitObratniy84', 10, 5)->nullable();
            $table->double('valueSitObratniy85', 10, 5)->nullable();
            $table->double('valueSitObratniy86', 10, 5)->nullable();
            $table->double('valueEtalon91', 10, 5)->nullable();
            $table->double('valueEtalon92', 10, 5)->nullable();
            $table->double('valueEtalon93', 10, 5)->nullable();
            $table->double('valueEtalon94', 10, 5)->nullable();
            $table->double('valueEtalon95', 10, 5)->nullable();
            $table->double('valueEtalon96', 10, 5)->nullable();
            $table->double('valueSitPryamoy91', 10, 5)->nullable();
            $table->double('valueSitPryamoy92', 10, 5)->nullable();
            $table->double('valueSitPryamoy93', 10, 5)->nullable();
            $table->double('valueSitPryamoy94', 10, 5)->nullable();
            $table->double('valueSitPryamoy95', 10, 5)->nullable();
            $table->double('valueSitPryamoy96', 10, 5)->nullable();
            $table->double('valueSitObratniy91', 10, 5)->nullable();
            $table->double('valueSitObratniy92', 10, 5)->nullable();
            $table->double('valueSitObratniy93', 10, 5)->nullable();
            $table->double('valueSitObratniy94', 10, 5)->nullable();
            $table->double('valueSitObratniy95', 10, 5)->nullable();
            $table->double('valueSitObratniy96', 10, 5)->nullable();
            $table->double('valueEtalon101', 10, 5)->nullable();
            $table->double('valueEtalon102', 10, 5)->nullable();
            $table->double('valueEtalon103', 10, 5)->nullable();
            $table->double('valueEtalon104', 10, 5)->nullable();
            $table->double('valueEtalon105', 10, 5)->nullable();
            $table->double('valueEtalon106', 10, 5)->nullable();
            $table->double('valueSitPryamoy101', 10, 5)->nullable();
            $table->double('valueSitPryamoy102', 10, 5)->nullable();
            $table->double('valueSitPryamoy103', 10, 5)->nullable();
            $table->double('valueSitPryamoy104', 10, 5)->nullable();
            $table->double('valueSitPryamoy105', 10, 5)->nullable();
            $table->double('valueSitPryamoy106', 10, 5)->nullable();
            $table->double('valueSitObratniy101', 10, 5)->nullable();
            $table->double('valueSitObratniy102', 10, 5)->nullable();
            $table->double('valueSitObratniy103', 10, 5)->nullable();
            $table->double('valueSitObratniy104', 10, 5)->nullable();
            $table->double('valueSitObratniy105', 10, 5)->nullable();
            $table->double('valueSitObratniy106', 10, 5)->nullable();
            $table->double('valueEtalon111', 10, 5)->nullable();
            $table->double('valueEtalon112', 10, 5)->nullable();
            $table->double('valueEtalon113', 10, 5)->nullable();
            $table->double('valueEtalon114', 10, 5)->nullable();
            $table->double('valueEtalon115', 10, 5)->nullable();
            $table->double('valueEtalon116', 10, 5)->nullable();
            $table->double('valueSitPryamoy111', 10, 5)->nullable();
            $table->double('valueSitPryamoy112', 10, 5)->nullable();
            $table->double('valueSitPryamoy113', 10, 5)->nullable();
            $table->double('valueSitPryamoy114', 10, 5)->nullable();
            $table->double('valueSitPryamoy115', 10, 5)->nullable();
            $table->double('valueSitPryamoy116', 10, 5)->nullable();
            $table->double('valueSitObratniy111', 10, 5)->nullable();
            $table->double('valueSitObratniy112', 10, 5)->nullable();
            $table->double('valueSitObratniy113', 10, 5)->nullable();
            $table->double('valueSitObratniy114', 10, 5)->nullable();
            $table->double('valueSitObratniy115', 10, 5)->nullable();
            $table->double('valueSitObratniy116', 10, 5)->nullable();
            $table->double('valueEtalon121', 10, 5)->nullable();
            $table->double('valueEtalon122', 10, 5)->nullable();
            $table->double('valueEtalon123', 10, 5)->nullable();
            $table->double('valueEtalon124', 10, 5)->nullable();
            $table->double('valueEtalon125', 10, 5)->nullable();
            $table->double('valueEtalon126', 10, 5)->nullable();
            $table->double('valueSitPryamoy121', 10, 5)->nullable();
            $table->double('valueSitPryamoy122', 10, 5)->nullable();
            $table->double('valueSitPryamoy123', 10, 5)->nullable();
            $table->double('valueSitPryamoy124', 10, 5)->nullable();
            $table->double('valueSitPryamoy125', 10, 5)->nullable();
            $table->double('valueSitPryamoy126', 10, 5)->nullable();
            $table->double('valueSitObratniy121', 10, 5)->nullable();
            $table->double('valueSitObratniy122', 10, 5)->nullable();
            $table->double('valueSitObratniy123', 10, 5)->nullable();
            $table->double('valueSitObratniy124', 10, 5)->nullable();
            $table->double('valueSitObratniy125', 10, 5)->nullable();
            $table->double('valueSitObratniy126', 10, 5)->nullable();
            $table->double('valueEtalon131', 10, 5)->nullable();
            $table->double('valueEtalon132', 10, 5)->nullable();
            $table->double('valueEtalon133', 10, 5)->nullable();
            $table->double('valueEtalon134', 10, 5)->nullable();
            $table->double('valueEtalon135', 10, 5)->nullable();
            $table->double('valueEtalon136', 10, 5)->nullable();
            $table->double('valueSitPryamoy131', 10, 5)->nullable();
            $table->double('valueSitPryamoy132', 10, 5)->nullable();
            $table->double('valueSitPryamoy133', 10, 5)->nullable();
            $table->double('valueSitPryamoy134', 10, 5)->nullable();
            $table->double('valueSitPryamoy135', 10, 5)->nullable();
            $table->double('valueSitPryamoy136', 10, 5)->nullable();
            $table->double('valueSitObratniy131', 10, 5)->nullable();
            $table->double('valueSitObratniy132', 10, 5)->nullable();
            $table->double('valueSitObratniy133', 10, 5)->nullable();
            $table->double('valueSitObratniy134', 10, 5)->nullable();
            $table->double('valueSitObratniy135', 10, 5)->nullable();
            $table->double('valueSitObratniy136', 10, 5)->nullable();
            $table->double('valueEtalon141', 10, 5)->nullable();
            $table->double('valueEtalon142', 10, 5)->nullable();
            $table->double('valueEtalon143', 10, 5)->nullable();
            $table->double('valueEtalon144', 10, 5)->nullable();
            $table->double('valueEtalon145', 10, 5)->nullable();
            $table->double('valueEtalon146', 10, 5)->nullable();
            $table->double('valueSitPryamoy141', 10, 5)->nullable();
            $table->double('valueSitPryamoy142', 10, 5)->nullable();
            $table->double('valueSitPryamoy143', 10, 5)->nullable();
            $table->double('valueSitPryamoy144', 10, 5)->nullable();
            $table->double('valueSitPryamoy145', 10, 5)->nullable();
            $table->double('valueSitPryamoy146', 10, 5)->nullable();
            $table->double('valueSitObratniy141', 10, 5)->nullable();
            $table->double('valueSitObratniy142', 10, 5)->nullable();
            $table->double('valueSitObratniy143', 10, 5)->nullable();
            $table->double('valueSitObratniy144', 10, 5)->nullable();
            $table->double('valueSitObratniy145', 10, 5)->nullable();
            $table->double('valueSitObratniy146', 10, 5)->nullable();
            $table->double('valueEtalon151', 10, 5)->nullable();
            $table->double('valueEtalon152', 10, 5)->nullable();
            $table->double('valueEtalon153', 10, 5)->nullable();
            $table->double('valueEtalon154', 10, 5)->nullable();
            $table->double('valueEtalon155', 10, 5)->nullable();
            $table->double('valueEtalon156', 10, 5)->nullable();
            $table->double('valueSitPryamoy151', 10, 5)->nullable();
            $table->double('valueSitPryamoy152', 10, 5)->nullable();
            $table->double('valueSitPryamoy153', 10, 5)->nullable();
            $table->double('valueSitPryamoy154', 10, 5)->nullable();
            $table->double('valueSitPryamoy155', 10, 5)->nullable();
            $table->double('valueSitPryamoy156', 10, 5)->nullable();
            $table->double('valueSitObratniy151', 10, 5)->nullable();
            $table->double('valueSitObratniy152', 10, 5)->nullable();
            $table->double('valueSitObratniy153', 10, 5)->nullable();
            $table->double('valueSitObratniy154', 10, 5)->nullable();
            $table->double('valueSitObratniy155', 10, 5)->nullable();
            $table->double('valueSitObratniy156', 10, 5)->nullable();
            $table->double('valueEtalon161', 10, 5)->nullable();
            $table->double('valueEtalon162', 10, 5)->nullable();
            $table->double('valueEtalon163', 10, 5)->nullable();
            $table->double('valueEtalon164', 10, 5)->nullable();
            $table->double('valueEtalon165', 10, 5)->nullable();
            $table->double('valueEtalon166', 10, 5)->nullable();
            $table->double('valueSitPryamoy161', 10, 5)->nullable();
            $table->double('valueSitPryamoy162', 10, 5)->nullable();
            $table->double('valueSitPryamoy163', 10, 5)->nullable();
            $table->double('valueSitPryamoy164', 10, 5)->nullable();
            $table->double('valueSitPryamoy165', 10, 5)->nullable();
            $table->double('valueSitPryamoy166', 10, 5)->nullable();
            $table->double('valueSitObratniy161', 10, 5)->nullable();
            $table->double('valueSitObratniy162', 10, 5)->nullable();
            $table->double('valueSitObratniy163', 10, 5)->nullable();
            $table->double('valueSitObratniy164', 10, 5)->nullable();
            $table->double('valueSitObratniy165', 10, 5)->nullable();
            $table->double('valueSitObratniy166', 10, 5)->nullable();
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
        Schema::dropIfExists('protocols');
    }
}
