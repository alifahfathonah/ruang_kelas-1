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
             <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary btn-sm">Tambah Video</button>
            <?php endif ?>

            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th style="width: 1px;">No</th>
                    <th>Tumbnal</th>
                    <th>Title</th>
                    <th>Mapel</th>
                  <?php if($this->session->userdata('level') < 3): ?>
                    <th>Aksi</th>
                  <?php endif ?>
                 
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data as $key): ?>
                    <tr>
                      <td><?php echo $no; ?></td>

                      <td><a href="<?php echo 'https://www.youtube.com/embed/'.$key['film_link'] ?>" target="_blank"><img width="100" src="https://img.youtube.com/vi/<?php echo $key['film_link'] ?>/hqdefault.jpg"></a></td>

                      <td><?php echo $key['film_judul']; ?></td>
                      <td><?php echo $key['mapel_nama']; ?></td>
                    <?php if($this->session->userdata('level') < 3): ?>
                      <div style="width: 130px;">
                        <td>
                          <button type="button" data-toggle="modal" data-target="#modal-edit<?php echo $key['film_id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                          <button type="button" onclick="del('<?php echo base_url('film/delete/').$key['film_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                      </div>
                    <?php endif ?>
                    
                    </tr>

                    <div class="modal fade" id="modal-edit<?php echo $key['film_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">

                          <form method="post" action="<?php echo base_url('film/edit/').$key['film_id']; ?>">

                            <div class="modal-header">
                              <h6 class="modal-title" id="modal-title-default">Edit Video</h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">Title</label>
                                        <input class="form-control" required="" name="film_judul" type="text" value="<?php echo $key['film_judul'] ?>" id="example-text-input">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">Mata Pelajaran</label>
                                        <select required="" class="form-control" name="film_mapel">
                                          <option value="<?php echo $key['film_mapel'] ?>" hidden=""><?php echo $key['mapel_nama'] ?></option>
                                          <?php foreach ($mapel_data as $key1): ?>
                                            <option value="<?php echo $key1['mapel_id'] ?>"><?php echo $key1['mapel_nama'] ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="col-form-label form-control-label">Link</label>
                                      <input class="form-control" required="" name="film_link" type="text" value="<?php echo 'https://www.youtube.com/watch?v='.$key['film_link'] ?>" id="example-text-input">
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

            <form method="post" action="<?php echo base_url('film/add'); ?>">

              <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Video</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Title</label>
                          <input class="form-control" required="" name="film_judul" type="text" value="" id="example-text-input">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Mata Pelajaran</label>
                          <select required="" class="form-control" name="film_mapel">
                            <option value="" hidden="">-- Pilih --</option>
                            <?php foreach ($mapel_data as $key): ?>
                              <option value="<?php echo $key['mapel_id'] ?>"><?php echo $key['mapel_nama'] ?></option>
                            <?php endforeach ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Link</label>
                        <input class="form-control" required="" name="film_link" type="text" value="" id="example-text-input">
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
      