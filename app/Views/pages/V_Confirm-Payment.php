<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="left-sides d-sm-flex">
            <h1 class="h3 mb-0 text-gray-800">Confirm Payment</h1>
        </div>
        <a href="<?= route_to('toko')?>">
            <button type="button" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> 
                Back
            </button>
        </a>
    </div>
    
    <div class="row mx-5">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Berat (kg)</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_SESSION['cart'])):
                        foreach ($cart as $item) {
                ?>
                <tr class="text-center">
                    <td><?= $item['id_produk']?></td>
                    <td><?= $item['nama_produk'] ?></td>
                    <td><?= $item['berat'] / 1000 ?></td>
                    <td><img src="<?= base_url('/assets/images/'.$item['gambar'])?>" alt="gambar" width="100px" class="mx-auto"></td>
                    <td><?= 'Rp '.number_format($item['harga'])?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= 'Rp '.number_format($item['harga'] * $item['quantity']) ?></td>
                </tr>
                <?php
                        }
                ?>
                <tr>
                    <th colspan="6">Subtotal Produk</th>
                    <th class="text-right"><?= 'Rp '.number_format($total)?></th>
                </tr>
                <tr>
                    <th colspan="6">Biaya Pengiriman</th>
                    <th class="text-right"><?= 'Rp '.number_format($biaya_ongkir)?></th>
                </tr>
                <tr>
                    <th colspan="6">Total Pembayaran</th>
                    <th class="text-right"><?= 'Rp '.number_format($total_pembayaran)?></th>
                </tr>
                
                <?php
                    else:
                ?>
                <tr>
                    <th colspan="6" class="text-center">Belum ada produk yang dimasukan</th>
                </tr>
                <?php
                    endif;
                ?>
            </tbody>
        </table>
        <div class="payment ml-auto mb-3">
            <a href="<?= route_to('toko/success')?>">
                <button type="button" class="btn btn-primary btn-block mt-2">
                    <!-- <i class="fa fa-arrow-left"></i>  -->
                    Confirm Payment
                </button>
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>