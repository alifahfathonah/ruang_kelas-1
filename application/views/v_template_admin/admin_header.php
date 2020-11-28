<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>RUANG KELAS</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url() ?>assets/pengaturan/icon.png" type="image/png">

  <!-- Fonts -->  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  
  <!-- Block --> 
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/block/popup.css" type="text/css">
 
  <!-- Icons -->  
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/nucleo/css/nucleo.css" type="text/css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css"> 
   
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">

  <!--editor-->
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/quill/dist/quill.core.css">

  <!-- Page plugins -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/animate.css/animate.min.css">

  <!--sweet alert-->
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/vendor/sweetalert2/dist/sweetalert2.min.css">

  <!--core-->
  <link rel="stylesheet" href="<?php echo base_url() ?>/argon/assets/css/argon.css?v=1.1.0" type="text/css">

  <!--jquery -->
  <script src="<?php echo base_url() ?>/argon/assets/vendor/jquery/dist/jquery.min.js"></script>

</head>

<?php if ($this->session->userdata('latar-status') == 'on'): ?>
  <body style="background-color: <?php echo @$this->session->userdata('latar'); ?>;">
<?php else: ?>
  <body style="background-image: url('<?php echo base_url('assets/pengaturan/').$this->session->userdata('background'); ?>');">
<?php endif ?>

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main" style="padding-right: 1%;">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="<?php echo base_url() ?>dashboard">
          <img src="<?php echo base_url() ?>/assets/pengaturan/<?php echo $this->session->userdata('logo'); ?>" class="navbar-brand-img" alt="..." style="max-height: none;">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">

            <li class="nav-item">
              <a class="nav-link" href=" <?php echo base_url('dashboard') ?>"> 
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </a>
            </li>
              
            <?php if ($this->session->userdata('level') == 1): ?>
              
              <li class="nav-item">
                <a class="nav-link" href=" <?php echo base_url('kelas') ?>"> 
                  <i class="ni ni-building text-pink"></i> Kelas
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href=" <?php echo base_url('mapel') ?>"> 
                  <i class="ni ni-briefcase-24 text-green"></i> Mata Pelajaran
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('guru') ?>"> 
                  <i class="ni ni-archive-2 text-red"></i>Data&#160;Guru
                </a>
              </li>

            <?php endif ?>

            <?php if ($this->session->userdata('level') < 3): ?>

              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('siswa') ?>"> 
                  <i class="ni ni-single-02 text-black"></i>Data&#160;Siswa
                </a>
              </li>

             <?php endif ?>

              <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kurikulum') ?>">
                  <i class="ni ni-single-copy-04 text-pink"></i> KI&#160;&&#160;KD
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('film') ?>">
                  <i class="ni ni-button-play text-orange"></i> Video&#160;Pembelajaran
                </a>
              </li>             

              <li class="nav-item">
                <a class="nav-link " href="<?php echo base_url('materi') ?>">
                  <i class="ni ni-collection text-default"></i> Materi
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#evaluasi" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                  <i class="ni ni-ruler-pencil text-green"></i>
                  <span class="nav-link-text">Evaluasi</span>
                </a>
                <div class="collapse" id="evaluasi">
                  <ul class="nav nav-sm flex-column">

                  <?php if ($this->session->userdata('level') < 3): ?>
                    <li class="nav-item"> 
                      <a href="<?php echo base_url('uraian') ?>" class="nav-link">Soal Uraian</a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url('evaluasi') ?>" class="nav-link">Soal Evaluasi</a>
                    </li>
                  <?php endif ?>

                  <?php if ($this->session->userdata('level') == 3): ?>
                    <li class="nav-item">
                      <a href="<?php echo base_url('evaluasi/kerjakan') ?>" class="nav-link">Kerjakan Evaluasi</a>
                    </li>
                  <?php endif ?>

                  
                    <li class="nav-item">
                      <a href="<?php echo base_url('evaluasi/view_hasil') ?>" class="nav-link">Hasil Evaluasi</a>
                    </li>
                  
                  
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="<?php echo base_url('diskusi') ?>">
                  <i class="ni ni-chat-round text-primary"></i> Diskusi
                </a>
              </li>

              <?php if ($this->session->userdata('level') == 1): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('profile') ?>">
                    <i class="ni ni-circle-08 text-orange"></i> Profile
                 </a>
               </li>
              <?php endif ?>

              <?php if ($this->session->userdata('level') == 1): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pengaturan') ?>">
                  <i class="ni ni-settings text-pink"></i> Pengaturan
                </a>
              </li>  
              <?php endif ?>
              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('login/logout') ?>">
                  <i class="ni ni-user-run text-default"></i> Logout
                </a>
              </li>
          </ul>
          
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


          <div class="col-lg-6 col-7 d-none d-md-inline-block">
              
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item text-white"><?php echo $breadcumb; ?></li>
                </ol>
              </nav>
            </div>
          

          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <!-- <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?php echo base_url() ?>/argon/assets/img/theme/team-4.jpg">
                  </span> -->
                  <i class="fa fa-cog fa-spin"></i>
                  <div class="media-body ml-2 d-none d-lg-block">

                    <?php 
                      $l = $this->session->userdata('level');
                      switch ($l) {
                        case "1":
                          $lev = 'Admin';
                          break;
                        case "2":
                          $lev = 'Guru';
                          break;
                        case "3":
                          $lev = 'Siswa';
                          break;
                      }

                     ?>

                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $this->session->userdata('name'); ?> ( <?php echo $lev ?> )</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="<?php echo base_url('profile') ?>" class="dropdown-item">
                  <i class="ni ni-circle-08"></i>
                  <span>Profile</span>
                </a>

                <?php if ($this->session->userdata('level') == 1): ?>
                  <a href="<?php echo base_url('pengaturan') ?>" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Pengaturan</span>
                  </a>
                <?php endif ?>

                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url('login/logout') ?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>