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
         
               <form id="form" class="form-row" action="<?php echo base_url('evaluasi/hasil/').$idsoal ?>" method="post" enctype="multipart/form-data">
                 <div class="form-group col-md-6">
                   <label>Judul Pertanyaan</label>
                   <input value="<?php echo $judul; ?>" type="text" name="evaluasi_judul" class="form-control" readonly>
                 </div>
                 <div class="form-group col-md-2">
                   <label>Mata Pelajaran</label>
                   <input value="<?php echo $mapel_val; ?>" type="text" name="evaluasi_mapel" class="form-control" readonly>
                   <input type="hidden" name="mapel" value="<?php echo $mapel_id ?>">
                 </div>
                 <div class="form-group col-md-2">
                   <label>Kelas</label>
                   <input value="<?php echo $kelas_val; ?>" type="text" name="evaluasi_kelas" class="form-control" readonly>
                   <input type="hidden" name="kelas" value="<?php echo $kelas_id ?>">
                 </div>
                 <div class="form-group col-md-2">
                   <label>Waktu <small class="text-danger">( Detik )</small></label>
                   <input id="timer" value="<?php echo $timer; ?>" type="text" name="evaluasi_timer" class="form-control" readonly>
                 </div>
                 <!-- <div class="form-group col-md-3"> -->
                   <!-- <label>ID Soal</label> -->
                   <input hidden="" value="<?php echo $idsoal ?>" type="text" name="evaluasi_id" class="form-control" readonly>
                 <!-- </div> -->
                 <!-- <div class="form-group col-md-3"> -->
                   <!-- <label>Bobot Jawaban / 1 soal</label> -->
                   <input value="<?php echo $bobot; ?>" type="number" name="evaluasi_bobot" class="form-control" hidden="">
                 <!-- </div> -->

                 <!-- <div class="form-group col-md-3"> -->
                   <!-- <label>KKM</label> -->
                   <input value="<?php echo $kkm['pengaturan_kkm'] ?>" type="number" name="evaluasi_timer" class="form-control" hidden="">
                 <!-- </div> -->
                 <!-- <div class="form-group col-md-3">
                   <label>Jumlah Soal</label> -->
                   <input hidden="" value="<?php echo $jumlah; ?>" type="number" name="evaluasi_jumlah" class="form-control">
                 <!-- </div> -->

                   <!--soal-->
                   <?php for ($i = 1; $i < $jumlah+1; $i++): ?> 

                     <div class="col-md-1 col-2">
                       <?php echo $i ?>.
                     </div>

                     <div class="col-md-11 col-10 row" style="margin-bottom: 2%;">
                        <?php if ($soal[$i]['gambar'.$i]): ?>
                          <img width="300" height="250" src="<?php echo base_url('assets/soal/').$soal[$i]['gambar'.$i].'.jpeg' ?>">
                          <br/>
                        <?php endif ?>
                        <span style="margin-bottom: 1%; width: 100%;"><?php echo $soal[$i]['soal_pertanyaan'.$i] ?></span>

                      <table border="0">
                        <tr>
                          <td><input value="A" type="radio" name="soal_jawaban<?php echo $i; ?>" required="">&#160;&#160;</td>
                          <td>A. </td>
                          <td><?php echo $soal[$i]['a'.$i] ?></td>
                        </tr>
                        <tr>
                          <td><input value="B" type="radio" name="soal_jawaban<?php echo $i; ?>" required="">&#160;&#160;</td>
                          <td>B. &#160;</td>
                          <td><?php echo $soal[$i]['b'.$i] ?></td>
                        </tr>
                        <tr>
                          <td><input value="C" type="radio" name="soal_jawaban<?php echo $i; ?>" required="">&#160;&#160;</td>
                          <td>C. &#160;</td>
                          <td><?php echo $soal[$i]['c'.$i] ?></td>
                        </tr>
                        <tr>
                          <td><input value="D" type="radio" name="soal_jawaban<?php echo $i; ?>" required="">&#160;&#160;</td>
                          <td>D. &#160;</td>
                          <td><?php echo $soal[$i]['d'.$i] ?></td>
                        </tr>
                      </table>

                      <input type="hidden" name="soal_kunci_jawaban<?php echo $i; ?>" value="<?php echo md5($soal[$i]['soal_kunci_jawaban'.$i]) ?>">

                    </div>

                  <!--end soal-->
                <?php endfor ?>


                  <button style="margin-top: 2%;" class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i> Selesai Mengerjakan</button>
                 </form>
                     
                </div>
            
              </div>


            </div>

<script type="text/javascript">
 $(document).ready(function() {
    var detik   = <?php echo $timer*60 ?>; 
              
      function hitung() {
        setTimeout(hitung,1000);

        $('#timer').val(detik);
        detik --;

          if (detik <= 10) {
            $('#timer').attr('style','color: red');

             if (detik == 0) {
                $('#form').trigger('submit');
              } 
          }
          
        }           
        hitung();
      }); 

</script>