<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM barang_keluar WHERE id_bk = '$id'");
$row  = $data->fetch_array();
?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include '../../templates/navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include '../../templates/sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Ubah Barang Keluar</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Barang Proyek</li>
                                <li class="breadcrumb-item active">Barang Keluar</li>
                                <li class="breadcrumb-item active">Ubah Data</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- left column -->
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Barang Keluar</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                        <div class="form-group row">
                                            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $row['nama_barang'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_proyek" class="col-sm-2 col-form-label">Nama Proyek</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" data-placeholder="Pilih" id="id_proyek" name="id_proyek">
                                                    <option value=""></option>
                                                    <?php
                                                    $data1 = $koneksi->query("SELECT * FROM proyek AS p LEFT JOIN perusahaan AS pr ON p.id_perusahaan = pr.id_perusahaan WHERE p.status_jalan = 'Di Jalankan'");
                                                    while ($dp = $data1->fetch_array()) {
                                                    ?>
                                                        <option value="<?= $dp['id_proyek'] ?>" <?php if ($dp['id_proyek'] == $row['id_proyek']) {
                                                                                                    echo "selected";
                                                                                                } ?>><?= $dp['nama_proyek'] ?> - <?= $dp['nama_perusahaan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $row['jumlah'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" value="<?= $row['tgl_keluar'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/perusahaan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Ubah</i></button>
                                    </div>
                                    <!-- /.card-footer -->

                                </div>

                            </div>
                            <!--/.col (left) -->
                        </div>

                    </form>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once "../../templates/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once "../../templates/script.php"; ?>


    <?php
    if (isset($_POST['submit'])) {
        $id_proyek          = $_POST['id_proyek'];
        $jumlah             = $_POST['jumlah'];
        $tgl_keluar         = $_POST['tgl_keluar'];


        $submit = $koneksi->query("UPDATE barang_keluar SET  
                            id_proyek = '$id_proyek',
                            jumlah = '$jumlah',
                            tgl_keluar = '$tgl_keluar'
                            WHERE 
                            id_bk = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Proyek Diubah";
            echo "<script>window.location.replace('../barangkeluar/');</script>";
        }
    }

    ?>

</body>

</html>