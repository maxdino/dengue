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

              <h4 class="page-title">REGISTRAR NUEVO IPRESS  </h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Mantenimiento</a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>Ipress_c">Ipress</a>
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
                  <form action="<?php echo base_url();?>Ipress_c/agregar" method="post" data-parsley-validate novalidate>
                  <div class="col-md-6">                   
                      <div class="form-group">
                        <label for="ipress">Ipress*</label>
                        <input type="text" name="ipress" parsley-trigger="change" required placeholder="Introduzca el nombre del Ipress" class="form-control" id="ipress">
                      </div>
                      <div class="form-group">
                        <label for="red">Red*</label>
                        <select class="form-control select2" id="red"  name="red" onchange="cambiar_red()"  >
                          <option></option>
                          <?php  foreach($red as $value){ ?>
                            <option value="<?php echo $value->id_red; ?>"><?php echo $value->red_salud; ?></option>
                            <?php  } ?>                                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="microred">Microred*</label>
                          <select class="form-control select2" id="microred"  name="microred" >
                            <option></option>                                 
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="tipos">Tipos*</label>
                          <select class="form-control select2" id="tipos"  name="tipos"    >
                            <option></option>
                            <?php  foreach($tipos as $value){ ?>
                              <option value="<?php echo $value->id_tipos; ?>"><?php echo $value->tipos; ?></option>
                              <?php  } ?>                                            
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="categorias">Categorias*</label>
                            <select class="form-control select2" id="categorias"  name="categorias"    >
                              <option></option>
                              <?php  foreach($categorias as $value){ ?>
                                <option value="<?php echo $value->id_categorias; ?>"><?php echo $value->categorias; ?></option>
                                <?php  } ?>                                            
                              </select>
                            </div>
                              
                            
                            <div class="form-group text-right m-b-0">
                              <button class="btn btn-primary waves-effect waves-light"  type="submit"><i class="fa fa-save"></i>
                                Guardar
                              </button>
                              <a type="reset" href="<?php echo base_url();?>Ipress_c" class="btn btn-danger waves-effect waves-light m-l-5 pull-left"><i class="fa fa-sign-out"></i>
                                Cancelar
                              </a>
                            </div>

                          
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="codigo">Código*</label>
                              <input type="text" name="codigo" parsley-trigger="change" required placeholder="Introduzca el código del Ipress" class="form-control" id="codigo">
                            </div>  
                          <div class="form-group">
                              <label for="provincias">Provincia*</label>
                              <select class="form-control select2" id="provincias" name="provincias" onchange="cambiar_provincia()"   >
                                <option></option>
                                <?php  foreach($provincias as $value){ ?>
                                  <option value="<?php echo $value->id_provincias; ?>"><?php echo $value->provincias; ?></option>
                                  <?php  } ?>                                            
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="distritos">Distrito*</label>
                                <select class="form-control select2" id="distritos"  name="distritos"    >
                                  <option></option>                                          
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="resolucion">Resolución*</label>
                                <input type="text" name="resolucion" parsley-trigger="change" required placeholder="Introduzca el código del Ipress" class="form-control" id="resolucion">
                              </div>  
                              <div class="form-group">
                               <label for="fecha">Fecha*</label>    
                               <div class="input-group">
                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="fecha" id="datepicker">
                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                              </div><!-- input-group -->
                              
                            </div>


                        </div>
                        </form>
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


       </div>
       <!-- END wrapper -->

       <script>
        var resizefunc = [];
      </script>

      <?php include('includes/js.inc'); ?>

      <script>
        function cambiar_provincia(){
          var id = $('#provincias').val();
          $('#distritos').empty();
          $.ajax({
            url : "<?php echo base_url();?>Ipress_c/distritos",
            data : {id : id},
            type : 'POST',
        //dataType : 'json',(arrays)
        success : function(data) {
          $object = jQuery.parseJSON(data);
          $('#distritos').append('<option value="0"></option>');
          for (var i = 0; i < $object.length; i++) {
            $('#distritos').append('<option value="'+$object[i].id_distritos+'">'+$object[i].distritos+'</option>');
          }
        }
      });
        }

        function cambiar_red(){
          var id = $('#red').val();
          $('#microred').empty();
          $.ajax({
            url : "<?php echo base_url();?>Ipress_c/microred",
            data : {id : id},
            type : 'POST',
        //dataType : 'json',(arrays)
        success : function(data) {
          $object = jQuery.parseJSON(data);
          $('#microred').append('<option value="0"></option>');
          for (var i = 0; i < $object.length; i++) {
            $('#microred').append('<option value="'+$object[i].id_microred+'">'+$object[i].microred+'</option>');
          }
        }
      });
        }
      </script>
    </body>
    </html>