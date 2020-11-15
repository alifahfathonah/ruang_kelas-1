<!-- start popup -->
    <!-- <div id="close">
        <div class="container-popup">
            <form action="#" method="post" class="popup-form">
                <img src="<?php echo base_url() ?>/assets/block/block.jpg" alt="">
            </form>
        </div>
    </div> -->
<!-- end popup -->

<!-- Footer -->
      <footer class="footer pt-0" style="background: none;">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-white text-center text-lg-left text-muted">
              &copy; 2019 RUANG KELAS
            </div>
          </div>
          
        </div>
      </footer> 
    </div>
  </div>  

  <!-- Core -->
  <script src="<?php echo base_url() ?>/argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

  <!-- Chart -->
  <!-- <script src="<?php echo base_url() ?>/argon/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/chart.js/dist/Chart.extension.js"></script> -->

  <!-- Datatable -->
  <script src="<?php echo base_url() ?>/argon/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  
  <!--sweet alert-->
  <script src="<?php echo base_url() ?>/argon/assets/sweetalert/sweet-alert.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!--editor-->
  <script src="<?php echo base_url() ?>/argon/assets/vendor/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/nouislider/distribute/nouislider.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/quill/dist/quill.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
  <script src="<?php echo base_url() ?>/argon/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  
  <!-- Argon JS -->
  <script src="<?php echo base_url() ?>/argon/assets/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?php echo base_url() ?>/argon/assets/js/demo.min.js"></script>
  <!--ckeditor-->
  <!-- <script src="<?php echo base_url() ?>/argon/assets/js/ckeditor.js"></script> -->
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>



<!--in script js-->
  <script type="text/javascript">
  CKEDITOR.replace( 'editor1',
  {
    height: '400px'
  });


  //alert
   <?php if($this->session->flashdata('sukses')): ?>
    swal("Sukses", "<?php echo $this->session->flashdata('sukses');?>", "success");
   <?php endif ?>

   <?php if($this->session->flashdata('gagal')): ?>
    swal("Gagal", "<?php echo $this->session->flashdata('gagal'); ?>", "warning");
  <?php endif ?>


  //delete
  function del(url){
      swal({
        title: "Apa kamu yakin?",
        text: "Hapus data ini!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
    
          $(location).attr('href',url);
          
        }
      });
    }


  //menu siswa 
  function tlp(val){
    if (val.length > 12) {
      alert('No ponsel tidak boleh lebih dari 12 digit angka');
      $('.tlp').val('');
    }   
  }

  function edit_tlp(val,id){
    if (val.length > 12) {
      alert('No ponsel tidak boleh lebih dari 12 digit angka');
      $x = $('#edit_tlp'+id).val();
      $('.edit_tlp'+id).val($x);
    }   
  }
  
  //hapus image ckeditor
  $('.ql-image').remove();

  function toggle(){
    //rotate toggle
    if ($('#background-toggle').is(':checked')) {
      
      //rotate
      $('#latar-toggle').prop('checked',false);

    }else{
      
      //rotate
      $('#latar-toggle').prop('checked',true);

    }
  }

  function toggle1(){
    //rotate toggle
    if ($('#latar-toggle').is(':checked')) {
      
      //rotate
      $('#background-toggle').prop('checked',false);

    }else{
      
      //rotate
      $('#background-toggle').prop('checked',true);

    }
  }


  </script>
</body>
</html>


