<!DOCTYPE html>
<html>
 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?php echo $title; ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url() ?>assets/pengaturan/icon.png" type="image/png">
  <!-- Fonts -->  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>argon/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() ?>argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>argon/assets/css/argon.css?v=1.1.0" type="text/css">
</head> 

<?php if ($this->session->userdata('latar-status') == 'on'): ?>
  <body style="background-color: <?php echo @$this->session->userdata('latar'); ?>;">
<?php else: ?>
  <body style="background-image: url('<?php echo base_url('assets/pengaturan/').$this->session->userdata('background'); ?>');">
<?php endif ?>
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header py-7 pt-lg-3">
      <div class="container">
        <div class="header-body text-center mb-4">
          <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-8 px-5">
              <!-- <h1 class="text-white">BIMBLE | BIMBINGAN BELAJAR</h1> -->
              <img src="<?php echo base_url() ?>/assets/pengaturan/<?php echo $this->session->userdata('logo'); ?>" class="navbar-brand-img" style="max-height: none; width: 50%;">
              <p class="text-lead text-white">Silakan masukan email dan password anda dengan benar</p>
            </div>

          </div>
        </div>
      </div>
      
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                &#160;

                <?php if (@$this->session->flashdata('gagal')): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><?php echo $this->session->flashdata('gagal'); ?></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                <?php endif ?>

              </div>
              <form method="post" role="form" action="<?php echo base_url('login/auth') ?>">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="text" name="user_email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="user_password">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <select required="" class="form-control" name="user_level">
                      <option value="" hidden="">Pilih Level</option>
                      <option value="1">Admin</option>
                      <option value="2">Guru</option>
                      <option value="3">Siswa</option>
                    </select>
                  </div>
                </div>

                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  
  <!-- Core -->
  <script src="<?php echo base_url() ?>argon/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>argon/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url() ?>argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url() ?>argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url() ?>argon/assets/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?php echo base_url() ?>argon/assets/js/demo.min.js"></script>
</body>

</html>