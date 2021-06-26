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
                            <h1 class="m-0 text-dark">Barang Masuk</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Barang Proyek</li>
                                <li class="breadcrumb-item active">Barang Masuk</li>
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
                                        <h3 class="card-title">Proyek</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                        <div class="form-group row">
                                            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_jenis" class="col-sm-2 col-form-label">Jenis Barang</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" data-placeholder="Pilih" id="id_jenis" name="id_jenis">
                                                    <option value=""></option>
                                                    <?php
                                                    $data1 = $koneksi->query("SELECT * FROM jenis ORDER BY id_jenis ASC");
                                                    while ($dj = $data1->fetch_array()) {
                                                    ?>
                                                        <option value="<?= $dj['id_jenis'] ?>"><?= $dj['jenis'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_satuan" class="col-sm-2 col-form-label">Satuan Barang</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" data-placeholder="Pilih" id="id_satuan" name="id_satuan">
                                                    <option value=""></option>
                                                    <?php
                                                    $data1 = $koneksi->query("SELECT * FROM satuan ORDER BY id_satuan ASC");
                                                    while ($ds = $data1->fetch_array()) {
                                                    ?>
                                                        <option value="<?= $ds['id_satuan'] ?>"><?= $ds['satuan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="jumlah" name="jumlah">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer" style="background-color: white;">
                                    <a href="<?= base_url('admin/barangmasuk/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $nama_barang     = $_POST['nama_barang'];
        $id_jenis        = $_POST['id_jenis'];
        $id_satuan       = $_POST['id_satuan'];
        $jumlah          = $_POST['jumlah'];
        $tgl_masuk       = $_POST['tgl_masuk'];

        $submit = $koneksi->query("INSERT INTO barang_masuk VALUES (
            NULL,
            '$nama_barang',
            '$id_jenis',
            '$id_satuan',
            '$jumlah',
            '$tgl_masuk'
            )");

        if ($submit) {

            $_SESSION['pesan'] = "Data Barang Masuk Ditambahkan";
            echo "<script>window.location.replace('../barangmasuk/');</script>";
        }
    }
    ?>


</body>

</html>