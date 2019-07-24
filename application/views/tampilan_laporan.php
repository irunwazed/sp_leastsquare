  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      <i class="fa fa-dashboard"></i>  Laporan
      </h1>
      <br>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Laporan<a href="<?php echo site_url('laporan')?>" class="btn btn-flat"  title="Refresh" ><i class="fa fa-refresh"></i></a></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <form>
                  <div class="form-group col-md-4">
                      <label>Produk</label>
                      <select id="produk" class="form-control select2" name="produk">
                        <option selected="selected" value="<?=@$this->input->get('produk')?>">-= Pilih Produk =-</option>
                        <?php foreach ($produk as $key): ?>
                              <option value="<?php echo $key->id_produk?>" <?php if(@$this->input->get('produk') == $key->id_produk) echo "selected"; ?> ><?php echo $key->produk?></option>
                         <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Orde</label>
                      <select class="form-control select2" name="orde" value="<?=@$this->input->get('orde')?>">
                        <option selected="selected" value="">-= Pilih Orde =-</option>
                        <?php for($i=2;$i<=6;$i++): ?>
                              <option value="<?=$i?>"  <?php if(@$this->input->get('orde') == $i) echo "selected"; ?> ><?=$i?></option>
                         <?php endfor ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Prediksi</label>
                      <input  type="number" class="form-control" name="prediksi" value="<?=@$this->input->get('prediksi')?>" />
                    </div>
                    <div class="form-group col-md-12 ">
                      <button type="submit" class="btn btn-primary" alt="Proses">Proses</button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box-primary -->
        </div><!-- /.col-md -->
      </div><!-- /.row -->
    </section>

    <script type="text/javascript">
      
    </script>

    <?php 
      if(@$this->input->get('produk') &&  $this->input->get('orde') != ''){
        echo $this->regresipolinomiallaporan->tampilAwal($produk_pilihan,$this->input->get('orde'), false, $this->input->get('prediksi'));
      } 
    ?>

  </div>
