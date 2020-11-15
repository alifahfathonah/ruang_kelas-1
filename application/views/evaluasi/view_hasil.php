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
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr> 
                    <th style="width: 1px;">No</th>
                    <th>Nama</th>
                    <th>Evaluasi</th> 
                    <th>Mapel</th>
                    <th>Nilai</th>
                    <th>KKM</th>
                    <th>Uraian</th>
                    <th>Tanggal</th>

                    <?php if ($this->session->userdata('level') < 3): ?>
                      <th>Uraian</th>
                    <?php endif ?>
                  
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data as $key): ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $key['user_name'] ?></td>
                      <td><?php echo $key['evaluasi_judul'] ?></td>
                      <td><?php echo $key['mapel_nama'] ?></td>
                      <td><?php echo $key['hasil_nilai'] ?></td>
                      <td><?php echo $this->session->userdata('kkm'); ?></td>
                      <td><?= ($key['hasil_uraian_nilai'] == null)?"-": $key['hasil_uraian_nilai'] ?></td>
                      <td><?php echo $key['hasil_tanggal'] ?></td>

                      <?php if ($this->session->userdata('level') < 3): ?>
                        <td><a href="<?php echo base_url('uraian/koreksi/'.$key['hasil_id']) ?>"><button class="btn btn-primary btn-sm" <?= ($key['hasil_status'] == 1)?'disabled=""':'' ?>>Koreksi</button></a></td>
                      <?php endif ?>

                    </tr>
                    
                  <?php $no++; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

    
      