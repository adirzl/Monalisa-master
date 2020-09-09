<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'tgl_pelaporan' => 'required|date',
            'baseline_id' => 'required|string',
            // 'minggu_ke' => 'required|numeric',

            'tipe_konstruksi' => 'required|string',
            'tipe_tangki' => 'required|string',
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',

            'tinggi' => 'required|numeric',
            'diameter' => 'numeric',
            'km_sa' => 'required|numeric',
            'km_ts' => 'required|numeric',

            'km_ta' => 'required|numeric',
            'pengadaan' => 'required|string',
            // 'note_pengadaan' => 'string',
            // 'pelaksanaan' => 'required|string',

            // 'note_pelaksanaan' => 'string',
            'tgl_realisasi_awal' => 'required|date',
            'tgl_realisasi_akhir' => 'date|nullable',
            // 'progres_fisik' => 'required|numeric',

            // 'jml_ts' => 'required|numeric',
            // 'jml_ts_50' => 'required|numeric',
            // 'pelaksana_id' => 'required|string',
            // 'jml_ts_akumulasi' => 'required|numeric',

            'verified_1_title' => 'required|string',
            'verified_1_by' => 'required|string',
            'verified_2_by' => 'required|string',

            // 'jml_ts_img' => 'required|image',
            // 'jml_ts_50_img' => 'required|image',
            // 'jml_ts_akumulasi_img' => 'required|image',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'tgl_pelaporan.required' => __('validation.required', ['attribute' => 'Tgl Pelaporan']),
            'tgl_pelaporan.date' => __('validation.date', ['attribute' => 'Tgl Pelaporan']),

            'baseline_id.required' => __('validation.required', ['attribute' => 'ID Baseline']),
            'baseline_id.string' => __('validation.string', ['attribute' => 'ID Baseline']),
            'baseline_id.unique' => __('validation.unique', ['attribute' => 'ID Baseline']),

            'minggu_ke.required' => __('validation.required', ['attribute' => 'Minggu ke']),
            'minggu_ke.numeric' => __('validation.numeric', ['attribute' => 'Minggu ke']),

            'tipe_konstruksi.string' => __('validation.string', ['attribute' => 'Jenis Konstruksi Tangki Septik']),
            'tipe_konstruksi.required' => __('validation.required', ['attribute' => 'Jenis Konstruksi Tangki Septik']),


            'tipe_tangki.required' => __('validation.required', ['attribute' => 'Jenis Tangki Septik ']),
            'tipe_tangki.date' => __('validation.date', ['attribute' => 'Jenis Tangki Septik ']),

            'panjang.required' => __('validation.required', ['attribute' => 'Panjang']),
            'panjang.numeric' => __('validation.numeric', ['attribute' => 'Panjang']),

            'lebar.required' => __('validation.required', ['attribute' => 'Lebar']),
            'lebar.numeric' => __('validation.numeric', ['attribute' => 'Lebar']),

            'tinggi.string' => __('validation.string', ['attribute' => 'Tinggi']),
            'tinggi.required' => __('validation.required', ['attribute' => 'Tinggi']),


            'diameter.string' => __('validation.string', ['attribute' => 'Diameter']),

            'km_sa.required' => __('validation.required', ['attribute' => 'Kamar mandi sudah ada (unit)']),
            'km_sa.numeric' => __('validation.numeric', ['attribute' => 'Kamar mandi sudah ada (unit)']),

            'km_ts.required' => __('validation.required', ['attribute' => 'Kamar mandi Termasuk dalam pembangunan TS (unit)']),
            'km_ts.numeric' => __('validation.numeric', ['attribute' => 'Kamar mandi Termasuk dalam pembangunan TS (unit)']),

            'km_ta.string' => __('validation.string', ['attribute' => 'Kamar mandi tidak ada ']),
            'km_ta.required' => __('validation.required', ['attribute' => 'Kamar mandi tidak ada ']),


            'pelaksana_id.required' => __('validation.required', ['attribute' => 'Pelaksana']),
            'pelaksana_id.string' => __('validation.string', ['attribute' => 'Pelaksana']),

            'pengadaan.required' => __('validation.required', ['attribute' => 'Pengadaan Barang/material']),
            'pengadaan.string' => __('validation.string', ['attribute' => 'Pengadaan Barang/material']),

            'pelaksanaan.required' => __('validation.required', ['attribute' => 'Pelaksanaan Kegiatan Pembangunan']),
            'pelaksanaan.string' => __('validation.string', ['attribute' => 'Pelaksanaan Kegiatan Pembangunan']),

            'tgl_realisasi_awal.date' => __('validation.date', ['attribute' => 'Tanggal Realisasi Mulai Pekerjaan']),
            'tgl_realisasi_awal.required' => __('validation.required', ['attribute' => 'Tanggal Realisasi Mulai Pekerjaan']),


            'tgl_realisasi_akhir.required' => __('validation.required', ['attribute' => 'Tanggal Realisasi Akhir Pekerjaan']),
            'tgl_realisasi_akhir.date' => __('validation.date', ['attribute' => 'Tanggal Realisasi Akhir Pekerjaan']),

            'progres_fisik.required' => __('validation.required', ['attribute' => 'Progres Fisik (%)']),
            'progres_fisik.numeric' => __('validation.numeric', ['attribute' => 'Progres Fisik (%)']),

            'jml_ts.required' => __('validation.required', ['attribute' => 'Jumlah TS Mulai terbangun dalam minggu ini (unit)']),
            'jml_ts.numeric' => __('validation.numeric', ['attribute' => 'Jumlah TS Mulai terbangun dalam minggu ini (unit)']),

            'jml_ts_50.numeric' => __('validation.numeric', ['attribute' => 'Jumlah TS dengan  progres fisik +/- 50% dalam minggu ini (unit)']),
            'jml_ts_50.required' => __('validation.required', ['attribute' => 'Jumlah TS dengan  progres fisik +/- 50% dalam minggu ini (unit)']),

            'jml_ts_akumulasi.numeric' => __('validation.numeric', ['attribute' => 'Akumulasi jumlah TS progres fisik +/- 100%  (unit)']),
            'jml_ts_akumulasi.required' => __('validation.required', ['attribute' => 'Akumulasi jumlah TS progres fisik +/- 100%  (unit)']),

            'verified_1_title.string' => __('validation.string', ['attribute' => 'Nama Dinas Pemeriksa']),
            'verified_1_title.required' => __('validation.required', ['attribute' => 'Nama Dinas Pemeriksa']),

            'verified_1_by.string' => __('validation.string', ['attribute' => 'Nama Pemeriksa 1']),
            'verified_1_by.required' => __('validation.required', ['attribute' => 'Nama Pemeriksa 1']),

            'verified_2_by.string' => __('validation.string', ['attribute' => 'Nama Pemeriksa 2']),
            'verified_2_by.required' => __('validation.required', ['attribute' => 'Nama Pemeriksa 2']),

            'jml_ts_img.image' => __('validation.image', ['attribute' => 'Lampiran Jumlah TS Mulai terbangun dalam minggu ini']),
            'jml_ts_img.required' => __('validation.required', ['attribute' => 'Lampiran Jumlah TS Mulai terbangun dalam minggu ini']),

            'jml_ts_50_img.image' => __('validation.image', ['attribute' => 'Lampiran Jumlah TS dengan  progres fisik +/- 50% dalam minggu ini']),
            'jml_ts_50_img.required' => __('validation.required', ['attribute' => 'Lampiran Jumlah TS dengan  progres fisik +/- 50% dalam minggu ini']),

            'jml_ts_akumulasi_img.image' => __('validation.image', ['attribute' => 'Lampiran Akumulasi jumlah TS progres fisik +/- 100%']),
            'jml_ts_akumulasi_img.required' => __('validation.required', ['attribute' => 'Lampiran Akumulasi jumlah TS progres fisik +/- 100%']),
        ];
    }
}
