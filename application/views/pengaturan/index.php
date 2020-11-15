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
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"><?php echo $title; ?> </h3>
                </div>
                
              </div>
            </div>

            <div class="card-body">
              
              <form method="post" action="<?php echo base_url('pengaturan/save') ?>" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="form-control-label">Gambar Logo</label>
                  <br/>
                  <img class="img-thumbnail" src="<?php echo base_url('assets/pengaturan/').$data['pengaturan_logo'] ?>" width="100">
                  <input class="form-control" type="file" name="pengaturan_logo">
                </div>

                <div class="form-group">
                  <label class="form-control-label">KKM Evaluasi</label>
                  <input class="form-control" value="<?php echo $data['pengaturan_kkm'] ?>" type="number" name="pengaturan_kkm">
                </div>

                <div class="form-group">
                  <label class="form-control-label">Gambar Background</label>
                  <br/>
                  <img class="img-thumbnail" src="<?php echo base_url('assets/pengaturan/').$data['pengaturan_background'] ?>" width="100">
                  <input class="form-control" type="file" name="pengaturan_background">
                  <br/>
                  <label class="custom-toggle">
                    <input onclick="toggle()" id="background-toggle" type="checkbox" <?php echo ($data['pengaturan_background_status'] == 'on')? 'checked=""':'' ?> name="pengaturan_background_status">
                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                  </label>
                </div>

                <div class="form-group">
                  <label class="form-control-label">Warna Latar Belakang</label>
                  <input class="form-control" type="color" name="pengaturan_latar" value="<?php echo @$data['pengaturan_latar'] ?>">
                  <br/>
                  <label class="custom-toggle">
                    <input onclick="toggle1()" id="latar-toggle" type="checkbox" <?php echo ($data['pengaturan_latar_status'] == 'on')? 'checked=""':'' ?> name="pengaturan_latar_status">
                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                  </label>
                </div>

                <hr>

                <button type="submit" class="btn btn-success btn-sm" type="submit"><i class="fa fa-cog fa-spin"></i> Save Changes</button>
              </form>

            </div>

            </div>

            