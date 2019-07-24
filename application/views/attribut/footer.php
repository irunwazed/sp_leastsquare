 <footer class="main-footer">
    <center>Sistem Informasi Prediksi <strong> Toko Mitra jaya Bangunan</strong> by <strong>Umar Ramdani</strong> @ 2019</center>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
       
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assetslog/date_picker_bootstrap/js/bootstrap-datetimepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/bower_components/chart.js/Chart.js"></script>


<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>



<script>
  $(function () {
    
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // // This will get the first returned node in the jQuery collection.
    // var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : periode,
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : '#A52A2A',
          strokeColor         : '#A52A2A',
          pointColor          : '#A52A2A',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : data1
        },
        {
          label               : 'Digital Goods',
          fillColor           : '#0000FF',
          strokeColor         : '#0000FF',
          pointColor          : '#0000FF',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data2
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    //areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    // var pieChart       = new Chart(pieChartCanvas)
    // var PieData        = [
    //   {
    //     value    : 700,
    //     color    : '#f56954',
    //     highlight: '#f56954',
    //     label    : 'Chrome'
    //   },
    //   {
    //     value    : 500,
    //     color    : '#00a65a',
    //     highlight: '#00a65a',
    //     label    : 'IE'
    //   },
    //   {
    //     value    : 400,
    //     color    : '#f39c12',
    //     highlight: '#f39c12',
    //     label    : 'FireFox'
    //   },
    //   {
    //     value    : 600,
    //     color    : '#00c0ef',
    //     highlight: '#00c0ef',
    //     label    : 'Safari'
    //   },
    //   {
    //     value    : 300,
    //     color    : '#3c8dbc',
    //     highlight: '#3c8dbc',
    //     label    : 'Opera'
    //   },
    //   {
    //     value    : 100,
    //     color    : '#d2d6de',
    //     highlight: '#d2d6de',
    //     label    : 'Navigator'
    //   }
    // ]
    // var pieOptions     = {
    //   //Boolean - Whether we should show a stroke on each segment
    //   segmentShowStroke    : true,
    //   //String - The colour of each segment stroke
    //   segmentStrokeColor   : '#fff',
    //   //Number - The width of each segment stroke
    //   segmentStrokeWidth   : 2,
    //   //Number - The percentage of the chart that we cut out of the middle
    //   percentageInnerCutout: 50, // This is 0 for Pie charts
    //   //Number - Amount of animation steps
    //   animationSteps       : 100,
    //   //String - Animation easing effect
    //   animationEasing      : 'easeOutBounce',
    //   //Boolean - Whether we animate the rotation of the Doughnut
    //   animateRotate        : true,
    //   //Boolean - Whether we animate scaling the Doughnut from the centre
    //   animateScale         : false,
    //   //Boolean - whether to make the chart responsive to window resizing
    //   responsive           : true,
    //   // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    //   maintainAspectRatio  : true,
    //   //String - A legend template
    //   legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    // }
    // //Create pie or douhnut chart
    // // You can switch between pie and douhnut using the method below.
    // pieChart.Doughnut(PieData, pieOptions)

    // //-------------
    // //- BAR CHART -
    // //-------------
    // var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    // var barChart                         = new Chart(barChartCanvas)
    // var barChartData                     = areaChartData
    // barChartData.datasets[1].fillColor   = '#00a65a'
    // barChartData.datasets[1].strokeColor = '#00a65a'
    // barChartData.datasets[1].pointColor  = '#00a65a'
    // var barChartOptions                  = {
    //   //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    //   scaleBeginAtZero        : true,
    //   //Boolean - Whether grid lines are shown across the chart
    //   scaleShowGridLines      : true,
    //   //String - Colour of the grid lines
    //   scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //   //Number - Width of the grid lines
    //   scaleGridLineWidth      : 1,
    //   //Boolean - Whether to show horizontal lines (except X axis)
    //   scaleShowHorizontalLines: true,
    //   //Boolean - Whether to show vertical lines (except Y axis)
    //   scaleShowVerticalLines  : true,
    //   //Boolean - If there is a stroke on each bar
    //   barShowStroke           : true,
    //   //Number - Pixel width of the bar stroke
    //   barStrokeWidth          : 2,
    //   //Number - Spacing between each of the X value sets
    //   barValueSpacing         : 5,
    //   //Number - Spacing between data sets within X values
    //   barDatasetSpacing       : 1,
    //   //String - A legend template
    //   legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //   //Boolean - whether to make the chart responsive
    //   responsive              : true,
    //   maintainAspectRatio     : true
    // }

    // barChartOptions.datasetFill = false
    // barChart.Bar(barChartData, barChartOptions)
  });

</script>

<script>

         
function makeChart(nameChart ,_periode, _data1, _data2) {

var areaChartData = {
  labels  : _periode,
  datasets: [
    {
      label               : 'Electronics',
      fillColor           : '#A52A2A',
      strokeColor         : '#A52A2A',
      pointColor          : '#A52A2A',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : _data1
    },
    {
      label               : 'Digital Goods',
      fillColor           : '#0000FF',
      strokeColor         : '#0000FF',
      pointColor          : '#0000FF',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : _data2
    }
  ]
}

var areaChartOptions = {
  showScale               : true,
  scaleShowGridLines      : false,
  scaleGridLineColor      : 'rgba(0,0,0,.05)',
  scaleGridLineWidth      : 1,
  scaleShowHorizontalLines: true,
  scaleShowVerticalLines  : true,
  bezierCurve             : true,
  bezierCurveTension      : 0.3,
  pointDot                : false,
  pointDotRadius          : 4,
  pointDotStrokeWidth     : 1,
  pointHitDetectionRadius : 20,
  datasetStroke           : true,
  datasetStrokeWidth      : 2,
  datasetFill             : true,
  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
  maintainAspectRatio     : true,
  responsive              : true
}

//Create the line chart
//areaChart.Line(areaChartData, areaChartOptions)

//-------------
//- LINE CHART -
//--------------
var lineChartCanvas          = $('#'+nameChart).get(0).getContext('2d')
var lineChart                = new Chart(lineChartCanvas)
var lineChartOptions         = areaChartOptions
lineChartOptions.datasetFill = false
lineChart.Line(areaChartData, lineChartOptions)

};

if(chartAnalisis){
  makeChart("lineChart", periode2, data12, data22);
}

if(chartR){
  makeChart("lineChartR", periodeR, data1R, data2R);
}

function setHide(name){
  let obj = $("#"+name);
  if(obj.hasClass("set-hide")){
    obj.removeClass("set-hide");
  }else{
    obj.addClass("set-hide");
  }
}

</script>


  <script>
  $(function () {
    //$('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
</body>
</html>