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
    <?php foreach($red as $value){ ?>
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

              <h4 class="page-title">MODIFICAR RED  </h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Mantenimiento</a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>Red_c">Red</a>
                </li>
                <li>
                  <a class="active">Modificar</a>
                </li>
              </ol>
            </div>
          </div>

          <div class="row">
                <div class="col-sm-12">    
                <div class="card-box">
                    <div class="row">
                    <div class="col-md-6">                   
                  <form action="<?php echo base_url();?>Red_c/modificar" method="post" data-parsley-validate novalidate>
                   
                    <div class="form-group">
                      <label for="red">Red*</label>
                      <input type="text" name="red" parsley-trigger="change"  value="<?php echo $value->red_salud; ?>" required placeholder="Introduzca el nombre de la red" class="form-control" id="red" >
                      <input type="hidden" value="<?php echo $value->id_red; ?>" name="id_red" id="id_red">
                    </div>
                    <div class="form-group text-right m-b-0">
                      <button class="btn btn-primary waves-effect waves-light" id="modificar" type="submit"><i class="fa fa-save"></i>
                        Modificar
                      </button>
                      <a type="reset" href="<?php echo base_url();?>Red_c" class="btn btn-danger waves-effect waves-light m-l-5 pull-left"><i class="fa fa-sign-out"></i>
                        Cancelar
                      </a>
                    </div>
                     
                  </form>
                  </div> 
                  </div> 
                  </div>
                </div>
               
            
          </div>

        </div> <!-- container -->

      </div> <!-- content -->

      <footer class="footer">
       MDH © 2018. Todos los derechos reservados.
     </footer>

   </div>
     <?php } ?>
   <!-- ============================================================== -->
   <!-- End Right content here -->
   <!-- ============================================================== -->


 </div>
 <!-- END wrapper -->

 <script>
  var resizefunc = [];
</script>

<?php include('includes/js.inc'); ?>

<script>
 
</script>
</body>
</html>