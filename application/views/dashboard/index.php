<!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Siswa</h5>
                      <br/>
                      <span class="h2 font-weight-bold mb-0"><?php echo $siswa; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-hat-3"></i>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Film</h5>
                      <br/>
                      <span class="h2 font-weight-bold mb-0"><?php echo $film ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-tv-2"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Materi</h5>
                      <br/>
                      <span class="h2 font-weight-bold mb-0"><?php echo $materi ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-bullet-list-67"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Soal Evaluasi</h5>
                      <br/>
                      <span class="h2 font-weight-bold mb-0"><?php echo $evaluasi ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-archive-2"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->

<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h5 class="h3 mb-0">Top 5 Siswa</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- <canvas id="chart-bars" class="chart-canvas"></canvas> -->
                <div id="chartContainer" style="height: 370px;"></div>
              </div>
            </div>
          </div>

        </div>
      </div>


<script>
window.onload = function () {

var options = {
  animationEnabled: true,
  title: {
    text: ""
  },
  axisY: {
    title: "",
    suffix: "",
    includeZero: false
  },
  axisX: {
    title: ""
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0.0#"%"",
    dataPoints: [

    <?php if (@$rank[0]['totnilai']): ?>
      { label: "<?php echo $rank[0]['user_name'] ?>", y: <?php echo @$rank[0]['totnilai'] ?> },  
    <?php endif ?>

    <?php if (@$rank[1]['totnilai']): ?>
      { label: "<?php echo $rank[1]['user_name'] ?>", y: <?php echo @$rank[1]['totnilai'] ?> },  
    <?php endif ?>

    <?php if (@$rank[2]['totnilai']): ?>
      { label: "<?php echo $rank[2]['user_name'] ?>", y: <?php echo @$rank[2]['totnilai'] ?> },  
    <?php endif ?>

    <?php if (@$rank[3]['totnilai']): ?>
      { label: "<?php echo $rank[3]['user_name'] ?>", y: <?php echo @$rank[3]['totnilai'] ?> },  
    <?php endif ?>

    <?php if (@$rank[4]['totnilai']): ?>
      { label: "<?php echo $rank[4]['user_name'] ?>", y: <?php echo @$rank[4]['totnilai'] ?> },  
    <?php endif ?>
      
    ]
  }]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
      
      
      