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
             
              <!-- Comments -->
              <div class="mb-1">

              <div class="pre-scrollable" style="padding-right: 1%;">

              <?php foreach ($data as $key): ?>
              
              <?php if ($key['user_level'] == 2): ?>

                <div class="media media-comment">
                  <div class="media-body">
                    <div class="media-comment-text">
                      <h6 class="h5 mt-0"><?php echo $key['user_name'] ?></h6>
                      <p class="text-sm lh-160"><?php echo $key['diskusi_text'] ?></p>
                      
                    </div>
                  </div>
                </div>

              <?php else: ?>

                <div class="media media-comment">  
                  <div class="media-body">
                    <div class="media-comment-text" style="background-color: #f9f4f4;">
                      <h6 class="h5 mt-0"><?php echo $key['user_name'] ?></h6>
                      <p class="text-sm lh-160"><?php echo $key['diskusi_text'] ?></p>
                      
                    </div>
                  </div>
                </div>

              <?php endif ?>

              <?php endforeach ?>
              </div>

                <hr>
                <div class="media align-items-center">
                  <div class="media-body">
                    <form method="post" action="<?php echo base_url('diskusi/send') ?>">
                      <textarea name="diskusi_text" class="form-control" placeholder="Write your comment" rows="1" style="height: 100px;"></textarea>
                      <button type="submit" class="btn btn-sm btn-success" style="margin-top: 1%;"><i class="fa fa-comments"></i> Send Comments</button>
                    </form>
                  </div>
                </div>
              </div>
            
            </div>


            </div>

             