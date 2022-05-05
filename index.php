<?php
require_once('config/base_url.php');
require_once('config/database.php');
require_once('controller/DashboardControllers.php');

$Dashbaord->db = $db;

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
    <title>Home</title>
    <style>
        .navbar-nav li a{
            margin-right: 5px;
        }

        main{
            margin-top: 50px;
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
                        <a class="btn btn-primary" href="/dashboard"><span class="fa fa-home"></span> Dashboard</a>
                    </li>
                    <li class="nav-item navigasi mt-1">
                        <a class="btn btn-dark" href="<?= base_url('views/daftar.php') ?>">Daftar Sparepart</a>
                    </li>
                    <li class="nav-item navigasi mt-1">
                        <a class="btn btn-danger" href="<?= base_url('views/kategori.php') ?>">Kategori sparepart</a>
                    </li>
            </div>
        </div>
    </nav>
    <main>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h3>Dashboard</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-white text-center bg-primary mb-3">
                            <div class="card-body">
                            <h5 class="card-title">Jumlah Stock Sparepart <strong><?= $Dashbaord->jumlah_stock() ?></strong></h5>
                            <i class="fa fa-certificate fa-5x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white text-center bg-dark mb-3">
                            <div class="card-body">
                            <h5 class="card-title">Jumlah Kategory Barang <strong><?= $Dashbaord->category_barang() ?></strong></h5>
                            <i class="fa fa-gear fa-5x"></i>
                            </div>
                        </div>
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
</body>
</html>