<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Kota</h1>
            <a href="<?= route_to('kota')?>">
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

        <div class="card-shadow">
            <div class="card-body">
                <form action="/C_Kota/create" enctype="multipart/form-data" method="POST">
                    <?= csrf_field(); ?>                
                    <div class="form-group">
                        <label for="nama_kota" class="form-label">Nama Kota</label>
                        <input type="input" name="nama_kota" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
                        <input type="input" name="jumlah_penduduk" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Input Data
                    </button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>