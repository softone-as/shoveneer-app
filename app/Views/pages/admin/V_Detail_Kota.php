<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?> - <?= $res['nama_kota']?></h1>
        <a href="<?= route_to('kota')?>">
            <button type="button" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> 
                Back
            </button>
        </a>
    </div>

    <div class="row">
        <div class="card mx-auto">
            <h5 class="card-header text-center"><?= $res['nama_kota'] ?></h5>
            <img src="<?= base_url('/assets/images/'.$res['image'])?>" alt="gambar" width="200px" class="mx-auto">
            <div class="card-body">
                <p class="card-text">Nama Kota : <?=$res['nama_kota']?></p>
                <p class="card-text">Jumlah Penduduk : <?=$res['jumlah_penduduk']?></p>
            </div>
            <div class="card-footer text-center">
                <a href="<?= base_url('/kota/edit/'.$res['id'])?>" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i> Edit
                </a>
                <a href="<?= site_url('/C_Kota/delete/'.$res['id'])?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>