<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id('id_f');
            $table->unsignedBigInteger('appo_id');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('appo_id')->references('id')->on('appo')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures');
    }
}
