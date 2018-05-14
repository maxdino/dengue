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
    <?php foreach($modulo as $value){ ?>
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

              <h4 class="page-title">MODIFICAR MODULO  </h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Mantenimiento</a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>Modulo_c">Modulos</a>
                </li>
                <li>
                  <a class="active">Modulos</a>
                </li>
              </ol>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">    
              <div class="card-box">
                <div class="row">
                  <div class="col-md-6">                   
                    <form action="<?php echo base_url();?>Modulo_c/modificar" method="post" data-parsley-validate novalidate>

                      <div class="form-group">
                        <label for="microred">Modulo*</label>
                        <input type="text" name="modulo" parsley-trigger="change" required placeholder="Introduzca el nombre del Modulo" class="form-control" id="modulo" value="<?php echo $value->nombre; ?>">
                        <input type="hidden" name="id_modulo" value="<?php echo $value->id_modulo; ?>">
                      </div>
                      <div class="form-group">
                        <label for="modulo_padre">Modulo Padre*</label>
                        <select class="form-control select2" id="modulo_padre" name="modulo_padre" onchange="cambiar_padre()" >
                          <?php  foreach($modulo_padre as $values){ if($value->id_padre==$values->id_modulo){ ?>
                            <option value="<?php echo $values->id_modulo; ?>"><?php echo $values->nombre; ?></option>
                            <?php }  } ?>
                          <option value="0"></option>     
                          <?php  foreach($modulo_padre as $values){  if($value->id_padre!=$values->id_modulo){ ?>
                            <option value="<?php echo $values->id_modulo; ?>"><?php echo $values->nombre; ?></option>
                            <?php  } } ?>                                            
                          </select>
                        </div>
                        <div class="form-group">
                        <label for="url">Url*</label>
                        <input type="text" name="url" placeholder="Introduzca el url del Modulo" class="form-control" id="url" value="<?php if($value->url=='#'){ echo ''; }else{ echo $value->url; } ?>" >
                      </div>                    
                        <div class="form-group text-right m-b-0">
                          <button class="btn btn-primary waves-effect waves-light" id="agregar" type="submit"><i class="fa fa-save"></i>
                            Guardar
                          </button>
                          <a type="reset" href="<?php echo base_url();?>Modulo_c" class="btn btn-danger waves-effect waves-light m-l-5 pull-left"><i class="fa fa-sign-out"></i>
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
  function cambiar_padre(){
    var padre = $("#modulo_padre").val();
    if (padre==0) {
      $("#url").prop('disabled','true');
      $("#url").removeAttr('required');
    }else{
      $("#url").removeAttr('disabled');
      $("#url").prop('required','required');
      
    }

  }

 </script>
</body>
</html>