<?php 
require_once('../config/database.php');
require_once('../controller/StockControllers.php');
require_once('../controller/CategoryControllers.php');
require_once('../config/base_url.php');
require_once('../helper/format.php');
require_once('../core/flasher.php');
if(isset($_GET["edit"]))
{
    $byId = $stock->getAllbyId($_GET["edit"]);
}
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
    <title>Daftar Stock Sparepart</title>
    <style>
        .navbar-nav li a{
            margin-right: 5px;
        }

        main{
            margin-top: 30px;
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
        <div class="row">
            <?php if(isset($_GET["edit"])){ ?>
                <?php if($stock->getAllbyId($_GET["edit"]) != FALSE){ ?>
                    <?php while($get = $byId->fetch_object()){ ?>
                        <div class="col-md-12 col-12">
                            <?php Flasher::flash(); ?>
                            <div class="card">
                                <form action="../controller/StockControllers.php" method="post">
                                    <div class="card-body">
                                        <h3>Edit Data</h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="kode part">
                                                        Kode Part
                                                    </label>
                                                    <input type="text" name="id" hidden value="<?= $get->id ?>">
                                                    <input value="<?= $get->kode_part ?>"  type="text" name="kode" class="form-control" placeholder="kode part" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="kode part">
                                                        Deskripsi
                                                    </label>
                                                    <input type="text" value="<?= $get->deskripsi ?>" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="kode part">
                                                        Kode Rack
                                                    </label>
                                                    <input type="text" value="<?= $get->kode_rack ?>" class="form-control" name="kode_rack" placeholder="Kode rack" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="kode part">
                                                        Stock
                                                    </label>
                                                    <input type="number" value="<?= $get->qty ?>" name="qty" class="form-control" placeholder="Qty" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="kode part">
                                                        Het
                                                    </label>
                                                    <input value="<?= $get->het ?>" type="text" class="form-control" name="het" placeholder="Het" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Kelompok Barang</label>
                                                    <select name="kel" class="form-control">
                                                        <option value="">--- Category Barang ---</option>
                                                        <?php while($get_ctg = $getAll->fetch_object()){ ?>
                                                            <option <?php if($get_ctg->category == $get->kelompok_barang){echo 'selected';} ?> value="<?= $get_ctg->category ?>"><?= $get_ctg->category; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="card-text">Total Harga : <strong><?php echo rupiah($get->qty * $get->het) ?></strong></p>
                                            </div>
                                            <div class="col-md-4">
                                                <button name="update" class="btn btn-primary">Update <i class="fa fa-save"></i></button>
                                                <a href="../views/daftar.php" class="btn btn-success">Kembali <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                <?php }else{ ?>
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-danger">Maaf data tidak di temukan</div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <div class="col-md-12 col-12">
                    <?php Flasher::flash(); ?>
                    <div class="card">
                        <form action="../controller/StockControllers.php" method="post">
                            <div class="card-body">
                                <h3>Tambah Data</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kode part">
                                                Kode Part
                                            </label>
                                            <input type="text" name="kode" class="form-control" placeholder="kode part" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kode part">
                                                Deskripsi
                                            </label>
                                            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kode part">
                                                Kode Rack
                                            </label>
                                            <input type="text" class="form-control" name="kode_rack" placeholder="Kode rack" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kode part">
                                                Stock
                                            </label>
                                            <input type="number" name="qty" class="form-control" placeholder="Qty" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kode part">
                                                Het
                                            </label>
                                            <input type="text" class="form-control" name="het" placeholder="Het" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Kelompok Barang</label>
                                            <select name="kel" class="form-control">
                                                <option value="">--- Category Barang ---</option>
                                                <?php while($get = $getAll->fetch_object()){ ?>
                                                    <option value="<?= $get->category ?>"><?= $get->category; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <button name="save" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
                                        <button type="reset"  class="btn btn-danger">Reset <i class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>
            <div class="col-md-12 col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Daftar Stock Sparepart</h3>
                        <?php if($countStock > 0){ ?>
                            <table class="table" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Part</th>
                                        <th>Deskripsi Stock</th>
                                        <th>Qty</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 0; ?>
                                    <?php $subTotal = 0?>
                                    <?php while($get = mysqli_fetch_object($getStock)){ ?>
                                        <tr>
                                            <th scope="row"><?php echo $nomor+=1; ?></th>
                                            <td><?= $get->kode_part ?></td>
                                            <td><?= $get->deskripsi ?></td>
                                            <td><?= $get->qty ?></td>
                                            <td><?= rupiah($get->qty * $get->het) ?></td>
                                            <td>
                                                <a href="../controller/StockControllers.php?hapus=<?=$get->id ?>" class="btn btn-danger"><i class="fa fa-trash fa-1x"></i></a>
                                                <a href="../views/daftar.php?edit=<?= $get->id ?>" class="btn btn-warning"><i class=" fa fa-pencil-square-o  fa-1x"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                            $sub = $get->qty * $get->het;
                                            $subTotal+=$sub;
                                        ?>
                                    <?php } ?>
                                        <tr>
                                            <td rowspan="5">Sub Total : <strong><?= rupiah($subTotal) ?></strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                </tbody>
                            </table>
                        <?php }else{ ?>
                            <div class="alert alert-danger">Maaf data Stock masih kosong</div>
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
            $('#datatablesSimple').DataTable();
        });
    </script>
</body>
</html>