<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex flex-column align-items-center justify-content-center">
        <div class="success mt-5 text-center">
            <i class="fas fa-check-circle fa-7x text-success"></i>
            <h3 class="mt-3">Thank you for your purchase in shoveneer!</h3>
            <p>Wait for the package coming to your home.</p>
        </div>
        <a href="<?= route_to('toko')?>">
            <button class="btn btn-success mt-3">
                Continue shopping
            </button>
        </a>
    </div>
    
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>