<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;

$data = $koneksi->query("SELECT * FROM barang_masuk as bm 
LEFT JOIN jenis as j 
ON bm.id_jenis = j.id_jenis
LEFT JOIN satuan as st 
ON bm.id_satuan = st.id_satuan 
ORDER BY 
bm.nama_barang DESC");

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
            <font size="5">Output Data Barang Masuk</font> <br>
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Satuan Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = mysqli_fetch_array($data)) { ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['jenis'] ?></td>
                                <td><?= $row['satuan'] ?></td>
                                <td align="center"><?= $row['jumlah'] ?></td>
                                <td><?= tgl_indo($row['tgl_masuk']) ?></td>
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
    Banjarmasin , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    Kepala Dinas
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