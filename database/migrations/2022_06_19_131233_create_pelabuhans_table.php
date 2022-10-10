<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelabuhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelabuhans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelabuhan_id');
            $table->date('tanggal');
            $table->string('berangkatordatang');
            $table->string('jmltrip_berangkat');
            $table->string('e_pnp_berangkat');
            $table->string('e_r2_berangkat');
            $table->string('e_r4_berangkat');
            $table->string('e_bus_berangkat');
            $table->string('e_truk_berangkat');
            $table->string('jmltrip_datang');
            $table->string('e_pnp_datang');
            $table->string('e_r2_datang');
            $table->string('e_r4_datang');
            $table->string('e_bus_datang');
            $table->string('e_truk_datang');
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
        Schema::dropIfExists('pelabuhans');
    }
}
