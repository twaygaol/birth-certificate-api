<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kurang Mampu</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 14px;
        }
        #print {
            width: 900px;
            margin: auto;
        }
        #print h1, h2, h3, h4 {
            margin: 0;
            text-align: center;
        }
        #print table {
            width: 100%;
            margin: 10px 0;
        }
        #logo {
            width: 100px;
            height: 100px;
        }
        .ttd {
            float: right;
            width: 250px;
            text-align: center;
            margin-top: 30px;
        }
        hr {
            border: 3px double #000;
        }
    </style>
</head>
<body>

<div id="print">
    <table>
        <tr>
            <td><img src="{{ asset('deliserdang1.jpg') }}" id="logo"></td>
            <td style="text-align: center">
                <h1>PEMERINTAH KOTA MEDAN</h1>
                <h2>KECAMATAN MEDAN PETISAH</h2>
                <p style="font-size:14px;"><i>Alamat : Jl. Pabrik Padi No. 9A Medan Petisah</i></p>
            </td>
        </tr>
    </table>

    <hr>

    <h1>Surat Keterangan Kurang Mampu</h1>
    <h4>Nomor: 470 / KM / 2024</h4>

    <p>Kepala Kelurahan Sei Putih Timur I Kecamatan Medan Petisah dengan ini menerangkan bahwa:</p>

    <table>
        <tr>
            <td>Nama Lengkap</td>
            <td>: {{ $surat->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>: {{ $surat->nim }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $surat->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $surat->tempat_tgl_lahir }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $surat->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Tempat Sekolah</td>
            <td>: {{ $surat->tempat_sekolah }}</td>
        </tr>
        <tr>
            <td>Tempat Tinggal</td>
            <td>: {{ $surat->tempat_tinggal }}</td>
        </tr>
        <tr>
            <td>Nama Ayah</td>
            <td>: {{ $surat->nama_ayah }}</td>
        </tr>
        <tr>
            <td>Pekerjaan Ayah</td>
            <td>: {{ $surat->pekerjaan_ayah }}</td>
        </tr>
        <tr>
            <td>Penghasilan Ayah</td>
            <td>: {{ $surat->penghasilan_ayah }}</td>
        </tr>
        <tr>
            <td>Nama Ibu</td>
            <td>: {{ $surat->nama_ibu }}</td>
        </tr>
        <tr>
            <td>Pekerjaan Ibu</td>
            <td>: {{ $surat->pekerjaan_ibu }}</td>
        </tr>
        <tr>
            <td>Penghasilan Ibu</td>
            <td>: {{ $surat->penghasilan_ibu }}</td>
        </tr>
        <tr>
            <td>Tanggungan Anak</td>
            <td>: {{ $surat->tanggungan_anak }}</td>
        </tr>
        <tr>
            <td>Tanggal Surat</td>
            <td>: {{ $surat->tanggal_surat }}</td>
        </tr>
    </table>

    <p>Orang tersebut di atas adalah benar warga Kelurahan Sei Putih Timur I yang berdomisili tetap di alamat yang telah disebutkan, dan berdasarkan data yang ada, orang tersebut termasuk dalam golongan kurang mampu. Surat ini dibuat untuk digunakan sebagaimana mestinya.</p>

    <div class="ttd">
        <p><strong>Kepala Kelurahan Sei Putih Timur I</strong></p>
        <br><br><br><br>
        <p><strong><u>TTD</u></strong></p>
    </div>
</div>

<script>
    // Perintah untuk memicu dialog cetak setelah halaman dimuat
    window.onload = function() {
        window.print();
    };
</script>

</body>
</html>
