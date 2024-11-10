<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kehilangan</title>
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

    <h1>Surat Keterangan Kehilangan</h1>
    <h4>Nomor: 470 / KL / 2024</h4>

    <p>Kepala Kelurahan Sei Putih Timur I Kecamatan Medan Petisah dengan ini menerangkan bahwa:</p>

    <table>
        <tr>
            <td>Nama</td>
            <td>: {{ $surat->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $surat->nik }}</td>
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
            <td>Alamat</td>
            <td>: {{ $surat->alamat }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $surat->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Barang yang Hilang</td>
            <td>: {{ $surat->kehilangan }}</td>
        </tr>
        <tr>
            <td>Tanggal Permohonan</td>
            <td>: {{ $surat->tanggal_surat }}</td>
        </tr>
    </table>

    <p>Orang tersebut di atas adalah benar penduduk Kelurahan Sei Putih Timur I yang berdomisili tetap di alamat yang tertera di atas. Demikian surat keterangan ini dibuat untuk digunakan seperlunya.</p>

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
