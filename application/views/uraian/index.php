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
             <a href="<?php echo base_url('uraian/add') ?>"><button type="button" class="btn btn-primary btn-sm">Tambah Uraian</button></a>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th style="width: 1px;">No</th>
                    <th style="width: 100%;">Judul</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data as $key): ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td style="width: 100%;"><?php echo $key['uraian_judul'] ?></td>
                      <td><?php echo $key['mapel_nama'] ?></td>
                      <td><?php echo $key['kelas_nama'] ?></td>
                      <td><?php echo ($key['uraian_status'] == 1)?'Digunakan':'Belum Digunakan' ?></td>
                      <td><?php echo $key['uraian_tanggal'] ?></td>
                      <div style="width: 130px;">
                        <td>
                          <a href="<?php echo base_url('uraian/edit/').$key['uraian_id']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a>
                          <button type="button" onclick="del('<?php echo base_url('uraian/delete/').$key['uraian_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                      </div>
                    </tr>
                    
                  <?php $no++; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
      