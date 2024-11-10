<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Meninggal Dunia</title>
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

    <h1>Surat Keterangan Meninggal Dunia</h1>
    <h4>Nomor: 470 / KL / 2024</h4>

    <p>Kepala Kelurahan Sei Putih Timur I Kecamatan Medan Petisah dengan ini menerangkan bahwa:</p>

    <table>
        <tr>
            <td>Nama</td>
            <td>: {{ $surat->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $surat->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>: {{ $surat->tempat_tgl_lahir }}</td>
        </tr>
        <tr>
            <td>WNI / Agama</td>
            <td>: {{ $surat->bangsa_agama }}</td>
        </tr>
        <tr>
            <td>Alamat Tempat Tinggal</td>
            <td>: {{ $surat->tempat_tinggal_akhir }}</td>
        </tr>
        <tr>
            <td>Hari, Tanggal</td>
            <td>: {{ $surat->hari_tanggal }}</td>
        </tr>
        <tr>
            <td>Pukul</td>
            <td>: {{ $surat->pukul }}</td>
        </tr>
        <tr>
            <td>Sebab Meninggal</td>
            <td>: {{ $surat->sebab_meninggal }}</td>
        </tr>
        <tr>
            <td>Tempat Meninggal</td>
            <td>: {{ $surat->tempat_meninggal }}</td>
        </tr>
        <tr>
            <td>Dikebumikan di</td>
            <td>: {{ $surat->dikebumikan }}</td>
        </tr>
        <tr>
            <td>Nama Pelapor</td>
            <td>: {{ $surat->nama_pelapor }}</td>
        </tr>
        <tr>
            <td>Hubungan Pelapor</td>
            <td>: {{ $surat->hubungan_pelapor }}</td>
        </tr>
        <tr>
            <td>Tanggal Permohonan</td>
            <td>: {{ $surat->tanggal_surat }}</td>
        </tr>
    </table>

    <p>Demikian surat keterangan ini dibuat untuk digunakan seperlunya.</p>

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
