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
      <?php foreach($ipress as $value){ ?>
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

                  <h4 class="page-title">MODIFICAR IPRESS   </h4>
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
                      <a class="active">Modificar</a>
                    </li>
                  </ol>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">    
                  <div class="card-box">
                    <div class="row">
                      <form action="" method="post" data-parsley-validate novalidate>
                        <div class="col-md-6">                   
                          <div class="form-group">
                            <label for="ipress">Ipress*</label>
                            <input type="text" name="ipress" parsley-trigger="change" required placeholder="Introduzca el nombre del Ipress" class="form-control" id="ipress" value="<?php echo $value->ipress; ?>">
                            <input type="hidden" name="id" id="id" value="<?php echo $value->codigo; ?>">
                          </div>
                          <div class="form-group">
                            <label for="red">Red*</label>
                            <?php  foreach($microred_m as $values){ 
                             $r=$values->red;
                           } 
                           ?>
                           <select class="form-control select2" id="red" name="red" onchange="cambiar_red()"  >

                            <?php  foreach($red as $values){ 
                              if($r==$values->id_red){ ?>
                                <option value="<?php echo $values->id_red; ?>"><?php echo $values->red_salud; ?></option>
                              <?php  } } ?>  
                              <?php  foreach($red as $values){ 
                                if($r!=$values->id_red){ ?>
                                  <option value="<?php echo $values->id_red; ?>"><?php echo $values->red_salud; ?></option>
                                <?php  } } ?>                                            
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="microred">Microred*</label>
                              <select class="form-control select2" id="microred"  name="microred" >
                                <?php foreach($microred as $values){ 
                                  if($value->microred==$values->id_microred){ ?>
                                    <option value="<?php echo $values->id_microred; ?>" ><?php echo $values->microred; ?></option>
                                  <?php } } ?>
                                  <?php foreach($microred_m as $values){ 
                                    if($value->microred!=$values->id_microred){ ?>
                                      <option value="<?php echo $values->id_microred; ?>" ><?php echo $values->microred; ?></option>
                                    <?php } } ?>                                  
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="tipos">Tipos*</label>
                                  <select class="form-control select2" id="tipos"  name="tipos"    >
                                    <?php foreach($tipos as $values){ 
                                     if($value->tipo==$values->id_tipos){ ?>
                                      <option value="<?php echo $values->id_tipos;  ?>" ><?php echo $values->tipos;  ?></option>
                                    <?php } } ?>
                                    <?php foreach($tipos as $values){ 
                                     if($value->tipo!=$values->id_tipos){ ?>
                                      <option value="<?php echo $values->id_tipos;  ?>" ><?php echo $values->tipos;  ?></option>
                                    <?php } } ?>                                            
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="categorias">Categorias*</label>
                                  <select class="form-control select2" id="categorias"  name="categorias"    >
                                    <?php foreach($categorias as $values){ 
                                     if($value->categoria==$values->id_categorias){ ?>
                                      <option  value="<?php echo $values->id_categorias;  ?>"><?php echo $values->categorias;  ?></option>
                                    <?php } } ?>
                                    <?php foreach($categorias as $values){ 
                                     if($value->categoria!=$values->id_categorias){ ?>
                                      <option value="<?php echo $values->id_categorias;  ?>" ><?php echo $values->categorias;  ?></option>
                                    <?php } } ?>                                          
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
                                <?php foreach($provincias_m as $values){ 
                                  $dep=$values->id_departamentos;
                                }      ?> 
                                <div class="form-group">
                                  <label for="departamentos">Departamento*</label>
                                  <select class="form-control select2" id="departamentos" name="departamentos" onchange="cambiar_departamento()"   >
                                    <?php foreach($departamentos as $values){ 
                                     if($dep==$values->id_departamentos){ ?>
                                      <option value="<?php echo $values->id_departamentos;  ?>" ><?php echo $values->departamentos;  ?></option>
                                    <?php } } ?>
                                    <?php foreach($departamentos as $values){ 
                                     if($dep!=$values->id_departamentos){ ?>
                                      <option value="<?php echo $values->id_departamentos;  ?>" ><?php echo $values->departamentos;  ?></option>
                                    <?php } } ?>                                       
                                  </select>
                                </div>  
                                <?php foreach($distritos_m as $values){ 
                                  $prov=$values->id_provincias;
                                }      ?> 
                                <div class="form-group">
                                  <label for="provincias">Provincia*</label>
                                  <select class="form-control select2" id="provincias" name="provincias" onchange="cambiar_provincia()"   >
                                    <?php foreach($provincias as $values){ 
                                     if($prov==$values->id_provincias){ ?>
                                      <option value="<?php echo $values->id_provincias;  ?>" ><?php echo $values->provincias;  ?></option>
                                    <?php } } ?>
                                    <?php foreach($provincias_m as $values){ 
                                     if($prov!=$values->id_provincias){ ?>
                                      <option value="<?php echo $values->id_provincias;  ?>" ><?php echo $values->provincias;  ?></option>
                                    <?php } } ?>                                       
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="distritos">Distrito*</label>
                                  <select class="form-control select2" id="distritos"  name="distritos"    >
                                   <?php foreach($distritos as $values){ 
                                     if($value->distrito==$values->id_distritos){ ?>
                                      <option value="<?php echo $values->id_distritos;  ?>" ><?php echo $values->distritos;  ?></option>
                                    <?php } } ?>
                                    <?php foreach($distritos_m as $values){ 
                                     if($value->distrito!=$values->id_distritos){ ?>
                                      <option value="<?php echo $values->id_distritos;  ?>" ><?php echo $values->distritos;  ?></option>
                                    <?php } } ?>                                         
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="resolucion">Resolución*</label>
                                  <input type="text" name="resolucion" parsley-trigger="change" required placeholder="Introduzca el código del Ipress" class="form-control" id="resolucion" value="<?php echo $value->resolucion; ?>" >
                                </div>  
                                <div class="form-group">
                                 <label for="fecha">Fecha*</label>    
                                 <div class="input-group">
                                  <input type="text" class="form-control" placeholder="yyyy/mm/dd" name="fecha" id="datepicker" value="<?php echo $value->fecha; ?>">
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

        $("form").on("submit", function(event) {
          var id = $('#id').val();
          var ipress = $('#ipress').val();
          var microred = $('#microred').val();
          var tipos = $('#tipos').val();
          var categorias = $('#categorias').val();
          var departamentos = $('#departamentos').val();
          var provincias = $('#provincias').val();
          var distritos = $('#distritos').val();
          var resolucion = $('#resolucion').val();
          var fecha = $('#datepicker').val();
          event.preventDefault();
          if (ipress!=""&&microred!=""&&tipos!=""&&categorias!=""&&distritos!="0"&&provincias!="0"&&departamentos!="0"&&resolucion!=""&&fecha!="" ) {

            $.ajax({
              url: "<?php echo base_url();?>Ipress_c/modificar",
              data: {ipress : ipress, microred : microred,tipos : tipos, categorias : categorias, distritos : distritos,resolucion : resolucion ,fecha : fecha, id :id},
              type : 'POST',
              success: function(result){
                window.location = '../../Ipress_c';
              }
            });
          }else{
           swal({
                title: "Error al registrar el Ipress",
                text: "¡No llenaste todos los campos!",
                type: "error",
                showCancelButton: false,
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Ok!'
            });  
          }
        });

        function cambiar_departamento(){
          var id = $('#departamentos').val();
          $('#provincias').empty();
          $('#distritos').empty();
          $.ajax({
            url : "<?php echo base_url();?>Ipress_c/provincias",
            data : {id : id},
            type : 'POST',
                          //dataType : 'json',(arrays)
                          success : function(data) {
                            $object = jQuery.parseJSON(data);
                             $('#provincias').append('<option value="0" ></option>');
                            for (var i = 0; i < $object.length; i++) {
                              $('#provincias').append('<option value="'+$object[i].id_provincias+'">'+$object[i].provincias+'</option>');
                            }
                          }
                        });
        }

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
                            $('#distritos').append('<option value="0"> </option>');
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
                             $('#microred').append('<option value=""></option>');
                            for (var i = 0; i < $object.length; i++) {
                              $('#microred').append('<option value="'+$object[i].id_microred+'">'+$object[i].microred+'</option>');
                            }
                          }
                        });
        }
      </script>
    </body>
    </html>