<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM barang_masuk WHERE id_bm = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Barang Masuk Berhasil dihapus";
   echo "<script>window.location.replace('../barangmasuk/');</script>";
}
