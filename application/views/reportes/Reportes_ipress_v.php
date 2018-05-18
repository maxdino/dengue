<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/images/favicon_1.ico">

  <title>SISTEMA DE REPORTES</title>
  <?php include('includes/css.inc'); ?>


</head>


<body class="fixed-left">

  <!-- Begin page -->
  <div id="wrapper">
    <?php include('includes/menu.inc'); ?>
    <!-- Top Bar Start -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->                      
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container">

          <!-- Page-Title -->
          <div class="row">
            <div class="col-sm-12">

              <h4 class="page-title">BIENVENIDOS AL REPORTE IPRESS <button id="agregar" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fa fa-plus"></i> </button></h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Reportes</a>
                </li>
                <li>
                  <a class="active">Reportes Ipress</a>
                </li>

              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <div class="table-responsive">
                          <table class="table m-0">
                            <thead>
                              <tr>
                                <th>Descripción</th>
                                <th>Exportar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Lista de Ipress </td>
                                <td><?php echo form_open_multipart('Reportes_ipress_c/exportar_ipress'); ?> <button type="submit"   style="cursor: pointer;" ><i class="fa fa-file-excel-o" style="background-color: #fff;color: #069543;" ></i></button><?php echo form_close(); ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Ipress en Red</b></h4>
                <p class="text-muted m-b-15 font-13"></p>

                <canvas id="myChart" width="400" height="470"></canvas>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card-box">

                <div id="container" style="min-width: 310px; height: 600px; max-width: 600px; margin: 0 auto"></div>
              </div>
            </div>
          </div>

        </div> <!-- container -->

      </div> <!-- content -->

      <footer class="footer">
       MDH © 2018. Todos los derechos reservados.
     </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

  </div>
  <!-- END wrapper -->

  <script>
    var resizefunc = [];
  </script>
  <?php include('includes/js.inc'); ?>
  <script src="<?php echo base_url();?>public/highchart/highcharts.js"></script>
<script src="<?php echo base_url();?>public/highchart/exporting.js"></script>
<script src="<?php echo base_url();?>public/highchart/export-data.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    $.post("<?php echo base_url();?>Reportes_ipress_c/grafico_1", function(data){  
      $object = jQuery.parseJSON(data);
      var array=[];var lab=[];var back=[];
      for (var i = 0; i < $object.length; i++) {
        array.push($object[i].cantidad);
        lab.push($object[i].red);
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = (Math.floor(Math.random() * 10)+1)/10;
        back.push('rgba('+r+', '+g+', '+b+', '+a+')');
      }

      var myChart = new Chart(ctx,{

        type: 'doughnut',
        data: {
          datasets: [{
            data: array,
            backgroundColor: back,
          }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: lab ,

  },
});
    });


 
$.post("<?php echo base_url();?>Reportes_ipress_c/grafico_2", function(datas){  
   $object = jQuery.parseJSON(datas);
      var array=[]; 
      for (var i = 0; i < $object.length; i++) {
        array.push([$object[i].microred,parseInt($object[i].cantidad),false]);
      }
Highcharts.chart('container', {

    title: {
        text: 'Ipress por Microred'
    },

    series: [{
        type: 'pie',
        allowPointSelect: true,
        keys: ['name', 'y', 'selected', 'sliced'],
        data: array
        ,
        showInLegend: true
    }]
});
 
 }); 

  function exportar_ipress(){  
 $.post("<?php echo base_url();?>Reportes_ipress_c/exportar_ipress", function(data){  
  
  });
}
  </script>

</script>

</body>
</html>