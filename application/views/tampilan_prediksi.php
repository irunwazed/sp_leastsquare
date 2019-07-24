  
  <?php
  
  
  
  
  ?>
  
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      <i class="fa fa-dashboard"></i>  Prediksi
      </h1>
      <br>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Prediksi<a href="<?php echo site_url('prediksi')?>" class="btn btn-flat"  title="Refresh" ><i class="fa fa-refresh"></i></a></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <form>
                    <div class="form-group col-md-4">
                      <label>Pilih Produk (Y)</label>
                      <select id="produk" class="form-control select2" name="produk" required autofocus>
                        <option selected="selected" value="<?=@$this->input->get('produk')?>">- Pilih Produk -</option>
                        <?php foreach ($produk as $key): ?>
                              <option value="<?php echo $key->id_produk?>" <?php if(@$this->input->get('produk') == $key->id_produk) echo "selected"; ?> ><?php echo $key->produk?></option>
                         <?php endforeach ?>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label>Pilih Tahun</label>
                      <select id="tahun" class="form-control select2" name="tahun" required autofocus>
                        <option selected="selected" value="<?=@$this->input->get('tahun')?>">- Pilih Tahun -</option>
                        <?php foreach ($tahun as $key): ?>
                              <option value="<?php echo $key->id_tahun?>" <?php if(@$this->input->get('tahun') == $key->id_tahun) echo "selected"; ?> ><?php echo $key->tahun?></option>
                         <?php endforeach ?>
                      </select>
                    </div>

                    <div class="form-group col-md-12 ">
                      <button type="submit" class="btn btn-primary" alt="Proses" name="tombol" value="prediksi">Proses</button>
                    </div>
                  </form>
                  
                </div>

                <?php if(@$_GET['tombol']){ ?>
                <div class="col-md-12">
                  <!-- setting awal -->
                  <?php 
                    $id_produkY = @$_GET['produk']?$_GET['produk']:7;
                    $noX = 0;
                    foreach($produkX as $rowProduk){
                      $adaX = false;
                      for($i = 0; $i < count($rowProduk); $i++){
                        if($rowProduk[$i]->id_produk == $id_produkY){
                          $Y[$i] = $rowProduk[$i]->jumlah;
                          $Ynama = $rowProduk[$i]->produk;
                        }else{
                          $X[$noX][$i] = $rowProduk[$i]->jumlah;
                          $Xnama[$noX] = $rowProduk[$i]->produk;
                          $adaX = true;
                        }
                      }
                      if($adaX){
                        $noX++;
                      }
                      
                    }
                    // echo "<pre>";
                    // print_r($Xnama);
                    // print_r($produkX[6][0]->id_produk);
                    // echo "</pre>";
                  ?>
                  <!-- semua tabel -->
                  <button class="btn btn-info" onclick="setHide('table-semua')">tampil Semua Tabel</button>
                  <div id="table-semua" class="set-hide">
                    <h3>Semua Tabel</h3>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <?php
                          foreach($produkX as $rowProduk){
                            if($rowProduk[0]->id_produk == $id_produkY){
                              echo '<th>'.$rowProduk[0]->produk.'</th>';
                            }
                          }
                          foreach($produkX as $rowProduk){
                            if($rowProduk[0]->id_produk != $id_produkY){
                              echo '<th>'.$rowProduk[0]->produk.'</th>';
                            }
                          }
                          ?>
                        </tr>
                        <tr>
                          <th>Y</th>
                          <?php
                            $no = 1;
                            foreach($produkX as $rowProduk){
                              if($rowProduk[0]->id_produk != $id_produkY){
                                echo '<th>X'.$no.'</th>';
                                $no++;
                              }
                            }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        
                          for($i = 0; $i < count($Y); $i++){
                            $noX = 0;
                            echo "<tr>";
                            echo '<td>'.$Y[$i].'</td>';
                            for($j = 0; $j < count($X); $j++){
                              echo '<td>'.$X[$j][$i].'</td>';
                            }
                            echo "</tr>";
                          }
                          echo "<tr>";

                          $jumY = array_sum($Y);
                          echo '<th>'.$jumY.'</th>';
                          for($j = 0; $j < count($X); $j++){
                            $jumX[$j] = array_sum($X[$j]);
                            echo '<th>'.$jumX[$j].'</th>';
                          }
                          echo "</tr>";
                        ?>
                      </tbody>
                    </table>
                  </div>
                    
                  <!-- perbandingan -->
                  <button class="btn btn-info" onclick="setHide('table-perbandingan')">tampil semua penjelasan perbandingan</button>
                  <div id="table-perbandingan" class="set-hide">
                    <?php
                      $rMax = 0;
                      $rIndex = 0;
                    ?>
                    <?php for($no = 0; $no < count($X); $no++){ ?>
                    <div id="table-perbandingan-<?=$no?>">
                      <h4> <?=$no+1?>. Perbandingan <?=$Ynama." dan ".$Xnama[$no]?> </h4>
                      <div class="row"> 
                        <div class="col-sm-6">
                          <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Y</th>
                                <th>X</th>
                                <th>XY</th>
                                <th>X^2</th>
                                <th>Y^2</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $setJumY = 0;
                              $setJumX = 0;
                              $setJumXY = 0;
                              $setJumX2 = 0;
                              $setJumY2 = 0;
                              for($i = 0; $i < count($Y); $i++){ 
                                $setJumY += $Y[$i];
                                $setJumX += $X[$no][$i];
                                $setJumXY += $X[$no][$i]*$Y[$i];
                                $setJumX2 += pow($X[$no][$i],2);
                                $setJumY2 += pow($Y[$i],2);
                              ?>
                              <tr>
                                <td><?=$Y[$i]?></td>
                                <td><?=$X[$no][$i]?></td>
                                <td><?=$X[$no][$i]*$Y[$i]?></td>
                                <td><?=pow($X[$no][$i],2)?></td>
                                <td><?=pow($Y[$i],2)?></td>
                              </tr>
                              <?php } ?>
                              <tr>
                                <th><?=$setJumY?></th>
                                <th><?=$setJumX?></th>
                                <th><?=$setJumXY?></th>
                                <th><?=$setJumX2?></th>
                                <th><?=$setJumY2?></th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-sm-6">
                          <?php
                            $r[$no] = $this->leastsquare->hitung($Y,$X[$no]);
                            if($rMax < $r[$no]){
                              $rMax = $r[$no];
                              $rIndex = $no;
                            }
                          ?>
                          <h5>r = <?=$r[$no]?></h5>
                        </div>
                      </div>
                      
                    </div>
                    <?php } ?>
                  </div>
                  <!-- . perbandingan -->
                  
                  <!-- perbandingan2 -->
                  <div id="table-perbandingan2">
                    <h4>  Perbandingan  </h4>
                      <div class="row"> 
                        <div class="col-sm-6">
                          <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Produk (Y)</th>
                                <th>Produk (X)</th>
                                <th>Korelasi (r)</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php for($no = 0; $no < count($X); $no++){ ?>
                              <tr <?=$no==$rIndex?'style="background-color: red; color:white;"':''?>>
                                <td><?=$no+1?></td>
                                <td><?=$Ynama?></td>
                                <td><?=$Xnama[$no]?></td>
                                <td><?=number_format($r[$no],4,",",".")?></td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-sm-6">
                          
                        </div>
                      </div>
                  </div>
                  <!-- . perbandingan2 -->

                  <!-- korelasi -->
                  <button class="btn btn-info" onclick="setHide('korelasi')">tampil korelasi Maximal</button>
                  <div id="korelasi" class="set-hide">
                    <?php

                      $setJumY = 0;
                      $setJumX = 0;
                      $setJumXY = 0;
                      $setJumX2 = 0;
                      $setJumY2 = 0;
                      for($i = 0; $i < count($Y); $i++){ 
                        $setJumY += $Y[$i];
                        $setJumX += $X[$rIndex][$i];
                        $setJumXY += $X[$rIndex][$i]*$Y[$i];
                        $setJumX2 += pow($X[$rIndex][$i],2);
                        $setJumY2 += pow($Y[$i],2);
                      }
                      
                      $Yrata = $setJumY/count($Y);
                      $Xrata = $setJumX/count($X);
                      $varA = $Yrata;
                      $varB = $setJumXY/$setJumX2;
                    ?>
                    <h4>Korelasi <?=$Ynama?> dan <?=$Xnama[$rIndex]?></h4>
                    <div class="row"> 
                      <div class="col-sm-6">
                        
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Y</th>
                              <th>&#376;</th>
                              <th>E = IY-&#376;I</th>
                              <th>Er</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $hasilPrediksi = $varA+($varB*(count($Y)+1));
                              for($i = 0; $i < count($Y); $i++){ 
                              
                                $Ytopi = $varA+($varB*($i+1));
                                $E = ABS($Y[$i] - $Ytopi);
                                $Er = ($E/$Ytopi)*100;
                            ?>
                            <tr>
                              <td><?=$i+1?></td>
                              <td><?=$Y[$i]?></td>
                              <td><?=number_format($Ytopi,2,",",".")?></td>
                              <td><?=number_format($E,2,",",".")?></td>
                              <td><?=number_format($Er,2,",",".")?>%</td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td><?=count($Y)+1?></td>
                              <td></td>
                              <td style="background-color:yellow;"><?=number_format($hasilPrediksi,2,",",".")?></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-sm-6">
                      </div>
                    </div>
                  </div>  
                </div>
                <?php } ?>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box-primary -->
        </div><!-- /.col-md -->
      </div><!-- /.row -->
    </section>

    <script type="text/javascript">
    
      
    </script>


  </div>
