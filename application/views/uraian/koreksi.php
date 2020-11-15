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


              <form class="form-row" action="<?php echo base_url('uraian/koreksi_save') ?>" method="post" enctype="multipart/form-data">
                 <div class="form-group col-md-8">
                   <label>Judul Pertanyaan</label>
                   <input readonly="" value="<?php echo $data['uraian_judul'] ?>" required="" type="text" name="uraian_judul" class="form-control">
                   <input type="hidden" name="id" value="<?php echo $this->uri->segment(3) ?>">
                 </div>

                 <div class="form-group col-md-4">
                   <label>Mata Pelajaran</label>
                   <input readonly="" value="<?php echo $mapel_val ?>" required="" type="text" name="uraian_mapel" class="form-control">
                   <input type="hidden" name="mapel" value="<?php echo $data['uraian_mapel'] ?>">
                 </div>

                 <?php for ($i = 1; $i < 6 ; $i++): ?>
                   <div class="form-group col-1">
                     <span><?php echo $i; ?>.</span>
                   </div>
                   <div class="form-group col-11 row">
                     <input type="hidden" name="soal<?php echo $i; ?>" value="<?php echo $data['soal'.$i] ?>">
                     <?php echo $data['soal'.$i] ?>
                   </div>
                   <div class="form-group col-1">Jawab :</div>
                   <div class="form-group col-9">
                     <textarea readonly="" required="" name="jawaban<?php echo $i; ?>" class="form-control"><?php echo $data['jawaban'.$i] ?></textarea>
                   </div>
                   <div class="form-group col-2">
                     <select class="form-control" required="" name="koreksi<?php echo $i; ?>">
                       <option value="">-- Nilai --</option>
                       
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                       
                     </select>
                   </div>
                 <?php endfor ?>
                 
                 <div class="form-group col-12">
                   <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Simpan</button>
                   <a href="<?php echo base_url('evaluasi/view_hasil') ?>"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button></a>
                 </div>

              </form>



                </div>
              </div>
          </div>
        </div>
      </div>

