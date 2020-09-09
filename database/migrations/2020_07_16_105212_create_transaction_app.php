<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionApp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table){
            $table->uuid('id')->index();
            $table->date('tgl_pelaporan');
            // $table->uuid('area_id');
            $table->string('baseline_id', 24);
            $table->string('minggu_ke', 2);
            $table->string('tipe_konstruksi', 2);
            $table->string('tipe_tangki');
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('tinggi');
            $table->integer('diameter');
            $table->integer('km_sa');
            $table->integer('km_ts');
            $table->integer('km_ta');
            $table->string('pengadaan', 2);
            $table->string('note_pengadaan', 255);
            $table->string('pelaksanaan', 2);
            $table->string('note_pelaksanaan', 255);
            $table->date('tgl_realisasi_awal');
            $table->date('tgl_realisasi_akhir')->nullable();
            $table->string('progres_fisik', 8);
            $table->integer('jml_ts');
            $table->integer('jml_ts_50');
            $table->integer('jml_ts_akumulasi');
            $table->uuid('pelaksana_id');
            $table->string('created_by', 16);
            $table->string('verified_1_title', 255);
            $table->string('verified_1_by', 255);
            $table->string('verified_2_by', 255);
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
            $table->foreign('baseline_id')
                ->references('id')
                ->on('baselines')
                ->onDelete('cascade');

            $table->foreign('pelaksana_id')
                ->references('id')
                ->on('pelaksanas')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
