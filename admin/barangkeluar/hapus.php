<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM barang_keluar WHERE id_bk = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Barang Keluar Berhasil dihapus";
   echo "<script>window.location.replace('../barangkeluar/');</script>";
}
