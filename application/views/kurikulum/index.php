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
                <h3 class="mb-0">Kompetensi inti & Kompetensi dasar</h3>
              </div>
              <!-- Card body --> 
              <div class="card-body">
                <form id="form" method="post" action="<?php echo base_url('kurikulum/edit/').$data['kurikulum_id']; ?>">

                  <textarea name="kurikulum_isi" id="editor1" rows="10" cols="80"><?php echo $data['kurikulum_isi'] ?></textarea>

                <?php if($this->session->userdata('level') == 1): ?>
                <br/>
                  <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-cog fa-spin"></i> Simpan Perubahan</button>
                <?php endif ?>

                </form>
              </div>
            </div>