<table>
  <thead>
    <tr>
      <th style="border: 1px solid; padding: 10px;">No</th>
      <th style="border: 1px solid; padding: 10px;">User nama</th>
      <th style="border: 1px solid; padding: 10px;">Nama Lengkap</th>
      <th style="border: 1px solid; padding: 10px;">Email</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $no=1;
    foreach ($pengguna as $key) {
      $id=$key->id_user;

  ?>
    <tr>
      <td style="border: 1px solid; padding: 10px;"><?php echo $no; ?></td>
      <td style="border: 1px solid; padding: 10px;"><?php echo $key->username;?></td>
      <td style="border: 1px solid; padding: 10px;"><?php echo $key->nama_lengkap;?></td>
      <td style="border: 1px solid; padding: 10px;"><?php echo $key->email;?></td>
    </tr>
  <?php
    $no++;
    }
  ?>
  </tbody>
</table>