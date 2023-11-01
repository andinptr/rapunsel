<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pendaftaran</title>
    <style>
        body {
            width: 680px;
            height: 845px;
        }

        .kop {
            text-align: center;
            width: 676px;
            line-height: 0.5px;
            margin: 0px;
        }

        .kop .p1 {
            font-size: 12px;
        }

        .kop .p2 {
            font-size: 22px;
        }

        .kop .p3 {
            font-size: 9px;
        }

        .kop p {
            font-size: 12px;
        }

        .kop tr td img {
            text-align: center;
            width: 69px;
            height: 77px;
            margin: 0px;
        }

        .tgl {
            width: 100%;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
        }

        .nosut {
            font-size: 12px;
            width: 520px;
            line-height: 1px;
            margin: 0px;
            padding: 0px;
        }

        .nosut tr .jdl {
            width: 120px;
        }

        .nosut tr .sm {
            width: 8px;
        }

        .yth {
            font-size: 12px;
            width: 380px;
        }

        .isi {
            font-size: 12px;
            text-align: justify;
            width: 660px;
            /* line-height: 1.5px; */
        }

        .isi .p1 {
            text-indent: 10px;
        }

        .isi2 {
            font-size: 12px;
            width: 666px;
            margin: 0px;
            padding: 0px;
        }

        p {
            font-size: 12px;
        }

        .ttd .paraf p {
            text-align: center;
            font-size: 12px;
            line-height: 1px;
            margin-right: -200px;
        }
    </style>
</head>

<body>

    <table class="kop" border="0">
        <tr>
            <td><img src="Logo.png" alt="logo" srcset=""></td>
            <td>
                <p class="p1"><b><i>Yayasan teratai Putih Global</i></b></p>
                <p class="p2"><b>SMK TERATAI PUTIH GLOBAL 2 BEKASI</b></p>
                <p class="p1"><b>BIDANG KEAHLIAN BISNIS MANAJEMEN & TEKNIK INFORMASI KOMUNIKASI</b></p>
                <p class="p3">KOMPENTENSI KEAHLIAN : AKUNTANSI & KEUANGAN LEMBAGA,BISNIS DARING & PEMASARAN,MULTIMEDIA</p>
                <p class="p3">TATA KELOLA PERKANTORAN,REKAYASA PERANGKAT LUNAK,PERBANGKAN & KEUANGAN MIKRO</p>
                <p><b>Jl. Rajawali 5 No. 29 Perumnas 1 Bekasi Selatan Telp. (021) 8894749</b></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
                <p align="center"><b>STATUS TERAKREDITASI "A" (Amat Baik)</b></p>
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>

        <table class="tgl" border="0">
            <tr>
                <td>
                    <!-- <p><?php echo $tgl_surat; ?></p> -->
                    <p>FORMULIR PENDAFTARAAN SISWA BARU <br> SMK TERATAI PUTIH GLOBAL 2 BEKASI</p>
                </td>
            </tr>
        </table>
        <div class="isi">
            <p><i>Dengan ini, kami menyatakan siswa dengan data di bawah ini sudah melakukan pendaftaran siswa baru <br> pada Sekolah SMK Teratai Putih Global 2 Bekasi Tahun Ajaran 2023/2024: </i></p>
            <?php
            include '../conn.php';
            // $data = mysqli_query($conn, "SELECT *
            // FROM pendaftaran WHERE NIS = 43434 ");
            $data = mysqli_query($conn, "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE nis = '" . $_GET['nis'] . "' ");
            $tampil = mysqli_fetch_assoc($data);
            $tgl_daftar = $tampil['tgl_input'];
            $tgl_lahir= $tampil['tgl_lahir'];
            function tgl_indo($tanggal){
                $bulan = array (
                    1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
                $pecahkan = explode('-', $tanggal);
                
                // variabel pecahkan 0 = tahun
                // variabel pecahkan 1 = bulan
                // variabel pecahkan 2 = tanggal
             
                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];

            }
             
            ?>
            <b>Biodata Siswa</b>
            <table class="nosut" border="0">
                <tr>
                    <td class="jdl">
                        <p>No. Daftar</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= $tampil['nis']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="jdl">
                        <p>Nama Siswa</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= $tampil['nama_siswa']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="jdl">
                        <p>Alamat Lengkap</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= $tampil['alamat']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="jdl">
                        <p>Jenis Kelamin</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= $tampil['jenis_kelamin']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="jdl">
                        <p>Tempat Tanggal Lahir</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= $tampil['tempat_lahir']; ?>, <?= tgl_indo($tgl_lahir); ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="jdl">
                        <p>Agama</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= $tampil['nama_agama']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="jdl">
                        <p>Status Siswa</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= $tampil['status']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="jdl">
                        <p>Kelas/Jurusan</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= $tampil['kelas']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="jdl">
                        <p>Tanggal Daftar</p>
                    </td>
                    <td class="sm"> :</td>
                    <td>
                        <p><?= tgl_indo($tgl_daftar); ?></p>
                    </td>
                </tr>
            </table>
        </div>
        <div style="margin-top:40px;">
            <table width="660" class="ttd" border="0">

                <td></td>
                <td class="paraf">
                    <p style="margin-bottom:20px;">Bekasi, <?= tgl_indo($tgl_daftar); ?></p>
                    <p>Kepala SMK Teratai Putih Global 2 Bekasi</p><br><br>
                    
                    <p>Hadiswal Radin, S.Pd.I</p>
                </td>

            </table>
        </div>

</body>

</html>