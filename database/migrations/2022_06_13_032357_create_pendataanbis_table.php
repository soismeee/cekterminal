<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendataanbisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendataanbis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('terminal_id');
            $table->string('jml_bis_akap')->nullable();
            $table->string('jml_pnpg_akap')->nullable();
            $table->string('jml_bis_akdp')->nullable();
            $table->string('jml_pnpg_akdp')->nullable();
            $table->string('akaporakdp');
            $table->string('datangorberangkat');
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
        Schema::dropIfExists('pendataanbis');
    }
}
