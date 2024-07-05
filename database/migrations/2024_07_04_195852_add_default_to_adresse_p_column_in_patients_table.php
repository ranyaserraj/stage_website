<?php
// database/migrations/YYYY_MM_DD_add_default_to_adresse_p_column_in_patients_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultToAdressePColumnInPatientsTable extends Migration
{
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('adresse_p')->default('Adresse inconnue')->change();
        });
    }

    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('adresse_p')->nullable()->change();
        });
    }
}

