<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Tokekpedia</title>

    <style>
      .header {
        width: 100%;
        text-align: center;
      }  

      .header span{
        text-transform: uppercase;
        font-weight: bold;
      }

      .table {
        border-top: 2px solid #000;
        padding: 1rem auto;
        margin-top: 1rem;
      }

      .table > tr,
      th,
      td {
        border: 1px solid black;
        text-align: center;
        padding: 0.5rem;
      }
    </style>
  </head>

  <body>
    <div class="header">  
      <img src="assets/images/logo-tokekpedia.png" alt="logo" style="float: left; width: 60px; height:auto;" />
      <span style="float: left; padding-left: 1rem;">Data Penjualan di Tokekpedia <br>Desember<br>2021</span>
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
  </body>
</html>
