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

            <?php if($this->session->userdata('level')==1): ?>
             <button data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-primary btn-sm">Tambah Materi</button>
            <?php endif ?> 

            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th style="width: 1px;">No</th>
                    <th>Mata Pelajaran</th>
                    <th>Kepanjangan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data as $key): ?>
                    <tr>
                      <td><?php echo $no; ?></td>

                      <td><?php echo $key['mapel_nama']; ?></td>
                      <td><?php echo $key['mapel_kepanjangan']; ?></td>

                      <td><?php echo $key['mapel_tanggal']; ?></td>
                      <div style="width: 130px;">
                        <td>
                          <button data-toggle="modal" data-target="#modal-edit<?php echo $key['mapel_id'] ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>

                          <button type="button" onclick="del('<?php echo base_url('mapel/delete/').$key['mapel_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                        </td>
                      </div>
                    </tr>
                    
                    <div class="modal fade" id="modal-edit<?php echo $key['mapel_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">

                          <form method="post" action="<?php echo base_url('mapel/edit/'.$key['mapel_id']); ?>">

                            <div class="modal-header">
                              <h6 class="modal-title" id="modal-title-default">Edir Mapel</h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">Mata Pelajaran</label>
                                        <input class="form-control" required="" name="mapel_nama" type="text" value="<?php echo $key['mapel_nama'] ?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">Kepanjangan</label>
                                        <input class="form-control" required="" name="mapel_kepanjangan" type="text" value="<?php echo $key['mapel_kepanjangan'] ?>">
                                    </div>
                                  </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                            </div>

                          </form>

                        </div>
                      </div>
                    </div>

                  <?php $no++; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
      

      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">

            <form method="post" action="<?php echo base_url('mapel/add'); ?>">

              <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Mapel</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Mata Pelajaran</label>
                          <input class="form-control" required="" name="mapel_nama" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Kepanjangan</label>
                          <input class="form-control" required="" name="mapel_kepanjangan" type="text" value="">
                      </div>
                    </div>
                  </div>

              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
              </div>

            </form>

          </div>
        </div>
      </div>