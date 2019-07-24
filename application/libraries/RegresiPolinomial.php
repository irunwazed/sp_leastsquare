<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegresiPolinomial {

	private static $CI;
    private $X, $Y, $Y2, $B, $matrix, $jum, $orde, $prediksi;

    public function __construct()
    {
        self::$CI = & get_instance();
        $this->jum = 12;

    }

    public function initAwal(){
        $X = $this->X;
        $Y = $this->Y;
        $jum = $this->jum;
        for($i= 0; $i<=$jum;$i++){
            $X[$i][0] = 0;
        }

        for($i= 0; $i<=$jum/2;$i++){
            $Y[$i][0] = 0;
        }

        for($i = 1;$i<=$jum;$i++){
            for($j = 1;$j<=$jum;$j++){
                $X[$i][$j] = pow($X[1][$j],$i);
                $X[$i][0] += $X[$i][$j];
                if($i<=$jum/2){
                    $Y[$i][$j] = $X[$i][$j]*$Y[0][$j];
                    $Y[$i][0] += $Y[$i][$j];
                }
                if($i==1){
                    $Y[0][0] += $Y[0][$j];
                }
            }
        }
        $this->X = $X;
        $this->Y = $Y;
    }

    public function initMatrix(){
        $X = $this->X;
        $Y = $this->Y;
        $jum = $this->jum;
        $matrix = $this->matrix;

        for ($i=0; $i < ($jum/2)+1; $i++) { 
            for ($j=0; $j < ($jum/2)+2; $j++) { 
                if($i== 0&& $j==0){
                    $matrix[$i][$j] = $jum;
                }else if($j == $this->orde +1){
                    $matrix[$i][$j] = $Y[$i][0];
                }else if($j+1<($jum/2)+2){
                    $matrix[$i][$j] = $X[($i+$j)][0];
                }else{
                    $matrix[$i][$j] = $Y[$i][0];
                }
            }
        }

        $this->X = $X;
        $this->Y = $Y;
        $this->matrix = $matrix;
    }



    public function tampilAwal($produk_pilihan, $orde = 6, $tampilAll = true, $prediksi = 13){
        $this->jum = 2*6;
       ?>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Proses Prediksi</a></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-3  table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Periode (X)</th>
                        <th>Stok (Y)</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      $this->orde = $orde;
                      $this->prediksi = $prediksi;
                      foreach ($produk_pilihan as $key) {
                        $this->X[1][$no] = $key->id_bulan;
                        $this->Y[0][$no] = $key->total_stok;
                    ?>
                      <tr>
                        <td><?php echo $key->id_bulan;?></td>
                        <td><?php echo $key->total_stok;?></td>
                      </tr>

                    <?php
                      $no++;
                      }
                      //print_r($this->X[1][2]);
                      
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php $this->proses(); ?>
            </div><!-- /.box-body -->
          </div><!-- /.box-primary -->
        </div><!-- /.col-md -->
      </div><!-- /.row -->
    </section>
       <?php
       
    }

    public function proses(){
        //mpemberian data awal X dan Y
        $this->initAwal();

        //menampilkan tabel total
        $this->tampilTabelTotal();
        
        //memberikan data awal untuk matrix
        $this->initMatrix();
        $this->jum = 2*$this->orde;
        //menampilkan matrix gauss
        $this->tampilMatrixAsli($this->matrix);

        //menjalankan rumus gauss serta menampilkannya
        $this->gauss();
        
        //pencarian nilai b dan Y topi
        $this->pencarianNilai();
        $this->jum = 12;
        //menampilkan grafik hasil
        $this->tampilGrafik();

        // echo "<pre>";
        // print_r($this->matrix);
        // echo "</pre>";

    }

    public function tampilTabelTotal(){
        $X = $this->X;
        $Y = $this->Y;
        $jum = $this->jum;
        $jum2 = 2*$this->orde;
        ?>
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tabel Total</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #cccc14;">
                                    <th>X</th>
                                    <th>Y</th>
                                    <?php for($i=2; $i <=$jum2; $i++) { ?>
                                    <th>X<sup><?=$i?></sup></th>
                                    <?php } ?>
                                    <th>Y*X</th>
                                    <?php for($i=2; $i <=$jum2/2; $i++) { ?>
                                    <th>Y*X<sup><?=$i?></sup></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    
                                    for ($i=1; $i <= $jum+1; $i++) { 
                                        for ($j=1; $j <= $jum2*3/2; $j++) { 
                                            $i==$jum+1?$k=0:$k=$i;
                                            $j>=$jum2+1?$l=$j-$jum2:$l=$j;
                                            if($j==1){
                                                echo "<td>".$X[$l][$k]."</td>";
                                                echo "<td>".$Y[0][$k]."</td>";
                                            }
                                            else if($j <= $jum2){
                                                echo "<td>".$X[$l][$k]."</td>";
                                            }else{
                                                echo "<td>".$Y[$l][$k]."</td>";
                                            }
                                            
                                        }
                                        echo "</tr><tr>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // $this->X = $X;
        // $this->Y = $Y;
    }

    public function tampilMatrix($matrix, $pesan = []){
        $jum = $this->jum;
        ?>
                <div class="row">
                    <div class="col-md-9 table-responsive" style="border: 1px solid; padding: 0px;">
                          <table class="table table-bordered table-striped">
                            <?php
                            for ($i=0; $i < ($jum/2)+1; $i++) { 
                                echo "<tr>";
                                for ($j=0; $j < ($jum/2)+2; $j++) { 
                                    echo "<td>".$matrix[$i][$j]."</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                          </table>
                    </div>
                    <div class="col-md-3">
                       <?php
                       for ($i=0; $i < count($pesan); $i++) { 
                           echo $pesan[$i]."<br>";
                       }
                       ?>
                    </div>
                </div>
                <br>
        <?php
    }

    public function tampilMatrixAsli($matrix){
        $jum = $this->jum;
        ?>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pembuatan Matrix</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8 table-responsive" style="border: 1px solid; padding: 0px;">
                              <table class="table table-bordered table-striped">
                                <?php
                                for ($i=0; $i < ($jum/2)+1; $i++) { 
                                    echo "<tr>";
                                    for ($j=0; $j < ($jum/2)+1; $j++) { 
                                        echo "<td>".$matrix[$i][$j]."</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                              </table>
                        </div>
                        <div class="col-md-1" >
                              <div class="row">
                                <div class="col-md-6" style="text-align: center;position: relative;top: 120px;">
                                  X
                                </div>
                                <div class="col-md-6  table-responsive"  style="border: 1px solid; padding: 0px;">
                                  <table class="table table-bordered table-striped" >
                                    <?php
                                    for ($i=0; $i < ($jum/2)+1; $i++) { 
                                        echo "<tr>";
                                            echo "<td>B$i</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                  </table>
                                </div>
                                  
                              </div>
                        </div>
                        <div class="col-md-1" style="text-align: center;position: relative;top: 120px;">
                            = 
                        </div>
                        <div class="col-md-2 table-responsive" style="border: 1px solid; padding: 5px;">
                              <table class="table table-bordered table-striped">
                                <?php
                                for ($i=0; $i < ($jum/2)+1; $i++) { 
                                    echo "<tr>";
                                    
                                        echo "<td>".$matrix[$i][($jum/2)+1]."</td>";
                                   
                                    echo "</tr>";
                                }
                                ?>
                              </table>
                        </div>

                      </div>
                </div>
            </div>
        <?php
    }

    public function gauss(){
        $jum = $this->jum;
        $matrix = $this->matrix;
        
        
        ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pencarian Nilai B (Metode Gauss)</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
        <?php
        $this->tampilMatrix($matrix);
        for ($i=0; $i <= $jum/2; $i++) { 
            $pesan = array();
            for ($j=$i; $j <= $jum/2; $j++) { 
                
                if($i==$j){
                    $temp = $matrix[$i][$j];
                    for ($k=0; $k <= ($jum/2)+1; $k++) { 
                        $matrix[$i][$k] /=$temp;
                    }
                    array_push($pesan,"B$i <-- B$i/$temp");
                    $this->tampilMatrix($matrix,$pesan);
                    $pesan = array();
                }else{
                    $temp = $matrix[$j][$i];
                    for ($k=0; $k <= ($jum/2)+1; $k++) { 
                        $matrix[$j][$k] =$matrix[$j][$k] - ($temp*$matrix[$i][$k]);
                    }
                    array_push($pesan,"B$j <-- B$j - (B$i*$temp)");
                }
            }
            
            $this->tampilMatrix($matrix,$pesan);
        }
        ?>
            </div>
          </div>
        <?php

        $this->matrix = $matrix;
    }

    public function pencarianNilai(){
        $jum = $this->jum;
        $matrix = $this->matrix;
        $no = $jum/2;

        for ($i=0; $i <= $no ; $i++) { 
            $B[$i] = 0;
            $tampilB[$i] = 'B'.$i.' = ';
            $tampilRumusB[$i] = 'B'.$i.' = ';
        }
        ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pencarian Nilai B (Subtitusi hasil Gauss)</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
        <?php
        for ($i=$no; $i >= 0; $i--) { 
            for ($j=$i; $j <= $no ; $j++) { 
                if($i == $j){
                    $B[$i] = $matrix[$i][$no+1];
                    $tampilB[$i] = $tampilB[$i].$B[$i];
                    $tampilRumusB[$i] = $tampilRumusB[$i].$B[$i];
                }else{
                    $B[$i] -= $matrix[$i][$j]*$B[$j];
                    $tampilB[$i] = $tampilB[$i]." - (".$matrix[$i][$j]." * ".$B[$j].")";
                    $tampilRumusB[$i] = $tampilRumusB[$i]." - (".$matrix[$i][$j]." * B$j)";
                }
                
            }
            
            if($i!=$no){
                echo $tampilRumusB[$i]."<br>";
                echo $tampilB[$i]."<br>";
                echo "B$i = $B[$i]<br><br>";
            }
            else{
                echo $tampilB[$i]."<br>";
                echo "<br>";
            }
        }
        ?>
            </div>
          </div>
        <?php
        $jum = 12;
        // $Y2 = array();
        for ($i=0; $i <= $this->prediksi; $i++) { //$jum+1
            $Y2[$i] = 0;
            $tampilY2[$i] = 'Ý'.$i.' = ';
            $tampilRumusY2[$i] = 'Ý'.$i.' = ';
        }

        ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pencarian Nilai Y topi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
        <?php
        // $jum = 12;
        for ($i=1; $i <= $this->prediksi; $i++) {  //$jum+1 -> 
            for ($j=0; $j <=$this->orde; $j++) { 
                if($j!=0){
                    $Y2[$i] += $B[$j]*pow($i, $j);
                    $tampilRumusY2[$i] = $tampilRumusY2[$i]." + B$j(X<sup>$j</sup>)";
                    $tampilY2[$i] = $tampilY2[$i]." + ".$B[$j]."(".$i."<sup>$j</sup>)";
                }
                else{
                    $Y2[$i] += $B[$j];
                    $tampilRumusY2[$i] = @$tampilRumusY2[$i]."B$j";
                    $tampilY2[$i] = @$tampilY2[$i].$B[$j]."";
                }
            }
            echo "X = $i<br>";
            echo $tampilRumusY2[$i]."<br>";
            echo $tampilY2[$i]."<br>";
            echo "Ý$i = $Y2[$i]<br><br>";
        }
        ?>
            </div>
          </div>
        <?php

        $this->B = $B;
        $this->Y2 = $Y2;

    }

    public function tampilGrafik(){
        ?>
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Menampilkan tabel dan grafik</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr style="background-color: #cccc14;">
                            <th>i</th>
                            <th>X</th>
                            <th>Y</th>
                            <th>Ý</th>
                            <th>∈ = Y - Ý</th>
                            <th>∈r = (∈ / Ý) * 100%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=1; $i <= $this->prediksi; $i++) // $this->jum+1 
                        { 
                            if($i <=12 || $i == $this->prediksi){
                            ?>
                        <tr <?=$i!=$this->prediksi?'':'style="background-color: #fbcccc;"'?>>
                            <td><?=$i?></td>
                            <td><?=$i?></td>
                            <td><?=$i<$this->jum+1?@$this->Y[0][$i]:''?></td>
                            <td><?=number_format($this->Y2[$i], 4,'.','')?></td>
                            <td><?=@$this->Y[0][$i]?number_format(abs(@$this->Y[0][$i] - $this->Y2[$i]), 4, '.', ''):''?></td>
                            <td><?=@$this->Y[0][$i]?(number_format((abs(@$this->Y[0][$i] - $this->Y2[$i])/$this->Y2[$i])*100, 4, '.', '')).' %':''?></td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafik</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" style="height:350px"></canvas>
                  </div>
                  <div class="col-md-12">
                      <div class="col-md-1" style="background-color: #A52A2A; width: 15px; height: 15px;"></div>
                      <div class="col-md-6" style="padding-left: 10px"> Kurva data real</div>
                  </div>
                  <div class="col-md-12">
                      <div class="col-md-1" style="background-color: #0000FF; width: 15px; height: 15px;"></div>
                      <div class="col-md-6" style="padding-left: 10px"> Kurva data prediksi</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
      <!-- /.row -->
    <script type="text/javascript">
         periode = [<?php for($i=1;$i<=$this->jum;$i++){ echo $i.", "; } ?>];
         data1 = [<?php for($i=1;$i<=$this->jum;$i++){ echo $this->Y[0][$i].", "; } ?>];
         data2 = [<?php for($i=1;$i<=$this->jum;$i++){ echo $this->Y2[$i].", "; } ?>];
    </script>

        <?php
    }
}
?>