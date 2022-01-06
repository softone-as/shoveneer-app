<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Register</h1>
    </div>

    <?php
        if(isset($validation)){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $validation->listErrors() ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
        }else if(isset($valid)){
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $valid ?>
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
                <form action="/C_Login/save" method="POST">
                    <?= csrf_field(); ?>                
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="input" name="username" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Register
                    </button>
                </form>
                <div class="login text-center mt-2">
                    <p>or</p>
                    <a href="<?= route_to('login')?>" class="link-info">Login</a>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>