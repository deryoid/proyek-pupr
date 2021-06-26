<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM satuan WHERE id_satuan = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "satuan Berhasil dihapus";
   echo "<script>window.location.replace('../satuan/');</script>";
}
