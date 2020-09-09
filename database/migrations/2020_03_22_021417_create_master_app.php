<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterApp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('name', 255);
            $table->string('type', 4);
            $table->uuid('parent_id')->nullable();
            $table->smallInteger('status');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
        });

        Schema::create('pelaksanas', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->string('name', 255);
            $table->string('phone', 32);
            $table->decimal('nilai_kontrak', 18, 2);
            $table->string('spmk_no', 32);
            $table->date('spmk_date');
            $table->date('spmk_start_date');
            $table->smallInteger('status');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
        });

        Schema::create('baselines', function (Blueprint $table) {
            $table->string('id', 24)->index();
            $table->string('kec', 255);
            $table->string('kel', 255);
            $table->string('nama', 255);
            $table->string('alamat', 255);
            $table->string('nama_responden', 255);

            $table->string('kesesuaian_alamat', 255);
            $table->string('hubungan_keluarga', 255);
            $table->string('jenis_kelamin', 255);
            $table->string('tempat_melakukan_bab', 255);
            $table->string('tempat_pembuangan_dari_wc', 255);

            $table->string('material_dinding_ts', 255);
            $table->string('material_dasar_ts', 255);
            $table->string('pembangunan_ts', 255);
            $table->string('pengurasan_tangki_terakhir', 255);
            $table->string('ketersediaan_lahan', 255);

            $table->string('septik_komunal', 255);
            $table->string('ketersediaan_air_bersih', 255);
            $table->string('kesediaan_mengikuti', 255);
            $table->string('iuran_bulanan', 255);
            $table->string('hasil_survey', 255);

            $table->string('alasan_ineligible', 255);
            $table->string('lainnya', 255);
            $table->string('latitude', 255);
            $table->string('longitude', 255);
            $table->string('tgl_survey', 255);

            $table->string('kepemilikan_ts', 255);
            $table->string('syarat_teknis_ts', 255);

            $table->smallInteger('status');

            $table->primary('id');
        });

        Schema::create('configurations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('key', 255);
            $table->string('value', 255);
            $table->text('notes');
            $table->smallInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
