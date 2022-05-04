<?php 
require_once('../config/database.php');
require_once('../config/base_url.php');
require_once('../core/flasher.php');
class CategoryControllers
{
    public function countAll()
    {
        global $db;
        $sql = "SELECT * FROM category_barang";
        $data = $db->query($sql);
        return $data->num_rows;
    }

    public function getAll()
    {
        global $db;
        $sql = "SELECT * FROM category_barang";
        $data = $db->query($sql);
        return $data;
    } 

    public static function getById($id)
    {
        global $db;
        $sql = "SELECT * FROM category_barang WHERE id = '$id'";
        $data = $db->query($sql);
        if($data->num_rows > 0)
        {
            return $data->fetch_array();
        }else{
            return FALSE;
        }
    }
    public static function insert($values)
    {
        session_id();
        session_start();
        global $db;
        $sql = "INSERT INTO category_barang (category) VALUES('$values')";
        if($db->query($sql) == TRUE)
        {
            Flasher::setFlash('berhasil','ditambahkan','success');
            header('Location:'.base_url('/views/kategori.php'));
        }else{
            Flasher::setFlash('gagal','ditambahkan','danger');
            header('Location:'.base_url('/views/kategori.php'));
        }
    }

    public static function delete($id)
    {
        session_id();
        session_start();
        global $db;
        $sql = "DELETE FROM category_barang WHERE id = '$id'";
        if($db->query($sql) == TRUE)
        {
            Flasher::setFlash('berhasil','category di hapus','success');
            header('Location:'.base_url('/views/kategori.php'));
        }else{
            Flasher::setFlash('gagal','category gagal di hapus','danger');
            header('Location:'.base_url('/views/kategori.php'));
        }
    }
    public function store()
    {
        if(isset($_POST['save']))
        {
            $category = $_POST['category'];
            $this::insert($category);
        }
    }

    public function deleteById()
    {
        if(isset($_GET['hapus']))
        {
            $id = $_GET["hapus"];
            $this::delete($id);
        }
    }

    public static function updateById($id,$category)
    {
        session_id();
        session_start();
        global $db;
        $sql = "UPDATE category_barang SET category = '$category' WHERE id = '$id'";
        if($db->query($sql) == TRUE)
        {
            Flasher::setFlash('berhasil','category di update','success');
            header('Location:'.base_url('/views/kategori.php?edit='.$id));
        }else{
            Flasher::setFlash('gagal','category gagal di update','danger');
            header('Location:'.base_url('/views/kategori.php?edit='.$id));
        }   
    }
    public function update()
    {
        if(isset($_POST["update"]))
        {
            $id = $_POST["id"];
            $category = $_POST["category"];
            $this::updateById($id,$category);
        }
    }
}

$data = new CategoryControllers();
$getAll = $data->getAll();
$data->store();
$data->deleteById();
$data->update();

?>