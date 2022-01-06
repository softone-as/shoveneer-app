<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Kota</h1>
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
                <form action="/C_Kota/update" enctype="multipart/form-data" method="POST">
                    <?= csrf_field(); ?>                
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $res['id'] ?>" />
                        <label for="nama_kota" class="form-label">Nama Kota</label>
                        <input type="input" name="nama_kota" class="form-control" value="<?= $res['nama_kota'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
                        <input type="input" name="jumlah_penduduk" class="form-control" value="<?= $res['jumlah_penduduk'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control" value="<?= $res['image'] ?>"/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Ubah Data
                    </button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>