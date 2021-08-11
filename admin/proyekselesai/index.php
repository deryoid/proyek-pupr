<?php
require '../../config/config.php';
require '../../config/koneksi.php';
require '../../config/day.php';
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
                            <h1 class="m-0 text-dark">Proyek</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Proyek</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <!-- <a href="tambah" class="btn bg-blue"><i class="fa fa-plus-circle"> Tambah Data</i></a> -->
                                    <a href="print" target="blank" class="btn bg-yellow"><i class="fa fa-print"> Cetak</i></a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                    ?>
                                        <div class="alert alert-info alertinfo" role="alert">
                                            <i class="fa fa-check-circle"> <?= $_SESSION['pesan']; ?></i>
                                        </div>
                                    <?php
                                        $_SESSION['pesan'] = '';
                                    }
                                    ?>

                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-yellow">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Kode Proyek</th>
                                                    <th>Nama Proyek</th>
                                                    <th>Perusahaan</th>
                                                    <th>Lokasi Pengerjaan</th>
                                                    <th>Estimasi Pengerjaan</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Progres Pengerjaan</th>
                                                    <th>Siswa Anggaran Akhir</th>
                                                    <th>Status</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM proyek AS p 
                                            LEFT JOIN perusahaan AS pr ON p.id_perusahaan = pr.id_perusahaan 
                                            LEFT JOIN anggaran_masuk AS a ON p.id_am = a.id_am
                                            WHERE p.status_proyek = 'Di Tanggapi' AND p.progres = '100'");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: azure">
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
                                                            <td><?= $row['nominal_masuk'] ?></td>
                                                        <td align="center">
                                                            <?php if ($row['status_jalan'] == "Menunggu") { ?>
                                                                <span class="badge badge-warning"><?= $row['status_jalan'] ?></span>
                                                            <?php } else { ?>
                                                                <span class="badge badge-success"><?= $row['status_jalan'] ?></span>
                                                            <?php } ?>

                                                        </td>
                                                        <td align="center">
                                                            <a href="edit?id=<?= $row['id_proyek'] ?>" class="btn btn-info btn-sm"  title="Progress"><i class="fa fa-spinner"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
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

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    </script>

</body>

</html>