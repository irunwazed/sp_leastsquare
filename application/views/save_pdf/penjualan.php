<table>
  <thead>
    <tr>
      <th style="border: 1px solid; padding: 10px;">No</th>
      <th style="border: 1px solid; padding: 10px;">Produk</th>
      <th style="border: 1px solid; padding: 10px;">Bulan</th>
      <th style="border: 1px solid; padding: 10px;">Penjualan Produk</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $no=1;
    foreach ($penjualan as $key) {
      $id=$key->id_data;
      $id1=$key->id_produk;
      $id3=$key->id_bulan;

  ?>
    <tr>
      <td style="border: 1px solid; padding: 10px;"><?php echo $no; ?></td>
      <td style="border: 1px solid; padding: 10px;"><?php echo $key->produk;?></td>
      <td style="border: 1px solid; padding: 10px;"><?php echo $key->bulan;?></td>
      <td style="border: 1px solid; padding: 10px;"><?php echo $key->stok;?></td>
    </tr>
  <?php
    $no++;
    }
  ?>
  </tbody>
</table>