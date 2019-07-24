<table>
  <thead>
    <tr>
      <th style="border: 1px solid; padding: 10px;">No</th>
      <th style="border: 1px solid; padding: 10px;">Produk</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $no=1;
    foreach ($produk as $key) {
      $id=$key->id_produk;

  ?>
    <tr>
      <td style="border: 1px solid; padding: 10px;"><?php echo $no; ?></td>
      <td style="border: 1px solid; padding: 10px;"><?php echo $key->produk;?></td>
    </tr>
  <?php
    $no++;
    }
  ?>
  </tbody>
</table>