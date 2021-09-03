<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phonenumber');
            $table->string('lga');
            $table->string('fever');
            $table->string('musclepain');
            $table->string('chestpain');
            $table->string('diarrohea');
            $table->string('nausea');
            $table->string('cough');
            $table->string('vomitting');
            $table->string('headache');
            $table->string('sorethroat');
            $table->string('loc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('phonenumber');
            $table->dropColumn('lga');
            $table->dropColumn('fever');
            $table->dropColumn('musclepain');
            $table->dropColumn('chestpain');
            $table->dropColumn('diarrohea');
            $table->dropColumn('nausea');
            $table->dropColumn('cough');
            $table->dropColumn('vomitting');
            $table->dropColumn('headache');
            $table->dropColumn('sorethroat');
            $table->dropColumn('loc');







        });
    }
}
