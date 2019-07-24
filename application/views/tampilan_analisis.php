  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      <i class="fa fa-dashboard"></i>  Analisis Korelasi Produk
      </h1>
      <br>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Analisis Korelasi<a href="<?php echo site_url('analisis')?>" class="btn btn-flat"  title="Refresh" ><i class="fa fa-refresh"></i></a></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <form>
                    <div class="form-group col-md-3">
                      <label>Pilih Produk (Y)</label>
                      <select id="produk" class="form-control select2" name="produkY" required autofocus>
                        <option selected="selected" value="<?=@$this->input->get('produkY')?>">- Pilih Produk -</option>
                        <?php foreach ($produk as $key): ?>
                              <option value="<?php echo $key->id_produk?>" <?php if(@$this->input->get('produkY') == $key->id_produk) echo "selected"; ?> ><?php echo $key->produk?></option>
                         <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Pilih Produk (X)</label>
                      <select id="produk" class="form-control select2" name="produkX" required autofocus>
                        <option selected="selected" value="<?=@$this->input->get('produkX')?>">- Pilih Produk -</option>
                        <?php foreach ($produk as $key): ?>
                              <option value="<?php echo $key->id_produk?>" <?php if(@$this->input->get('produkX') == $key->id_produk) echo "selected"; ?> ><?php echo $key->produk?></option>
                         <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Pilih Tahun</label>
                      <select id="tahun" class="form-control select2" name="tahun" required autofocus>
                        <option selected="selected" value="<?=@$this->input->get('tahun')?>">- Pilih Tahun -</option>
                        <?php foreach ($tahun as $key): ?>
                              <option value="<?php echo $key->id_tahun?>" <?php if(@$this->input->get('tahun') == $key->id_tahun) echo "selected"; ?> ><?php echo $key->tahun?></option>
                         <?php endforeach ?>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Pilih Bulan Prediksi</label>
                      <select id="tahun" class="form-control select2" name="prediksiKe" required autofocus>
                        <option selected="selected" value="<?=@$this->input->get('prediksiKe')?>">- Pilih Bulan Prediksi -</option>
                        <?php for ($i = 13; $i <= 24; $i++): ?>
                              <option value="<?php echo $i?>" <?php if(@$this->input->get('prediksiKe') == $i) echo "selected"; ?> ><?php echo $i?></option>
                         <?php endfor ?>
                      </select>
                    </div>

                    <div class="form-group col-md-12 ">
                      <button type="submit" class="btn btn-primary" alt="Proses" name="tombol" value="analisis">Proses</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">


                  
                  <?php if(@$_GET['tombol']){ ?>

                    <?php
                    //set awal
                    $Xnama = $produkX[0]->produk;
                    $Ynama = $produkY[0]->produk;
                    
                    for($i = 0; $i < count($produkX); $i++){
                      $X[$i] = $produkX[$i]->jumlah;
                      $Y[$i] = $produkY[$i]->jumlah;
                    }
                  
                  
                  ?>
                  
                  <div id="table-perbandingan">
                    <h4> Perbandingan <?=$Ynama." dan ".$Xnama?> </h4>
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
                              $setJumX += $X[$i];
                              $setJumXY += $X[$i]*$Y[$i];
                              $setJumX2 += pow($X[$i],2);
                              $setJumY2 += pow($Y[$i],2);
                            ?>
                            <tr>
                              <td><?=$Y[$i]?></td>
                              <td><?=$X[$i]?></td>
                              <td><?=$X[$i]*$Y[$i]?></td>
                              <td><?=pow($X[$i],2)?></td>
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
                        <div class="chart">
                          <canvas id="lineChartR" style="height:350px"></canvas>
                        </div>
                        <?php
                          $r = $this->leastsquare->hitung($Y,$X);
                        ?>
                        <table style="text-align: center; width:100%; border:1px solid;">
                            <thead>
                              <tr style=" background-color:orange;">
                                <th colspan="3">r</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="border-bottom:1px solid black">n&Sigma;XY - (&Sigma;X * &Sigma;Y)</td>
                                <td rowspan="2" style="width:20px">=</td>
                                <td rowspan="2"><?=number_format($r,4,",",".")?></td>
                              </tr>
                              <tr>
                                <td>&radic;(n&Sigma;X<sup>2</sup>-(&Sigma;X)<sup>2</sup>)*(n&Sigma;Y<sup>2</sup>-(&Sigma;Y)<sup>2</sup>)</td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </div>


                  <!-- korelasi -->
                  <div>
                      <?php
                      // print_r($produkX);
                        $setJumY = 0;
                        $setJumX = 0;
                        $setJumXY = 0;
                        $setJumX2 = 0;
                        $setJumY2 = 0;
                        for($i = 0; $i < count($Y); $i++){ 
                          $setJumY += $Y[$i];
                          $setJumX += $X[$i];
                          $setJumXY += $X[$i]*$Y[$i];
                          $setJumX2 += pow($X[$i],2);
                          $setJumY2 += pow($Y[$i],2);
                        }
                        
                        $Yrata = $setJumY/count($Y);
                        $Xrata = $setJumX/count($X);
                        $varA = $Yrata;
                        $varB = $setJumXY/$setJumX2;
                      ?>
                      <h4>Korelasi <?=$Ynama?> dan <?=$Xnama?></h4>
                      <div class="row"> 
                        <div class="col-sm-7">
                        <table style="text-align: center; width:100%; border:1px solid;">
                            <thead>
                              <tr style=" background-color:orange;">
                                <th colspan="3">Y rata-rata (Yr)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="border-bottom:1px solid black">&Sigma;Y</td>
                                <td rowspan="2" style="width:20px">=</td>
                                <td rowspan="2"><?=number_format($Yrata,3,",",".")?></td>
                              </tr>
                              <tr>
                                <td>n</td>
                              </tr>
                            </tbody>
                          </table>
                          <br>
                          <table style="text-align: center; width:100%; border:1px solid;">
                            <thead>
                              <tr style=" background-color:orange;">
                                <th colspan="3">X rata-rata (Xr)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="border-bottom:1px solid black">&Sigma;X</td>
                                <td rowspan="2" style="width:20px">=</td>
                                <td rowspan="2"><?=number_format($Xrata,3,",",".")?></td>
                              </tr>
                              <tr>
                                <td>n</td>
                              </tr>
                            </tbody>
                          </table>
                          <br>
                          <table style="text-align: center; width:100%; border:1px solid;">
                            <thead>
                              <tr style=" background-color:orange;">
                                <th colspan="3">a</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="border-bottom:1px solid black">&Sigma;Y</td>
                                <td rowspan="2" style="width:20px">=</td>
                                <td rowspan="2"><?=number_format($varA,3,",",".")?></td>
                              </tr>
                              <tr>
                                <td>n</td>
                              </tr>
                            </tbody>
                          </table>
                          <br>
                          <table style="text-align: center; width:100%; border:1px solid;">
                            <thead>
                              <tr style=" background-color:orange;">
                                <th colspan="3">b</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="border-bottom:1px solid black">&Sigma;XY</td>
                                <td rowspan="2" style="width:20px">=</td>
                                <td rowspan="2"><?=number_format($varB,3,",",".")?></td>
                              </tr>
                              <tr>
                                <td>&Sigma;X<sup>2</sup></td>
                              </tr>
                            </tbody>
                          </table>
                          <br>
                        </div>
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
                              $prediksiKe = @$_GET['prediksiKe']?$_GET['prediksiKe']:13;
                                $Ytopi[count($Y)+1] = $varA+($varB*(count($Y)+1));
                                for($i = 0; $i < $prediksiKe; $i++){ 
                                
                                  $Ytopi[$i] = $varA+($varB*($i+1));
                                  $E = ABS(@$Y[$i] - @$Ytopi[$i]);
                                  $Er = ($E/@$Ytopi[$i])*100;
                                  if($i >= count($Y)){
                                    $E = 0;
                                    $Er = 0;
                                  }
                              ?>
                              <tr>
                                <td><?=$i+1?></td>
                                <td><?=@$Y[$i]?></td>
                                <td <?=$i+1 == $prediksiKe?'style="background-color:yellow;"':''?> ><?=number_format($Ytopi[$i],3,",",".")?></td>
                                <td><?=$i < count($Y)?number_format(@$E,3,",","."):''?></td>
                                <td><?=$i < count($Y)?number_format(@$Er,2,",",".").'%':''?></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-sm-6">
                        <h4 style="text-align: center;">Grafik Prediksi</h4>
                        <div class="chart">
                          <canvas id="lineChart" style="height:350px"></canvas>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="col-md-1" style="background-color: #A52A2A; width: 15px; height: 15px;"></div>
                            <div class="col-md-6" style="padding-left: 10px"> Kurva data prediksi</div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-1" style="background-color: #0000FF; width: 15px; height: 15px;"></div>
                            <div class="col-md-6" style="padding-left: 10px"> Kurva data real</div>
                        </div>

                        </div>
                      </div>
                    </div>  
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box-primary -->
        </div><!-- /.col-md -->
      </div><!-- /.row -->
    </section>

    <script type="text/javascript">
      
    </script>
    
    <script type="text/javascript">
        jum = <?=$prediksiKe?>;
        periode2 = [];
        for(let i = 1; i <= jum; i++){
          periode2[i-1] = i;
        }
        console.log(periode2);
        //  periode2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ];
         data12 = <?=json_encode($Ytopi)?>;
         data22 = <?=json_encode($Y)?>;

         periodeR = <?=json_encode($Y)?>;
         data2R = <?=json_encode($X)?>;
         data1R = [];

         chartAnalisis = true;
         chartR = false;

    </script>



  </div>
