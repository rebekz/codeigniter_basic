

<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="javascript:;" class="logo"><div style="display:block;"></div></a>
            <div class="menu-toggler sidebar-toggler">
            </div>
            <div class="pull-right">
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            </a>
            </div>
        </div>

        <!-- END LOGO -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile">
                            <?php echo $this->session->userdata('nama_lengkap') ?> </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <img alt="" class="img-circle" src="<?php echo $base_uri ?>assets/img/avatar.png">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo $base_uri ?>users/edit/profile">
                                    <i class="icon-user"></i> Profile saya </a>
                                </li>
                                <li>
                                    <a href="<?php echo $base_uri ?>main/logout">
                                    <i class="icon-key"></i> Keluar </a>
                                </li>
                            </ul>
                    </li>
                </ul>
            </div>

        </div>              
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

<div class="clearfix">
</div>

<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar  md-shadow-z-2-i navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="start <?php if($active == 'dashboard') echo 'active' ?>">
                    <a href="<?php echo $base_uri ?>main">
                     <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="start <?php $arr = explode('_', $active); echo $arr[0] == 'komponen' ? 'active' : '' ?>">
                    <a href="javascript:;">
                     <i class="icon-drawer"></i>
                    <span class="title">Keuangan Komponen</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php echo $active == 'komponen_view' ? 'active' : '' ?>">
                            <a href="<?php echo $base_uri ?>komponen/view">
                                Lihat Laporan
                            </a>
                        </li>
                        <li class="<?php echo $active == 'komponen_add' ? 'active' : '' ?>">
                            <a href="<?php echo $base_uri ?>komponen/add">
                                Input Realisasi
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="start <?php $arr = explode('_', $active); echo $arr[0] == 'kategori' ? 'active' : '' ?>">
                    <a href="javascript:;">
                     <i class="icon-support"></i>
                    <span class="title">Keuangan Kategori</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php echo $active == 'kategori_view' ? 'active' : '' ?>">
                            <a href="<?php echo $base_uri ?>kategori/view">
                                Lihat Laporan
                            </a>
                        </li>
                        <li class="<?php echo $active == 'kategori_add' ? 'active' : '' ?>">
                            <a href="<?php echo $base_uri ?>kategori/add">
                                Input Realisasi
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="start <?php $arr = explode('_', $active); echo $arr[0] == 'kpi' ? 'active' : '' ?>">
                    <a href="javascript:;">
                     <i class="icon-folder"></i>
                    <span class="title">Key Performance Indicator</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php echo $active == 'kpi_view' ? 'active' : '' ?>">
                            <a href="<?php echo $base_uri ?>kpi/view">
                                Lihat Laporan
                            </a>
                        </li>
                        <li class="<?php echo $active == 'kpi_add' ? 'active' : '' ?>">
                            <a href="<?php echo $base_uri ?>kpi/add">
                                Input Realisasi
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="<?php $arr = explode('/', $active); if($arr[0] == 'komponen' || $arr[0] == 'kategori' || $arr[0] == 'kpi') echo 'active open'; ?>">
                    <a href="javascript:;">
                    <i class="icon-settings"></i>
                    <span class="title"> Mengatur & Tambah</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php echo $arr[0] == 'komponen' ? 'active open' : '' ?>">
                            <a href="javascript:;">
                            </i> Komponen <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($active == 'komponen/add_daftar') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>komponen/add_daftar">
                                    Daftar Keuangan Komponen</a>
                                </li>
                                <li class="<?php if($active == 'komponen/add_uraian') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>komponen/add_uraian">
                                    Uraian Keuangan Komponen</a>
                                </li>
                                <li class="<?php if($active == 'komponen/pagu') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>komponen/pagu">
                                    Pagu Keuangan Komponen</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php echo $arr[0] == 'kategori' ? 'active open' : '' ?>">
                            <a href="javascript:;">
                            </i> Kategori <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($active == 'kategori/add_daftar') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>kategori/add_daftar">
                                    Daftar Keuangan Kategori</a>
                                </li>
                                <li class="<?php if($active == 'kategori/add_uraian') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>kategori/add_uraian">
                                    Uraian Keuangan Kategori</a>
                                </li>
                                <li class="<?php if($active == 'kategori/pagu') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>kategori/pagu">
                                    Pagu Keuangan Kategori</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php echo $arr[0] == 'kpi' ? 'active open' : '' ?>">
                            <a href="javascript:;">
                            </i> Key Performance Indicator <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($active == 'kpi/add_daftar') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>kpi/add_daftar">
                                    Daftar KPI</a>
                                </li>
                                <li class="<?php if($active == 'kpi/add_uraian') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>kpi/add_uraian">
                                    Indikator Hasil KPI</a>
                                </li>
                                <li class="<?php if($active == 'kpi/baseline') echo 'active' ?>">
                                    <a href="<?php echo $base_uri ?>kpi/baseline">
                                    Baseline & Target KPI</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                </li>
                <?php if($this->auth->isAdmin()) { ?>
                    <li class="<?php $arr = explode('/', $active); if($arr[0] == 'users') echo 'active open'; ?>">
                        <a href="javascript:;">
                        <i class="icon-users"></i>
                        <span class="title">Users</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <?php if($this->session->userdata("level_user") == '10') { ?>
                            <li class="<?php if($active == 'users/view') echo 'active' ?>">
                                <a href="<?php echo $base_uri ?>users/view">
                                 Manejemen Users</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?> 

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->