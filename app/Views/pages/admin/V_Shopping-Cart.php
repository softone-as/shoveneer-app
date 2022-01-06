<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="left-sides d-sm-flex">
            <h1 class="h3 mb-0 text-gray-800">Shopping Cart</h1>
            <a class="ml-4" href="<?= route_to('toko/clear-all')?>">
                <button type="button" class="btn btn-danger">
                    <i class="fa fa-trash"></i> 
                    Clear Cart
                </button>
            </a>
        </div>
        <a href="<?= route_to('toko')?>">
            <button type="button" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> 
                Back
            </button>
        </a>
    </div>
    
    <?php
        if(session()->getFlashData('success')){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
        }elseif(session()->getFlashData('error')){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashData('error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php
        }
    ?>
    
    <div class="row mx-5">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Berat (kg)</th>
                    <th>Jumlah</th>
                    <th>Sub Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_SESSION['cart'])):
                        foreach ($items as $item) {
                ?>
                <tr class="text-center">
                    <td><?= $item['id_produk']?></td>
                    <td><?= $item['nama_produk'] ?></td>
                    <td><img src="<?= base_url('/assets/images/'.$item['gambar'])?>" alt="gambar" width="100px" class="mx-auto"></td>
                    <td><?= 'Rp '.number_format($item['harga'])?></td>
                    <td><?=$item['berat'] / 1000;?></td>
                    <td>
                        <a href="<?= base_url('/toko/remove-cart/'.$item['id_produk'])?>" class="btn btn-outline-secondary mt-2">
                            <i class="fa fa-minus"></i> 
                        </a>
                        <?= $item['quantity'] ?>
                        <a href="<?= base_url('/toko/add-cart/'.$item['id_produk'])?>" class="btn btn-outline-secondary mt-2">
                            <i class="fa fa-plus"></i> 
                        </a>
                    </td>
                    <td><?= 'Rp '.number_format($item['harga'] * $item['quantity']) ?></td>
                </tr>
                <?php
                        }
                ?>
                <tr>
                    <th colspan="6" class="text-right">Total Bayar</th>
                    <th><?= 'Rp '.number_format($total)?></th>
                </tr>
                
                <?php
                    else:
                ?>
                <tr>
                    <th colspan="6" class="text-center">Belum ada produk yang ditambahkan</th>
                </tr>
                <?php
                    endif;
                ?>
            </tbody>
        </table>
        <div class="checkout ml-auto">
            <a href="<?= route_to('toko/checkout')?>">
                <button type="button" class="btn btn-primary btn-block mt-2">
                    <!-- <i class="fa fa-arrow-left"></i>  -->
                    Checkout
                </button>
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>