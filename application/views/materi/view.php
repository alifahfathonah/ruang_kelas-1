<!-- Header -->
     <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
        </div> 
      </div>
    </div>
    <!-- Page content -->

<div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card"> 
              <!-- Card header -->
              <div class="card-header">
                <a href="<?php echo base_url().$this->uri->segment(1); ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Back</button></a>
              </div>
              <!-- Card body --> 
              <div class="card-body">
                <form id="form" method="post" action="<?php echo base_url('materi/update/').$this->uri->segment(3)?>">
                  <div class="form-group">
                    <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> required="" placeholder="Tulis Judul" class="form-control" type="text" name="materi_judul" value="<?php echo $data['materi_judul'] ?>">
                  </div>
                  <div class="form-group">

                    <span>
                      <?php echo $data['materi_isi'] ?>
                    </span>
                  </div>

                </form>
              </div>
            </div>