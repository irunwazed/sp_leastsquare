  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      <i class="fa fa-th"></i>  Penjualan Produk
      </h1>
      <br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" title="Tambah"><i class="fa fa-plus"></i> Tambah</button>
      <a href="<?php echo site_url('penjualan')?>/save?search=<?=$search?>" class="btn btn-success"  title="PDF" ><i class="fa fa-download"></i></a>
      <!-- Modal Insert-->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-th"></i>  Tambah Data Penjualan Produk</h4>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart("penjualan/input");?>
                <div class="box-body">
                  <div class="form-group">
                      <label for="password">Produk</label>
                    <select class="form-control" name="id_produk" required="required">
                        <option>--Pilih Produk--</option>
                        <?php foreach ($produk as $key1): ?>
                        <option value="<?php echo $key1->id_produk?>" ><?php echo $key1->produk?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                   <div class="form-group">
                      <label for="password">Bulan</label>
                    <select class="form-control" name="id_bulan" required="required">
                        <option>--Pilih Bulan--</option>
                        <?php foreach ($bulan as $key3): ?>
                        <option value="<?php echo $key3->id_bulan?>"  ><?php echo $key3->bulan?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                   <div class="form-group">
                      <label for="password">Tahun</label>
                    <select class="form-control" name="id_tahun" required="required">
                        <option>--Pilih Tahun--</option>
                        <?php foreach ($tahun as $key4): ?>
                        <option value="<?php echo $key4->id_tahun?>"  ><?php echo $key4->tahun?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Penjualan Produk</label>
                      <input type="text" class="form-control" id="password" placeholder="Penjualan_Produk" name="penjualan_produk" required="required">
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" alt="Tambah">Tambah</button>
                </div><!-- /.box-footer -->
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="widget-toolbar"><h3 class="box-title">Data Penjualan Produk<a href="<?php echo site_url('penjualan')?>" class="btn btn-flat"  title="Refresh" ><i class="fa fa-refresh"></i></a></h3>
              <div style="float: right;">
                <form method="GET" action="<?=base_url().'index.php/penjualan/index/1'?>">
                  <input  type="text" name="search" value="<?php if(@$this->input->get('search')) echo $this->input->get('search'); ?>">
                  <input type="submit" value="Cari">
                </form>
              </div>
            </div><!-- /.box-header -->
              </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Produk</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Penjualan Produk</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                  foreach ($penjualan1 as $key) {
                    $id=$key->id_penjualan;
                    $id1=$key->id_produk;
                    $id3=$key->id_bulan;
                    $id4=$key->id_tahun;

                ?>
                  <tr>
                    <td><?php echo $no+(($page-1)*$batas); ?></td>
                    <td><?php echo $key->produk;?></td>
                    <td><?php echo $key->bulan;?></td>
                    <td><?php echo $key->tahun;?></td>
                    <td><?php echo $key->penjualan_produk;?></td>
                    <td>

                      <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-xs btn-danger" title="Hapus" data-toggle="modal" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i></button>

                    </td>
                  </tr>

                  <!-- Modal Delete-->
                  <div class="modal fade" id="delete<?php echo $id;?>" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <div class="alert alert-danger">Apakah anda yakin ingin menghapus Data ini?</div>
                        </div>
                        <div class="modal-footer">

                        <?php echo form_open("penjualan/delete");?>
                          <input type="hidden" class="form-control" value="<?php echo $key->id_penjualan?>" name="id_penjualan" required="required">
                          <button type="submit" class="btn btn-danger">&nbsp;Ya</button>
                          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Batal</button>
                        <?php echo form_close(); ?>
                      </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Update-->
                  <div class="modal fade" id="edit<?php echo $id;?>" role="dialog">
                    <div class="modal-dialog" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><i class="fa fa-th"></i>  Ubah Data</h4>
                        </div>
                        <div class="modal-body">
                          <div class="box-body">
                           <?php echo form_open_multipart("penjualan/edit");?>
                           <div class="form-group">
                                <label for="password">Produk</label>
                              <select class="form-control" name="id_produk" required="required">
                                  <option>--Pilih Produk--</option>
                                  <?php foreach ($produk as $key1): ?>
                                  <option value="<?php echo $key1->id_produk?>"
                                  <?php
                                      if($id1==$key1->id_produk){
                                        echo "selected";
                                      }
                                  ?> ><?php echo $key1->produk?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Bulan</label>
                              <select class="form-control" name="id_bulan" required="required">
                                  <option>--Pilih Bulan--</option>
                                  <?php foreach ($bulan as $key3): ?>
                                  <option value="<?php echo $key3->id_bulan?>"
                                  <?php
                                      if($id3==$key3->id_bulan){
                                        echo "selected";
                                      }
                                  ?> ><?php echo $key3->bulan?></option>
                                <?php endforeach ?>
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="password">Tahun</label>
                              <select class="form-control" name="id_tahun" required="required">
                                  <option>--Pilih Tahun--</option>
                                  <?php foreach ($tahun as $key4): ?>
                                  <option value="<?php echo $key4->id_tahun?>"
                                  <?php
                                      if($id4==$key4->id_tahun){
                                        echo "selected";
                                      }
                                  ?> ><?php echo $key4->tahun?></option>
                                <?php endforeach ?>
                              </select>
                            </div>


                             <div class="form-group">
                              <label for="password">Penjualan Produk</label>
                              <input type="hidden" class="form-control" value='<?php echo $key->id_penjualan; ?>' name="id_penjualan" required="required" >
                              <input type="text" class="form-control" value='<?php echo $key->penjualan_produk; ?>' name="penjualan_produk" required="required">
                            </div>
                            

                          </div><!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                          </div>
                        <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                  $no++;
                  }
                ?>
                </tbody>
              </table>
              <!-- page -->
              <hr>
              <div class="">
                <?php if($page>1) { ?>
                <a href="<?=base_url().'index.php/penjualan/index/'.($page-1).'?search='.$search?>" class="btn btn-outline-primary prev " style="background-color: #cccccc;">Sebelumnya</a>
                <?php } ?>
                <?php 
                  for ($i=1; $i <= $jumlahPage ; $i++) { 

                    if($i==1 || $i == $jumlahPage || ($i-3 < $page && $i+3 > $page)){
                      $tulis = true;
                      $titik = true;
                    }
                    if($tulis){

                      ?>
                      <a href="<?=base_url().'index.php/penjualan/index/'.$i.'?search='.$search?>" class="btn btn-outline-primary" style="background-color: #cccccc;"><?=$i?></a>
                      <?php 
                      $tulis = false;
                    }else if($titik){
                      ?>
                      <a href="<?=base_url().'index.php/penjualan/index/'.$i.'?search='.$search?>" class="btn btn-outline-primary" style="background-color: #cccccc;">..</a>
                      <?php 
                      $titik = false;
                    }
                  } 
                ?>
                <?php if($page<$jumlahPage) { ?>
                <a href="<?=base_url().'index.php/penjualan/index/'.($page+1).'?search='.$search?>" class="btn btn-outline-primary next " style="background-color: #cccccc;">Selanjutnya</a>
                <?php } ?>
              </div>
              <!--. page -->
            </div><!-- /.box-body -->
          </div><!-- /.box-primary -->
        </div><!-- /.col-md -->
      </div><!-- /.row -->
    </section>
  </div>
