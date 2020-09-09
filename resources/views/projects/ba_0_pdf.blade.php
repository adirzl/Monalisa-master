<html>
    <head>
        <title>BA</title>
        <style>
            .title-pdf{
                text-align: center;
                background-color: yellow;
                padding: 5px 0 5px 0;
            }

            .title-pdf h4{
                margin: 0;  
                padding: 0; 
            }

            .title-head{
                text-align: center;
            }

            .title-desc{
                text-align: justify;
            }

            .header table{
                width: 100%;
            }

            .content table{
                width: 100%;
            }

            .footer-date{
                text-align: center;
            }

            .footer-sign table{
                width: 100%;
                text-align: center
            }

            .footer-sign-plh {
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
        <div class="title-pdf">
            <h4>PROGRAM HIBAH SANITASI</h4>
            <h4>PROGRAM HIBAH AIR LIMBAH SETEMPAT APBN 2020 </h4>
            <h4>Oversight Tahap 1 (0%)</h4>
        </div>
        <div class="title-head">
            <p>Berita Acara Oversight Tahap 1 (0%) - APBN 2020</p>
            <p>No.XXX/BA-Oversight/Tahap-0%/ALS/CEC/{{ Carbon\Carbon::now()->format('F') }}/2020</p>
        </div>
        <div class="title-desc">
            <p>Berita acara pelaksanaan Oversight Tahap 1 (Progres 0%) ini ditandatangani pada hari .....................  untuk mengkonfirmasi bahwa pelaksanaan Oversight Tahap 1 (Progres 0%) telah selesai dilaksanakan dengan rincian sebagai berikut :</p>
        </div>

        <div class="header">
            <table>
                <tr>
                    <td>Provinsi</td><td>: {{ $kabkot->parent_area->name }}</td>
                </tr>
                <tr>
                    <td>Kabupaten/Kota</td><td>: {{ $kabkot->name }}</td>
                </tr>
                <tr>
                    <td>Waktu Oversight</td><td>:............. s.d ..............</td>
                </tr>
                <tr>
                    <td>BA Baseline Eligible</td><td>: {{ $countBaseline }} - Rumah Terlayani</td>
                </tr>
                <tr>
                    <td>Jumlah Target Pasang Tangki Septik</td><td>:.............</td>
                </tr>
                <tr>
                    <td>Jumlah Target Sampling Oversight</td><td>:.............</td>
                </tr>
                <tr>
                    <td>Jumlah Oversight Tahap 0%</td><td>: {{ $countOversight }} - Rumah Terlayani</td>
                </tr>
            </table>
        </div>

        <hr />

        <div class="content">
            <table>
                <tr>
                    <td>I.</td>
                    <td colspan="4">Modul Tangki Septik</td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Individual</td>
                    <td>: {{ $q['1a'] }} RT</td>
                    <td>b. Komunal</td>
                    <td>: {{ $q['1b'] }} RT</td>
                </tr>
                <tr>
                    <td>II.</td>
                    <td colspan="4">Jenis Tangki Septik</td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Cor / Buis Beton</td>
                    <td colspan="3">: {{ $q['2a'] }} RT</td>
                </tr>
                <tr>
                    <td></td>
                    <td>b. Pasangan Bata</td>
                    <td colspan="3">:{{ $q['2b'] }} RT</td>
                </tr>
                <tr>
                    <td></td>
                    <td>c. Fabrikan</td>
                    <td colspan="3">: ………………….. RT</td>
                </tr>

                <tr>
                    <td>III.</td>
                    <td colspan="4">Kesesuaian Tangki Septik dengan DED</td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Sesuai</td>
                    <td>: ………………….. RT</td>
                    <td>b. Tidak Sesuai</td>
                    <td>: ……….. RT</td>
                </tr>

                <tr>
                    <td>IV.</td>
                    <td colspan="4">Kesesuaian Tangki Septik dengan Standar SNI/PU/KAN</td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Sesuai</td>
                    <td>: ………………….. RT</td>
                    <td>b. Tidak Sesuai</td>
                    <td>: ……….. RT</td>
                </tr>

                <tr>
                    <td>V.</td>
                    <td colspan="4">Keberadaan Sertifikat (Khusus Jenis Fabrikan)</td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Ada</td>
                    <td>: ………………….. RT</td>
                    <td>b. Tidak Ada</td>
                    <td>: ……….. RT</td>
                </tr>

                <tr>
                    <td>VI.</td>
                    <td colspan="4">Keberadaan Bilik Toilet / WC </td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Ada</td>
                    <td>: ………………….. RT</td>
                    <td>b. Tidak Ada</td>
                    <td>: ……….. RT</td>
                </tr>

                <tr>
                    <td>VII.</td>
                    <td colspan="4">Kesesuaian Lahan dengan Data Baseline</td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Sesuai</td>
                    <td>: ………………….. RT</td>
                    <td>b. Tidak Sesuai</td>
                    <td>: ……….. RT</td>
                </tr>

                <tr>
                    <td>VIII.</td>
                    <td colspan="4">Bentuk Tangki Septik </td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Kotak</td>
                    <td>: ………………….. RT</td>
                    <td>b. Silinder</td>
                    <td>: ……….. RT</td>
                </tr>

                <tr>
                    <td>IX.</td>
                    <td colspan="4">Status Pembangunan Konstruksi Tangki Septik</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">a.  Galian</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;0% = …….RT </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">b. Lantai Dasar:</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;0% = …….RT </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">c. Ketersediaan Material di Lapangan:</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;0% = …….RT </td>
                </tr>
                <tr>
                    <td></td>
                    <td>d. Jumlah Rerata Pekerja</td>
                    <td colspan="3">: ………………….. Orang</td>
                </tr>
            </table>
        </div>

        <hr />

        <div class="closing">
            <p>Data hasil Oversight Tahap 1 (Progres 0%) terlampir bersama berita acara ini.</p>
            <p>Demikian Berita Acara ini disusun sesuai dengan persyaratan dan ketentuan yang berlaku untuk dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="footer-date">
            {{ $kabkot->name }} / {{ Carbon\Carbon::today()->format('d-F-Y')}}
        </div>

        <div class="footer-sign">
            <table>
                <tr>
                    <td>Pejabat Pembuat Komitmen (PPK) Program Pengembangan Kinerja Pengelolaan Air Limbah</td>
                    <td>Staf Pendamping</td>
                    <td>Local Engineer</td>
                </tr>
                <tr class="footer-sign-plh">
                    <td>( ………………………. )</td>
                    <td>( ………………………. )</td>
                    <td>( ………………………. )</td>
                </tr>
                <tr>
                    <td>NIP. Xxxxxxxx xxxxxx x xxx</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </body>
</html>