<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="left-sides d-sm-flex">
            <h1 class="h3 mb-0 text-gray-800">Checkout</h1>
        </div>
        <a href="<?= route_to('toko/cart')?>">
            <button type="button" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> 
                Back
            </button>
        </a>
    </div>

    <?php
        if($error){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= \Config\Services::validation()->listErrors();?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
        }
    ?>

    <form action="/C_Payment/checkout" class="mx-5" method="POST">
    <?= csrf_field(); ?>    
        <div class="mb-3">
            <label for="nama_user" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama_user">
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="telephone" class="form-control" name="no_hp">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" name="kecamatan">
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kabupaten / Kota</label>
            <input type="text" class="form-control" name="kota">
        </div>
        <button type="submit" class="btn btn-checkout btn-block mb-4">Submit</button>
    </form>
</div>
<?= $this->endSection(); ?>