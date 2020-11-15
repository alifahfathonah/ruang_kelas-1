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
             <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary btn-sm">Tambah Guru</button>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-buttons">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Mapel</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data as $key): ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $key['user_email']; ?></td>
                      <td><?php echo $key['mapel_nama'] ?></td>
                      <td><?php echo $key['user_name']; ?></td>
                      <?php $d = date_create($key['user_tgl_lahir']); $tl = date_format($d, 'd/m/Y'); ?>
                      <td><?php echo $key['user_tempat_lahir'].', '.$tl; ?></td>
                      <td><?php echo $key['user_alamat']; ?></td>
                      <td><?php echo $key['user_tlp']; ?></td>
                      <div style="width: 130px;">
                        <td>
                          <button type="button" data-toggle="modal" data-target="#modal-edit<?php echo $key['user_id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                          <button type="button" onclick="del('<?php echo base_url('guru/delete/').$key['user_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                      </div>
                    </tr>

                    <div class="modal fade" id="modal-edit<?php echo $key['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">

                          <form method="post" action="<?php echo base_url('guru/edit/').$key['user_id']; ?>">

                            <div class="modal-header">
                              <h6 class="modal-title" id="modal-title-default">Edit Guru</h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">Nama</label>
                                        <input class="form-control" required="" name="user_name" type="text" value="<?php echo $key['user_name'] ?>" id="example-text-input">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">NIP</label>
                                      <input readonly="" class="form-control" required="" name="nip" type="text" value="<?php echo $key['user_email'] ?>" id="example-text-input">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">Mata Pelajaran</label>
                                      <select required="" class="form-control" name="user_mapel">
                                        <option value="<?php echo $key['user_mapel'] ?>" hidden=""><?php echo $key['mapel_nama'] ?></option>
                                        <?php foreach ($mapel_data as $key1): ?>
                                          <option value="<?php echo $key1['mapel_id'] ?>"><?php echo $key1['mapel_nama'] ?></option>
                                        <?php endforeach ?>                          
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="example2cols1Input">Tempat Lahir</label>
                                      <input class="form-control" required="" name="user_tempat_lahir" type="text" value="<?php echo $key['user_tempat_lahir'] ?>" id="example-text-input">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="example2cols2Input">Tanggal Lahir</label>
                                      <input class="form-control" required="" name="user_tgl_lahir" type="date" value="<?php echo $key['user_tgl_lahir'] ?>" id="example-text-input">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">No Hp</label>
                                      <input class="edit_tlp<?php echo $key['user_id'] ?> form-control" required="" name="user_tlp" type="number" onchange="edit_tlp($(this).val(),<?php echo $key['user_id'] ?>)" value="<?php echo $key['user_tlp'] ?>" id="example-text-input">

                                      <!--ambil no lama-->
                                      <input type="hidden" id="edit_tlp<?php echo $key['user_id'] ?>" value="<?php echo $key['user_tlp'] ?>">
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">Alamat</label>
                                      <textarea class="form-control" value="" required="" name="user_alamat"><?php echo $key['user_alamat'] ?></textarea>
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

            <form method="post" action="<?php echo base_url('guru/add'); ?>">

              <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Guru</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Nama</label>
                          <input class="form-control" required="" name="user_name" type="text" value="" id="example-text-input">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">NIP</label>
                        <input class="form-control" required="" name="nip" type="text" value="" id="example-text-input">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Mata Pelajaran</label>
                        <select required="" class="form-control" name="user_mapel">
                          <option value="" hidden="">-- Pilih --</option>
                          <?php foreach ($mapel_data as $key): ?>
                            <option value="<?php echo $key['mapel_id'] ?>"><?php echo $key['mapel_nama'] ?></option>
                          <?php endforeach ?>                          
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="example2cols1Input">Tempat Lahir</label>
                        <input class="form-control" required="" name="user_tempat_lahir" type="text" value="" id="example-text-input">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="example2cols2Input">Tanggal Lahir</label>
                        <input class="form-control" required="" name="user_tgl_lahir" type="date" value="" id="example-text-input">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">No Hp</label>
                        <input class="tlp form-control" required="" name="user_tlp" type="number" value="" id="example-text-input" onchange="tlp($(this).val())">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Alamat</label>
                        <textarea class="form-control" value="" required="" name="user_alamat"></textarea>
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
      