<?php

require_once('../config/database.php');
require_once('../config/base_url.php');
require_once('../core/flasher.php');

class StockControllers
{
    public $database; 
    public function jumlah_data()
    {
        $sql = "SELECT * FROM tb_stock";
        $data = mysqli_query($this->database,$sql);
        return mysqli_num_rows($data);
    }

    public function get_all()
    {
        $sql = "SELECT * FROM tb_stock";
        $data = mysqli_query($this->database,$sql);
        return $data;
    }

    public function getAllbyId($id)
    {
        global $db;
        $sql = "SELECT * FROM tb_stock WHERE id = '$id'";
        $data = $db->query($sql);
        if($data->num_rows > 0)
        {
            return $data;
        }else{
            return FALSE;
        }
    }
    public static function delete($id)
    {
        session_id();
        session_start();
        global $db;
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
    public function deleteById()
    {
        global $db;
        if(isset($_GET['hapus']))
        {
            $id = $_GET["hapus"];
            $this::delete($id);
        }
    }

    public function store()
    {
        session_id();
        session_start();
        global $db;
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
    }
    public function update()
    {
        global $db;
        if(isset($_POST["update"]))
        {
            session_id();
            session_start();
            $id = $_POST["id"];
            $kode =  $_POST['kode'];
            $desc = $_POST['deskripsi'];
            $kode_rack = $_POST['kode_rack'];
            $kelompok_barang = $_POST['kel'];
            $harga =  $_POST['het'];
            $jumlah = $_POST['qty']; 
            $sql = "UPDATE tb_stock SET kode_part = '$kode',deskripsi = '$desc',kode_rack = '$kode_rack',kelompok_barang = '$kelompok_barang',het = '$harga',qty = '$jumlah' WHERE id = '$id'";
            if($db->query($sql) == TRUE)
            {
                Flasher::setFlash('berhasil','di update','success');
                header('Location:'.base_url('/views/daftar.php'));
            }else{
                Flasher::setFlash('gagal','di update','danger');
                header('Location:'. base_url('/views/daftar.php'));
            }
        }
    }


}


$stock = new StockControllers();
$stock->database = $db;
$countStock = $stock->jumlah_data();
$getStock = $stock->get_all();
$update = $stock->update();
$delete = $stock->deleteById();
$store = $stock->store();