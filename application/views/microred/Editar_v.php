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
    <?php foreach($microred as $value){ ?>
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

              <h4 class="page-title">MODIFICAR MICRORED  </h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Mantenimiento</a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>Microred_c">Microred</a>
                </li>
                <li>
                  <a class="active">Agregar</a>
                </li>
              </ol>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">    
              <div class="card-box">
                <div class="row">
                  <div class="col-md-6">                   
                    <form action="<?php echo base_url();?>Microred_c/modificar" method="post" data-parsley-validate novalidate>

                      <div class="form-group">
                        <label for="microred">Microred*</label>
                        <input type="text" name="microred" parsley-trigger="change" required placeholder="Introduzca el nombre de la Microred" class="form-control" id="microred" value="<?php echo $value->microred; ?>" >
                        <input type="hidden" name="id_microred" value="<?php echo $value->id_microred; ?>">
                      </div>
                      <div class="form-group">
                        <label for="red">Red*</label>
                        <select class="form-control select2" id="red"  name="red"  >
                          <?php if ($value->red!='0') {  foreach($red as $values){ if ($value->red==$values->id_red) {
                          ?>
                          <option value="<?php echo $values->id_red; ?>"><?php echo $values->red_salud; ?></option>
                          <?php } } } else {  ?>
                          <option></option>
                          <?php  } ?>  
                          <?php  foreach($red as $values){  if ($value->red!=$values->id_red) { ?>
                            <option value="<?php echo $values->id_red; ?>"><?php echo $values->red_salud; ?></option>
                            <?php  } } ?>                                            
                          </select>
                        </div>                    
                        <div class="form-group text-right m-b-0">
                          <button class="btn btn-primary waves-effect waves-light"   type="submit"><i class="fa fa-save"></i>
                            Guardar
                          </button>
                          <a type="reset" href="<?php echo base_url();?>Microred_c" class="btn btn-danger waves-effect waves-light m-l-5 pull-left"><i class="fa fa-sign-out"></i>
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
     <!-- ============================================================== -->
     <!-- End Right content here -->
     <!-- ============================================================== -->

     <?php } ?>
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