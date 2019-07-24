    <?php
            if($id_user==1)
            {

            ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tv"></i>  Beranda
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $user;?></h3>
              <p>Pengguna</p>
            </div>
            <div class="icon">
            <a href="<?php echo base_url();?>index.php/pengguna" class="ion ion-android-contact" style="color:black;"></a>
            </div>
          </div>
        </div>
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $produk;?></h3>
              <p>Produk</p>
            </div>
            <div class="icon">
             <a href="<?php echo base_url();?>index.php/produk" class="ion ion-android-cart" 
              style="color:black;"></a>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $penjualan;?></h3>
              <p>Total Penjualan</p>
            </div>
            <div class="icon">
              <a href="<?php echo base_url();?>index.php/penjualan" class="ion ion-android-apps" 
              style="color:black;"></a>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-black">
          <div class="inner">
              <h3><span id="clock"></span></h3>
              <p>
                <?php
                        $hari = date('l');
                        /*$new = date('l, F d, Y', strtotime($Today));*/
                        if ($hari=="Sunday") {
                         echo "Minggu";
                        }elseif ($hari=="Monday") {
                         echo "Senin";
                        }elseif ($hari=="Tuesday") {
                         echo "Selasa";
                        }elseif ($hari=="Wednesday") {
                         echo "Rabu";
                        }elseif ($hari=="Thursday") {
                         echo("Kamis");
                        }elseif ($hari=="Friday") {
                         echo "Jumat";
                        }elseif ($hari=="Saturday") {
                         echo "Sabtu";
                        }
                        ?>,
                <?php
                            $tgl =date('d');
                            echo $tgl;
                            $bulan =date('F');
                            if ($bulan=="January") {
                             echo " Januari ";
                            }elseif ($bulan=="February") {
                             echo " Februari ";
                            }elseif ($bulan=="March") {
                             echo " Maret ";
                            }elseif ($bulan=="April") {
                             echo " April ";
                            }elseif ($bulan=="May") {
                             echo " Mei ";
                            }elseif ($bulan=="June") {
                             echo " Juni ";
                            }elseif ($bulan=="July") {
                             echo " Juli ";
                            }elseif ($bulan=="August") {
                             echo " Agustus ";
                            }elseif ($bulan=="September") {
                             echo " September ";
                            }elseif ($bulan=="October") {
                             echo " Oktober ";
                            }elseif ($bulan=="November") {
                             echo " November ";
                            }elseif ($bulan=="December") {
                             echo " Desember ";
                            }
                            $tahun=date('Y');
                            echo $tahun;
                            ?>
              </p>
          </div>
          <div class="icon">
            <i class="ion ion-clock" style="color:white;"></i>
          </div>
          </div>
        </div>
        
        <!-- ./col -->
      </div>
      <h3>Selamat Datang <Strong><?php echo $this->session->userdata('nama_lengkap')?></Strong></h3>
    </section>
  </div>

    <?php
            }
            else if($id_user==2)
            {

            ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tv"></i>  Beranda
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $produk;?></h3>
              <p>Produk</p>
            </div>
            <div class="icon">
             <a href="<?php echo base_url();?>index.php/produk" class="ion ion-android-cart" 
              style="color:black;"></a>
            </div>
          </div>
        </div>
         <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $inventori;?></h3>
              <p>Total Penjualan</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-apps" style="color:black;"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php
                        $hari = date('l');
                        /*$new = date('l, F d, Y', strtotime($Today));*/
                        if ($hari=="Sunday") {
                         echo "Minggu";
                        }elseif ($hari=="Monday") {
                         echo "Senin";
                        }elseif ($hari=="Tuesday") {
                         echo "Selasa";
                        }elseif ($hari=="Wednesday") {
                         echo "Rabu";
                        }elseif ($hari=="Thursday") {
                         echo("Kamis");
                        }elseif ($hari=="Friday") {
                         echo "Jumat";
                        }elseif ($hari=="Saturday") {
                         echo "Sabtu";
                        }
                        ?>,
              </h3>
              <p>
                <?php
                            $tgl =date('d');
                            echo $tgl;
                            $bulan =date('F');
                            if ($bulan=="January") {
                             echo " Januari ";
                            }elseif ($bulan=="February") {
                             echo " Februari ";
                            }elseif ($bulan=="March") {
                             echo " Maret ";
                            }elseif ($bulan=="April") {
                             echo " April ";
                            }elseif ($bulan=="May") {
                             echo " Mei ";
                            }elseif ($bulan=="June") {
                             echo " Juni ";
                            }elseif ($bulan=="July") {
                             echo " Juli ";
                            }elseif ($bulan=="August") {
                             echo " Agustus ";
                            }elseif ($bulan=="September") {
                             echo " September ";
                            }elseif ($bulan=="October") {
                             echo " Oktober ";
                            }elseif ($bulan=="November") {
                             echo " November ";
                            }elseif ($bulan=="December") {
                             echo " Desember ";
                            }
                            $tahun=date('Y');
                            echo $tahun;
                            ?>

              </p>
            </div>
            <div class="icon">
             <i class="ion ion-android-calendar" style="color:black;"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-black">
          <div class="inner">
              <h3><span id="clock"></span></h3>
              <p>Waktu</p>
          </div>
          <div class="icon">
            <i class="ion ion-clock" style="color:white;"></i>
          </div>
          </div>
        </div>
        
        <!-- ./col -->
      </div>
      <h3>Selamat Datang <Strong><?php echo $this->session->userdata('nama_lengkap')?></Strong></h3>
    </section>
  </div>
  <?php
        }
  ?>
