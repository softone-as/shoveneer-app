<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
        <!-- <a href="<?= route_to('kota/input-data') ?>" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a> -->
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
        }
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
            <?php foreach ($res as $item) : ?>
                <div class="col-md-3 mb-4">
                    <div class="thumbnail d-flex flex-column justify-content-between" style="height: 500px">
                        <img width="100%" src="<?php echo base_url().'/assets/images/'.$item->gambar;?>" class="h-70">
                        <div class="caption h-30">
                            <h6 class="text-center mt-2"><?php echo $item->nama_produk;?></h6>
                            <div class="row">
                                <div class="col-md-12 align-items-center">
                                    <h5><?php echo 'Rp '.number_format($item->harga);?></h4>
                                    <p>Stok : <?= $item->jumlah_stok?></p>
                                    <p>Berat : <?= $item->berat?> gram</p>
                                    
                                </div>
                            </div>                            
                            <a class="btn btn-success btn-block mt-2" href="<?= base_url('/toko/add-cart/'.$item->id_produk)?>">
                                <i class="fas fa-plus"></i> Add To Cart    
                            </a>    
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
                 
            </div>
 
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>