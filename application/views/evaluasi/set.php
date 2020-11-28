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
                <h3 class="mb-0"><?php echo $title; ?></h3>
              </div>
              <!-- Card body --> 
              

              <div class="card-body">


              <div class="box-body">
         
               <form class="form-row" action="<?php echo base_url('evaluasi/add') ?>" method="post" enctype="multipart/form-data">
                 <div class="form-group col-md-4">
                   <label>Judul Pertanyaan</label>
                   <input value="<?php echo $judul; ?>" type="text" name="evaluasi_judul" class="form-control" readonly>
                 </div>
                 <div class="form-group col-md-2">
                   <label>Judul Uraian</label>
                   <input type="hidden" name="evaluasi_uraian" value="<?php echo $uraian_data['uraian_id'] ?>">
                   <input value="<?php echo $uraian_data['uraian_judul']; ?>" type="text" class="form-control" readonly>
                 </div>
                 <div class="form-group col-md-2">
                   <label>Mata Pelajaran</label>
                   <input type="hidden" name="evaluasi_mapel" value="<?php echo $mapel_id ?>">
                   <input value="<?php echo $mapel_nama; ?>" type="text" class="form-control" readonly>
                 </div>
                 <div class="form-group col-md-2">
                   <label>Kelas</label>
                   <input type="hidden" name="evaluasi_kelas" value="<?php echo $kelas_id ?>">
                   <input value="<?php echo $kelas_nama; ?>" type="text" class="form-control" readonly>
                 </div>
                 <div class="form-group col-md-2">
                   <label>Waktu <small class="text-danger">( Menit )</small></label>
                   <input type="hidden" name="evaluasi_timer" value="<?php echo $timer ?>">
                   <input value="<?php echo $timer; ?>" type="text" class="form-control" readonly>
                 </div>
                 <div class="form-group col-md-3">
                   <label>ID Soal</label>
                   <input readonly="" value="<?php echo $idsoal ?>" type="text" name="evaluasi_id" class="form-control" readonly>
                 </div>
                 <div class="form-group col-md-3">
                   <label>Bobot Jawaban / 1 soal</label>
                   <input value="<?php echo $bobot; ?>" type="number" name="evaluasi_bobot" class="form-control" readonly>
                 </div>

                 <div class="form-group col-md-3">
                   <label>KKM</label>
                   <input value="<?php echo $kkm['pengaturan_kkm'] ?>" type="number" name="evaluasi_timer" class="form-control" readonly>
                 </div>
                 <div class="form-group col-md-3">
                   <label>Jumlah Soal</label>
                   <input readonly="" value="<?php echo $jumlah; ?>" type="number" name="evaluasi_jumlah" class="form-control">
                 </div>

                   <!--soal-->
                   <?php for ($i = 0; $i < $jumlah; $i++): ?> 

                      <div class="col-xs-12 col-lg-6">

                        <div class="form-group row">
                            <label class="col-md-1 col-form-label form-control-label"><?php echo $i+1; ?>.</label>
                            <div class="col-md-10">
                              <div class="form-group">
                                <textarea name="soal_pertanyaan<?php echo $i+1; ?>" class="form-control textarea" required="" style="margin: 0px; height: 181px;"></textarea>
                              </div>

                              <div class="form-group">
                                <input onchange="file('file<?php echo $i+1; ?>','<?php echo $idsoal; ?>_<?php echo $i+1; ?>')" type="file" class="form-control" name="file<?php echo $i+1; ?>" accept="image/*" multiple="">
                                <input type="hidden" id="file1" name="gambar<?php echo $i+1; ?>" value="">
                                <small class="text-danger">* Photos cannot be larger than 2 MB</small>
                              </div>

                            </div>
                        </div>

                      </div>

                      <div class="col-xs-12 col-lg-6">

                      <div class="form-group row">
                          <label class="col-md-1 col-form-label form-control-label">A. </label>
                          <div class="col-md-10">

                            <input type="text" required="" class="form-control" name="a<?php echo $i+1; ?>">
                           
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-1 col-form-label form-control-label">B. </label>
                          <div class="col-md-10">

                            <input type="text" required="" class="form-control" name="b<?php echo $i+1; ?>">
                           
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-1 col-form-label form-control-label">C. </label>
                          <div class="col-md-10">

                            <input type="text" required="" class="form-control" name="c<?php echo $i+1; ?>">
                           
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-1 col-form-label form-control-label">D. </label>
                          <div class="col-md-10">

                            <input type="text" required="" class="form-control" name="d<?php echo $i+1; ?>">
                           
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-1 col-form-label form-control-label"><label>Kunci</label></div>
                        <div class="col-md-3">
                          <select class="form-control" name="soal_kunci_jawaban<?php echo $i+1; ?>" required="">
                            <option value="" hidden="">-- Pilih --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  
                  <!--end soal-->
                <?php endfor ?>
                  <hr> 
                  <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                  <a href="<?php echo base_url().$this->uri->segment(1) ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button></a>
                 </form>
                     
                </div>
            
              </div>


            </div>

<script type="text/javascript">
    function file(target,value){
      //isi value gambar
      $('#'+target).val(value);
    }
  </script>