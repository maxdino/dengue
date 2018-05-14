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
    <?php foreach($perfil_usuario as $value){ ?>
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

              <h4 class="page-title">MODIFICAR PERFIL DE USUARIO  </h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Seguridad</a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>Perfil_usuario_c">Perfil de Usuarios</a>
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
                  <form action="<?php echo base_url();?>Perfil_usuario_c/modificar" method="post" data-parsley-validate novalidate>
                   
                    <div class="form-group">
                      <label for="perfil_usuario">Perfil de Usuario*</label>
                      <input type="text" name="perfil_usuario" parsley-trigger="change"  value="<?php echo $value->perfil_usuario; ?>" required placeholder="Introduzca el nombre del Perfil de Usuario" class="form-control" id="perfil_usuario" >
                      <input type="hidden" value="<?php echo $value->id_perfil_usuario; ?>" name="id_perfil_usuario" id="id_perfil_usuario">
                    </div>
                    <div class="form-group text-right m-b-0">
                      <button class="btn btn-primary waves-effect waves-light" id="modificar" type="submit"><i class="fa fa-save"></i>
                        Modificar
                      </button>
                      <a type="reset" href="<?php echo base_url();?>Perfil_usuario_c" class="btn btn-danger waves-effect waves-light m-l-5 pull-left"><i class="fa fa-sign-out"></i>
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