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

                <?php if($this->session->userdata('level') == 1): ?>
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <?php endif ?>
                
              </div>
            </div>

            <div class="card-body">
              <form method="post" action="<?php echo base_url('profile/save') ?>" enctype="multipart/form-data">
                <div class="col-lg-3">
                  <div class="form-group">

                  <?php if (@!$data['detail_foto'] == null): ?>
                    <img class="img-thumbnail" src="<?php echo @base_url('assets/foto/').$data['detail_foto'] ?>" width="250">
                  <?php else: ?>
                    <img class="img-thumbnail" src="<?php echo @base_url('assets/foto/noimage.gif') ?>" width="250">
                  <?php endif ?>

                  <?php if($this->session->userdata('level') == 1): ?>
                    <input class="form-control" type="file" name="detail_foto" accept="image/*">
                  <?php endif ?>

                  </div>
                </div>
                <hr class="my-4">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> type="text" id="input-username" class="form-control" placeholder="Username" name="detail_username" value="<?php echo @$data['detail_username'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> type="email" name="detail_email" id="input-email" class="form-control" value="<?php echo @$data['detail_email'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> type="text" id="input-first-name" class="form-control" placeholder="First name" value="<?php echo @$data['detail_first_name'] ?>" name="detail_first_name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> type="text" id="input-last-name" class="form-control" placeholder="Last name" value="<?php echo @$data['detail_last_name'] ?>" name="detail_last_name">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> id="input-address" name="detail_address" class="form-control" placeholder="" value="<?php echo @$data['detail_address'] ?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> type="text" id="input-city" class="form-control" placeholder="City" value="<?php echo @$data['detail_city'] ?>" name="detail_city">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> type="text" id="input-country" class="form-control" placeholder="Country" value="<?php echo @$data['detail_country'] ?>" name="detail_country">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> type="number" id="input-postal-code" class="form-control" placeholder="" value="<?php echo @$data['detail_pos'] ?>" name="detail_pos">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <textarea <?= ($this->session->userdata('level') == 1)?'':'readonly=""' ?> name="detail_about" rows="4" class="form-control" placeholder="A few words about you ..."><?php echo @$data['detail_about'] ?></textarea>
                  </div>
                </div>

                <?php if($this->session->userdata('level') == 1): ?>
                <hr class="my-4">
                <div class="pl-lg-4">
                  <div class="form-group">
                  <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-user-cog"></i> Save Changes</button>
                  </div>
                </div>
                <?php endif ?>

              </form>
            </div>

            </div>

            