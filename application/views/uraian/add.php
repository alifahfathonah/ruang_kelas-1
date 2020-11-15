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
                <h3 class="mb-0"><?php echo $title; ?></h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <div class="box-body">



              <form class="form-row" action="<?php echo base_url('uraian/save') ?>" method="post" enctype="multipart/form-data">
                 <div class="form-group col-md-12">
                   <label>Judul Pertanyaan</label>
                   <input value="" required="" type="text" name="uraian_judul" class="form-control">
                 </div>
                 <div class="form-group col-md-12">
                  <select class="form-control" name="uraian_mapel" required="">
                    <option hidden="" value="">-- Pilih --</option>
                    <?php foreach ($mapel_data as $key): ?>
                      <option value="<?php echo $key['mapel_id'] ?>"><?php echo $key['mapel_nama'] ?></option>
                    <?php endforeach ?>
                  </select>
                 </div>

                 <?php for ($i = 1; $i < 6 ; $i++): ?>
                   <div class="form-group col-1">
                     <span><?php echo $i; ?>.</span>
                   </div>
                   <div class="form-group col-11 row">
                     <textarea required="" name="soal<?php echo $i; ?>" class="form-control" style="height: 160px;"></textarea>
                   </div>
                 <?php endfor ?>
                 
                 <div class="form-group col-12">
                   <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Simpan</button>
                   <a href="<?php echo base_url('uraian') ?>"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button></a>
                 </div>

              </form>



                </div>
              </div>
          </div>
        </div>
      </div>

