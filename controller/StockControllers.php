<?php

require_once('../config/database.php');
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
            return $data->fetch_object();
        }else{
            return FALSE;
        }
    }


}


$data = new StockControllers();
$data->database = $db;
$countStock = $data->jumlah_data();
$getStock = $data->get_all();