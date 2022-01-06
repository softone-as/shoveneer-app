<?= $this->extend('layouts/V_Template'); ?>

<?= $this->section('content'); ?>
<div class="d-flex flex-row-reverse bd-highlight">
      <a href="<?php echo base_url('C_FileIO/toPDF') ?>" target="_blank" class="btn btn-primary">
        Download PDF
      </a>
    </div>
    <table class="table table-bordered mt-3 m-4">
	<tr>
        <th>ID</th>
        <th>Tanggal</th>
		<th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Kecamatan</th>
        <th>Kota</th>
        <th>Total Pembayaran</th>
	</tr>
	<?php for ($i=1; $i < count($spreadsheet); $i++) : ?>
		<tr>
			<?php
				$j=0;
				while ($j < 8) : ?>
					<td><?= $spreadsheet[$i][$j]?></td>
			<?php 
				$j++;
			endwhile?>
		</tr>
	<?php endfor?>
    </table>
<?= $this->endSection(); ?>