<?php

require '../../config/config.php';
require '../../config/koneksi.php';

   $id    = $_GET['id'];
   $hapus = $koneksi->query("DELETE FROM jenis WHERE id_jenis = '$id'");

   if ($hapus) {
  		$_SESSION['pesan'] = "Jenis Berhasil dihapus";
        echo "<script>window.location.replace('../jenis/');</script>";
    }
