<!DOCTYPE html>
<html>


<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Statistik Pengunjung"
  },
  axisX:{
    valueFormatString: "DD MMM",
    crosshair: {
      enabled: true,
      snapToDataPoint: true
    }
  },
  axisY: {
    title: "Jumlah Kunjungan",
    crosshair: {
      enabled: true
    }
  },
  toolTip:{
    shared:true
  },  
  legend:{
    cursor:"pointer",
    verticalAlign: "bottom",
    horizontalAlign: "left",
    dockInsidePlotArea: true,
    itemclick: toogleDataSeries
  },
  data: [{
    type: "line",
    showInLegend: true,
    name: "Total Kunjungan",
    markerType: "square",
    xValueFormatString: "DD MMM, YYYY",
    color: "#F08080",
    dataPoints: [
      { x: new Date(2017, 0, 3), y: 650 },
      { x: new Date(2017, 0, 4), y: 700 },
      { x: new Date(2017, 0, 5), y: 710 },
      { x: new Date(2017, 0, 6), y: 658 },
      { x: new Date(2017, 0, 7), y: 734 },
      { x: new Date(2017, 0, 8), y: 963 },
      { x: new Date(2017, 0, 9), y: 847 },
      { x: new Date(2017, 0, 10), y: 853 },
      { x: new Date(2017, 0, 11), y: 869 },
      { x: new Date(2017, 0, 12), y: 943 },
      { x: new Date(2017, 0, 13), y: 970 },
      { x: new Date(2017, 0, 14), y: 869 },
      { x: new Date(2017, 0, 15), y: 890 },
      { x: new Date(2017, 0, 16), y: 930 }
    ]
  },
  {
    type: "line",
    showInLegend: true,
    name: "Kunjungan Khusus",
    lineDashType: "dash",
    dataPoints: [
      { x: new Date(2017, 0, 3), y: 510 },
      { x: new Date(2017, 0, 4), y: 560 },
      { x: new Date(2017, 0, 5), y: 540 },
      { x: new Date(2017, 0, 6), y: 558 },
      { x: new Date(2017, 0, 7), y: 544 },
      { x: new Date(2017, 0, 8), y: 693 },
      { x: new Date(2017, 0, 9), y: 657 },
      { x: new Date(2017, 0, 10), y: 663 },
      { x: new Date(2017, 0, 11), y: 639 },
      { x: new Date(2017, 0, 12), y: 673 },
      { x: new Date(2017, 0, 13), y: 660 },
      { x: new Date(2017, 0, 14), y: 562 },
      { x: new Date(2017, 0, 15), y: 643 },
      { x: new Date(2017, 0, 16), y: 570 }
    ]
  }]
});
chart.render();

function toogleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  } else{
    e.dataSeries.visible = true;
  }
  chart.render();
}

}


</script>




  <style type="text/css">
    .card {
    border: none;
    border-radius: 4px;
    background-color: #ecf0f5;
    -webkit-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    color: #ecf0f5;
    }

    .card:hover {
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.02);
    }

    .card-body {
        padding: 25.6px;
        padding: 1.6rem;
    }

    #user-statistics {
    height: 350px;
  }
  </style>


  <!-- Left side column. contains the sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
<div>
    <!-- Content Header (Page header) -->
     
    <!-- Main content -->
    <div style="margin-left: 0px; padding-top: 40px; height: 520px; width: 1150px; background-color: white;" id="chartContainer" style="height: 370px; width: 100%;"></div>  
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
   
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
<script>
$.noConflict();
jQuery( document ).ready(function( $ ) {
    $('#example2').DataTable();
  // $(document).ready(function () {
    $('.sidebar-menu').tree();
    // $('#example2').DataTables();
  })
  
</script>

</html>
