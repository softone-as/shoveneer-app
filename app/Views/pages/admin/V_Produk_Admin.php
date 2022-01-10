<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
        <a href="<?= route_to('admin/input-data') ?>" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
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
        }
    ?>

<div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($res as $item) { 
                            if($item){
                        ?>
                            <tr>
                                <td><?= $item->id_produk ?></td>
                                <td><?= $item->nama_produk ?></td>
                                <td><?= $item->harga ?></td>
                                <td><?= $item->berat ?></td>
                                <td><?= $item->jumlah_stok ?></td>
                                <td class="text-center"><img src="<?= base_url('/assets/images/'.$item->gambar)?>" alt="gambar" width="200px" class="mx-auto"></td>
                            </tr>
                        <?php 
                            } else {
                                ?>
                                <tr>
                                    <td class="offset-4">Nothing</td>
                                </tr>
                        <?php 
                            } 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>