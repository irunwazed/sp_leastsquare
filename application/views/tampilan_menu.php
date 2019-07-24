    <?php
            if($id_user==1)
            {

            ?>
   <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li>
          <a href="<?php echo base_url();?>index.php/home">
            <i class="fa fa-tv"></i> <span>Beranda</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>index.php/pengguna">
            <i class="fa fa-user text-aqua"></i> <span>Pengguna</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url();?>index.php/produk">
            <i class="fa fa-shopping-cart text-yellow"></i> <span>Produk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>index.php/penjualan">
            <i class="fa fa-th text-red"></i> <span>Penjualan Produk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>index.php/prediksi">
            <i class="fa fa-bar-chart"></i> <span>Analisis Korelasi Produk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url();?>index.php/analisis">
            <i class="fa fa-dashboard"></i> <span>Prediksi Penjualan Produk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>index.php/laporan">
            <i class="fa fa-pencil-square-o text-purple"></i> <span>Laporan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>

 <?php
            }
            else if($id_user==2)
            {

            ?>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li>
          <a href="<?php echo base_url();?>index.php/home">
            <i class="fa fa-tv"></i> <span>Beranda</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>index.php/produk">
            <i class="fa fa-shopping-cart text-yellow"></i> <span>Produk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>index.php/penjualan">
            <i class="fa fa-th text-red"></i> <span>Penjualan Produk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    <?php }
    ?>