<?php 
require_once('../controller/CategoryControllers.php');
require_once('../config/base_url.php');
session_id();
session_start();
$data->update();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/icon/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/DataTables/datatables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/DataTables/datatables.min.css') ?>">
    <title>Tambah Stock Sparepart</title>
    <style>
        .navbar-nav li a{
            margin-right: 5px;
        }

        main{
            margin-top: 50px;
        }
        h3{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight:400;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                SPAREPART INFORMATION
            </a>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active navigasi mt-1">
                        <a class="btn btn-primary" href="<?= base_url('') ?>"><span class="fa fa-home"></span> Dashboard</a>
                    </li>
                    <li class="nav-item navigasi mt-1">
                        <a class="btn btn-dark" href="<?= base_url('views/daftar.php') ?>">Daftar Sparepart</a>
                    </li>
                    <li class="nav-item navigasi mt-1">
                        <a class="btn btn-danger" href="<?= base_url('views/kategori.php') ?>">Kategori sparepart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="mb-4">
    <div class="container mt-4">
        <?php Flasher::flash(); ?>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_GET['edit'])){ ?>
                    <div class="card">
                        <div class="card-body">
                            <h3>Edit Category</h3>
                            <form action="../controller/CategoryControllers.php" method="post">
                                <?php if($data::getById($_GET["edit"]) != FALSE){ ?>
                                    <div class="form-group">
                                        <input type="text" value="<?= $_GET["edit"] ?>" name="id" hidden>
                                        <input required type="text" name="category" value="<?= $data::getById($_GET['edit'])['category'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        <a href="../views/kategori.php" class="btn btn-danger">Batal</a>
                                    </div>
                                <?php }else{ ?>
                                    <div class="alert alert-danger mt-3">Data tidak di temukan</div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                <?php }else{ ?>
                <div class="card">
                    <div class="card-body">
                        <h3>Tambah Category</h3>
                        <form action="../controller/CategoryControllers.php" method="post">
                            <div class="form-group">
                                <input type="text" required name="category" class="form-control" placeholder="Tambah Category barang">
                            </div>
                            <button type="submit" name="save" class="btn btn-primary w-100">simpan <i class="fa fa-save"></i></button>
                        </form>

                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Category Barang</h3>
                        <?php $nomor = 0; ?>
                        <?php if($data->countAll() > 0){ ?>
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Barang</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($get = $getAll->fetch_object()){ ?>
                                    <tr>
                                        <td><?= $nomor+=1; ?></td>
                                        <td><?= $get->category  ?></td>
                                        <td>
                                            <a href="../controller/CategoryControllers.php?hapus=<?= $get->id ?>" class="btn btn-danger"><i class="fa fa-trash fa-1x"></i></a>
                                            <a href="../views/kategori.php?edit=<?= $get->id ?>" class="btn btn-warning"><i class=" fa fa-pencil-square-o  fa-1x"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php }else{ ?>
                            <div class="alert alert-danger">Maaf data category masih kosong</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="<?= base_url('public/bootstrap/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= base_url('public/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('public/DataTables/datatables.js') ?>"></script>
    <script src="<?= base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/bootstrap/js/bootstrap.js') ?>"></script>
    <script>
        $(document).ready(function(){
            $('.table').DataTable();
        });
    </script>
</body>
</html>