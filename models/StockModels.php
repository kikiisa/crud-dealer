<?php
require_once('../config/database.php');
require_once('../config/base_url.php');
require_once('../core/flasher.php');
session_id();
session_start();
if(isset($_POST['save']))
{
    $kode =  $_POST['kode'];
    $desc = $_POST['deskripsi'];
    $kode_rack = $_POST['kode_rack'];
    $kelompok_barang = $_POST['kel'];
    $harga =  $_POST['het'];
    $jumlah = $_POST['qty']; 
    $sql = "INSERT INTO tb_stock (kode_part,deskripsi,kode_rack,kelompok_barang,het,qty) VALUES('$kode','$desc','$kode_rack','$kelompok_barang','$harga','$jumlah')";
    if($db->query($sql) == TRUE)
    {
        Flasher::setFlash('berhasil','ditambahkan','success');
        header('Location:'.base_url('/views/daftar.php'));
    }else{
        Flasher::setFlash('gagal','ditambahkan','danger');
        header('Location:'. base_url('/views/daftar.php'));
    }
}


if(isset($_GET['hapus']))
{
    $id = $_GET['hapus'];
    $sql = "DELETE FROM tb_stock WHERE id = $id";
    if($db->query($sql) == TRUE)
    {
        Flasher::setFlash('berhasil','dihapus','success');
        header('Location:'.base_url('/views/daftar.php'));
    }else{
        Flasher::setFlash('gagal','dihapus','danger');
        header('Location:'. base_url('/views/daftar.php'));
    }
}

