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
                <form id="form" method="post" action="<?php echo base_url('materi/insert')?>">
                  <div class="form-group">
                    <input required="" placeholder="Tulis Judul" class="form-control" type="text" name="materi_judul">
                  </div>
                  <div class="form-group">
                    <select name="materi_mapel" required="" class="form-control">
                      <option value="" hidden="">-- Pilih --</option>
                      <?php foreach ($mapel_data as $key): ?>
                        <option value="<?php echo $key['mapel_id'] ?>"><?php echo $key['mapel_nama'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    
                    <textarea name="materi_isi" id="editor1" rows="10" cols="80"></textarea>

                  </div>
                <br/>
                  <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan</button>
                </form>
              </div>
            </div>