<!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
 
                <li <?php if($title=='home' || $title==''){?>class="active"<?php }; ?>>
                    <a href="<?=base_url()?>welcome"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Home</a>
                       <!--<ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#">link1</a></li>
                        <li><a href="#">link2</a></li>
                       </ul>-->
                </li>
                <?php if($this->session->userdata('level')=="master"){?>
                <li <?php if($title=='admin'){?>class="active"<?php }; ?>>
                    <a href="<?=base_url()?>admin"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span> Administrator</a>
                    <!--<ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>link1</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>link2</a></li>
 
                    </ul>-->
                </li>
                <?php }?>
                <li <?php if($title=='anggota'){?>class="active"<?php }; ?>>
                    <a href="<?=base_url()?>anggota"><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span>Anggota</a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-shield fa-stack-1x "></i></span>Simpanan</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <?php if($this->session->userdata('level')=="master"){?>
                        <li <?php if($title=='produk'){?>class="active"<?php }; ?>><a href="<?=base_url()?>produk"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Produk</a></li>
                        <?php }?>
                        <li <?php if($title=='register_simpanan'){?>class="active"<?php }; ?>><a href="<?=base_url()?>register_simpanan"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Pendaftaran</a></li>
                        <!--<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Transaksi</a></li> -->            
                    </ul>
                </li>
                <li>
                    <a href="#"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Pembiayaan</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li <?php if($title=='register_pembiayaan'){?>class="active"<?php }; ?>><a href="<?=base_url()?>register_pembiayaan"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Pendaftaran</a></li>
                        <!--<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Simpanan</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Pembiayaan</a></li> 
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Perhitungan Jasa Simpanan</a></li>-->
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-book fa-stack-1x "></i></span>Laporan</a>
                   <ul class="nav-pills nav-stacked" style="list-style-type:none;">                        
                        <li><a href="<?=base_url()?>lap_hari"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Laporan Harian</a></li>
                        <li><a href="<?=base_url()?>lap_bulan"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Laporan Bulanan</a></li> 
                        <!--<li><a href="<?=base_url()?>lap_simpanan"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Laporan Simpanan</a></li>-->
                        <li><a href="<?=base_url()?>lap_pembiayaan_per_bulan"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Laporan Pembiayaan Per Bulan</a></li> 
                        <li><a href="<?=base_url()?>lap_sisa_angsuran_pembiayaan"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Laporan sisa angsuran Pembiayaan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>tentang"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Tentang</a>
                </li>
                
            </ul>
        </div><!-- /#sidebar-wrapper -->