<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoTable extends Migration
{
    public function up()
    {
        Schema::create('appo', function (Blueprint $table) {
            $table->id();
            $table->dateTime('Date_heure_');
            $table->string('nom_patient_');
            $table->string('nom_medecin_');
            $table->string('nom_secretaire_');
            $table->string('nom_acte_');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appo');
    }
}
