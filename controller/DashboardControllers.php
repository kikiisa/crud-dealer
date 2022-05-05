<?php 

class DashboardControllers
{
    public $db;
    public function jumlah_stock()
    {
        $database = $this->db;
        $sql = "SELECT * FROM tb_stock";
        $query = $database->query($sql);
        return $query->num_rows;
    }

    public function category_barang()
    {
        $database = $this->db;
        $sql = "SELECT * FROM category_barang";
        $query = $database->query($sql);
        return $query->num_rows;
    }
}

$Dashbaord = new DashboardControllers();







?>