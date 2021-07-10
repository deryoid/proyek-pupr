<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM anggaran_masuk WHERE id_am = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "perusahaan Berhasil dihapus";
   echo "<script>window.location.replace('../anggaranmasuk/');</script>";
}
