<?php
require '../../config/config.php';
require '../../config/koneksi.php';
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
                            <h1 class="m-0 text-dark">Perusahaan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Proyek</li>
                                <li class="breadcrumb-item active">Perusahaan</li>
                                <li class="breadcrumb-item active">Tambah Data</li>
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
                                        <h3 class="card-title">Perusahaan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                        <div class="form-group row">
                                            <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bidang_perusahaan" class="col-sm-2 col-form-label">Bidang Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="bidang_perusahaan" name="bidang_perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat_perusahaan" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="3" name="alamat_perusahaan"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tahun_berdiri" class="col-sm-2 col-form-label">Tahun Berdiri</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tahun_berdiri" name="tahun_berdiri">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_pimpinan" class="col-sm-2 col-form-label"> Pimpinan/Kepala</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">No. Telp Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="no_telp" name="no_telp">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/perusahaan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Simpan</i></button>
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
        $nama_perusahaan        = $_POST['nama_perusahaan'];
        $bidang_perusahaan      = $_POST['bidang_perusahaan'];
        $alamat_perusahaan      = $_POST['alamat_perusahaan'];
        $tahun_berdiri          = $_POST['tahun_berdiri'];
        $nama_pimpinan          = $_POST['nama_pimpinan'];
        $no_telp                = $_POST['no_telp'];
        $email                  = $_POST['email'];

        $submit = $koneksi->query("INSERT INTO perusahaan VALUES (
            NULL,
            '$nama_perusahaan',
            '$bidang_perusahaan',
            '$alamat_perusahaan',
            '$tahun_berdiri',
            '$nama_pimpinan',
            '$no_telp',
            '$email'
            )");

        if ($submit) {

            $_SESSION['pesan'] = "Data Perusahaan Ditambahkan";
            echo "<script>window.location.replace('../perusahaan/');</script>";
        }
    }
    ?>


</body>

</html>