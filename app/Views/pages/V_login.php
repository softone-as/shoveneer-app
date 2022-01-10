<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Login</h1>
    </div>

    <?php
        if(session()->getFlashData('error')){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
        }else if(session()->getFlashData('success')){
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
        <div class="card mx-auto">
            <div class="card-body">
                <form action="/C_Login/auth" method="POST">
                    <?= csrf_field(); ?>                
                    <div class="form-group">
                        <label for="no_anggota" class="form-label">No Anggota</label>
                        <input type="input" name="no_anggota" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="input" name="username" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>