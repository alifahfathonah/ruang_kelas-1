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
 
            <?php if($this->session->userdata('level') < 3): ?>
             <a href="<?php echo base_url('materi/add') ?>"><button type="button" class="btn btn-primary btn-sm">Tambah Materi</button></a>
            <?php endif ?>

            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th style="width: 1px;">No</th>
                    <th>Judul</th>
                    <th>Mapel</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data as $key): ?>
                    <tr>
                      <td><?php echo $no; ?></td>

                      <td style="width: 100%;"><?php echo $key['materi_judul']; ?></td>
                      <td style="width: 100%;"><?php echo $key['mapel_nama']; ?></td>
                      <td><?php echo $key['materi_tanggal']; ?></td>
                      <div style="width: 130px;">
                        <td>
                          <a href="<?php echo base_url('materi/edit/').$key['materi_id']; ?>"><button type="button" class="btn btn-success btn-sm"><i <?= ($this->session->userdata('level') < 3)?'class="fa fa-edit"':'class="fa fa-eye"' ?> ></i></button></a>

                          <?php if($this->session->userdata('level') < 3): ?>
                          <button type="button" onclick="del('<?php echo base_url('materi/delete/').$key['materi_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                          <?php endif ?>

                        </td>
                      </div>
                    </tr>
                    
                  <?php $no++; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
      