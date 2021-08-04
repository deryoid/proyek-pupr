<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;

$data = $koneksi->query("SELECT * FROM proyek as p LEFT JOIN perusahaan as pr ON p.id_perusahaan = pr.id_perusahaan WHERE p.status_proyek = 'Di Tanggapi' AND p.progres = '100'");

$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA </title>
</head>

<body>
<!-- <img src="<?=base_url('assets/dist/img/logo_pln.jpg')?>" align="left" width="90" height="90">
  <p align="center"><b>
    <font size="7">PT. GERAI INDAH MARABAHAN</font> <br> <br> <br> <br>
    <hr size="2px" color="black">
    <center><font size="2">Alamat : Jl. AES Nasution, Marabahan Kota, Marabahan Kabupaten Barito Kuala Kalimantan Selatan </font></center>
    <hr size="2px" color="black">
  </b></p> -->
    <p align="center"><b>
            <font size="5">Laporan  Proyek Selesai Pengerjaan</font> <br>
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Kode Proyek</th>
                        <th>Nama Proyek</th>
                        <th>Perusahaan</th>
                        <th>Lokasi Pengerjaan</th>
                        <th>Estimasi Pengerjaan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Progres Pengerjaan</th>
                        <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = mysqli_fetch_array($data)) { ?>
                            <tr>
                            <td align="center"><?= $no++ ?></td>
                                                        <td><?= $row['kode_proyek'] ?></td>
                                                        <td><?= $row['nama_proyek'] ?></td>
                                                        <td><?= $row['nama_perusahaan'] ?></td>
                                                        <td><?= $row['alamat_proyek'] ?></td>
                                                        <td><?= $row['estimasi'] ?></td>
                                                        <td><?= $row['tgl_mulai'] ?></td>
                                                        <td><?= $row['tgl_selesai'] ?></td>
                                                        <td class="project_progress">
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?= $row['progres'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $row['progres'] ?>%">
                                                                </div>
                                                            </div>
                                                            <small>
                                                                <?php 
                                                                if ($row['progres'] == 0) {
                                                                    echo '0% Complete';
                                                                }else {
                                                                    echo $row['progres']."% "."| ".$row['tgl_progres']."";
                                                                }
                                                                ?>
                                                               
                                                               
                                                                
                                                            </small>
                                                        </td>
                                                        <td align="center">
                                                            <?php if ($row['status_jalan'] == "Menunggu") { ?>
                                                                <span class="badge badge-warning"><?= $row['status_jalan'] ?></span>
                                                            <?php } else { ?>
                                                                <span class="badge badge-success"><?= $row['status_jalan'] ?></span>
                                                            <?php } ?>

                                                        </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <br>

    </div>

    <div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Tapin, <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    Pimpinan
  </h5>

</div>
</body>

</html>

<script>
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
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

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
</script>