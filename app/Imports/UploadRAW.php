<?php

namespace App\Imports;

use App\Models\Baseline;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UploadRAW implements ToModel, WithStartRow
{
    public $kabkot_id;

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 5;
    }
    
    public function __construct($kabkot_id)
    {
        $this->kabkot_id = $kabkot_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Baseline::firstOrCreate([
            'id' => $row[1] != '' ? $row[1] : null,
            'kec' => $row[2] != '' ? $row[2] : null,
            'kel_id' =>  substr($row[1], 1, 10) != '' ?  substr($row[1], 1, 10) : null,
            'kel' => $row[4] != '' ? $row[4] : null,
            'nama' => $row[5] != '' ? $row[5] : null,
            'alamat' => $row[6] != '' ? $row[6] : null,
            'nama_responden' => $row[7] != '' ? $row[7] : null,
            'kesesuaian_alamat' => $row[8] != '' ? $row[8] : null,
            'hubungan_keluarga' => $row[9] != '' ? $row[9] : null,
            'jenis_kelamin' => $row[10] != '' ? $row[10] : null,
            'tempat_melakukan_bab' => $row[11] != '' ? $row[11] : null,
            'tempat_pembuangan_dari_wc' => $row[12] != '' ? $row[12] : null,
            'material_dinding_ts' => $row[13] != '' ? $row[13] : null,
            'material_dasar_ts' => $row[14] != '' ? $row[14] : null,
            'pembangunan_ts' => $row[15] != '' ? $row[15] : null,
            'pengurasan_tangki_terakhir' => $row[16] != '' ? $row[16] : null,
            'ketersediaan_lahan' => $row[17] != '' ? $row[17] : null,
            'septik_komunal' => $row[18] != '' ? $row[18] : null,
            'ketersediaan_air_bersih' => $row[19] != '' ? $row[19] : null,
            'kesediaan_mengikuti' => $row[20] != '' ? $row[20] : null,
            'iuran_bulanan' => $row[21] != '' ? $row[21] : null,
            'hasil_survey' => $row[22] != '' ? $row[22] : null,
            'alasan_ineligible' => $row[23] != '' ? $row[23] : null,
            'lainnya' => $row[24] != '' ? $row[24] : null,
            'latitude' => $row[25] != '' ? $row[25] : null,
            'longitude' => $row[26] != '' ? $row[26] : null,
            'tgl_survey' => $row[27] != '' ? $row[27] : null,
            'kepemilikan_ts' => $row[28] != '' ? $row[28] : null,
            'syarat_teknis_ts' => $row[29] != '' ? $row[29] : null,
        ]);
    }
}
