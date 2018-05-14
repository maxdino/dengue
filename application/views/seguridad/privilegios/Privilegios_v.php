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

              <h4 class="page-title">BIENVENIDOS AL PERMISOS DE MODULOS DEL SISTEMA </h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Seguridad</a>
                </li>
                <li>
                  <a class="active">Permisos</a>
                </li>

              </ol>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="card-box table-responsive">
                 
 
                    <div class="form-group">
                      <label for="perfil_usuario">Perfil de Usuario*</label>
                      <select class="form-control select2" id="perfil_usuario"  name="perfil_usuario" onchange="cambio_perfil()" >
                        <option></option>
                        <?php  foreach($perfil_usuario as $value){ ?>
                          <option value="<?php echo $value->id_perfil_usuario; ?>"><?php echo $value->perfil_usuario; ?></option>
                        <?php  } ?>                                            
                      </select>
                    </div> 
                    
                    <fieldset style="color:#5d9cec; border:1px solid; border-radius: 10px;">

                      <label for="perfil_usuario" style="margin: 10px 0px 0px 10px; color: #797979;">Modulos*</label>
                    <div id="checkTree" style="color: #797979;">
                      <ul>
                        <?php $i=0; $encontrados = array(); ?>
                        <?php foreach ($permisos2 as $value) { ?>
                          <?php if(!in_array($value->padre, $encontrados)){ ?>
                            <?php $encontrados[] = $value->padre; $i++; ?>
                            <li><?php echo $value->padre; ?>
                          <?php } ?>
                          <ul>
                            <li data-jstree='{"type":"file"}'  value="<?php echo $value->idhijo; ?>"  id="<?php echo $value->idhijo; ?>" ><?php echo $value->hijo; ?></li>
                          </ul>

                        <?php } ?>
                      </li>
                      jstree-clicked
                    </ul>
                  </div>

                  <button class="btn btn-primary waves-effect waves-light" id="guardar" style="margin: 10px 0px 10px 30px"  type="submit"><i class="fa fa-save"></i>Guardar </button>    
                  </fieldset>               
              </div>
            </div>
            <div class="col-md-6">
                    <div class="panel panel-border panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Aviso!</h3>
                  </div>
                  <div class="panel-body">
                    <p>
                    <div class="col-md-1"> <b>1.-</b></div><div  class="col-md-11"> Antes de Seleccionar el perfil de usuario debe desglosar todas las carpetas en el icono <i style="" class="fa  fa-caret-right"></i> en blanco que se encuentra debajo y en direccion al titulo "Modulos*".  </div>
                    <div class="col-md-1"> <b>2.-</b></div><div  class="col-md-11"> Seleccionas el perfil de usuario que va dar permisos a ciertos modulos.  </div>
                    <div class="col-md-1"> <b>3.-</b></div><div  class="col-md-11"> Despues damos con un click solamente en los cuadros de los modulos.  </div>
                    <div class="col-md-1"> <b>4.-</b></div><div  class="col-md-11"> Antes de guardar no vaya a minimizar las carpetas, lo cual los modulos de las carpetas minimizadas no se daran los permisos para el perfil de usuario seleccionado.  </div>
                    </p>
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
  function cambio_perfil(){
   var id = $('#perfil_usuario').val();
   $.post("<?php echo base_url();?>Privilegios_c/cantidad_modulos", function(data){    
    $object = jQuery.parseJSON(data);
    for (var i = 0; i < $object.length; i++) {
      $('#'+$object[i].id_modulo+'_anchor').removeClass('jstree-clicked');  
    }
    $.ajax({
      url : "<?php echo base_url();?>Privilegios_c/modulos_seleccionados",
      data : {id_perfil_usuario: id},
      type : 'POST',
        //dataType : 'json',(arrays)
        success : function(data) {
          $object = jQuery.parseJSON(data);
          for (var i = 0; i < $object.length; i++) {
            $('#'+$object[i].id_modulo+'_anchor').addClass('jstree-anchor jstree-clicked');
          }
        } 
      });
  });

 }

 $('#guardar').click(function(){
  var id = $('#perfil_usuario').val();
  if (id!=0) {
  $.post("<?php echo base_url();?>Privilegios_c/cantidad_modulos", function(data){    
    $object = jQuery.parseJSON(data);
    var array=[];
    for (var i = 0; i < $object.length; i++) {
     if($('#'+$object[i].id_modulo+'_anchor').hasClass('jstree-anchor jstree-clicked')){

      array.push($object[i].id_modulo);
    }
  }

  $.ajax({
    url : "<?php echo base_url();?>Privilegios_c/agregar",
    data : {id_modulo : array,id_perfil_usuario : id},
    type : 'POST',
    //dataType : 'json',
    success : function(data) {
       swal({
                title: "Guardado",
                text: "Se otorgaron correctamente los permisos",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: 'btn-success btn-md waves-effect waves-light',
                confirmButtonText: 'Listo!'
            });
    }
  });    

});
}else{
  swal({
                title: "Error al registrar privilegios",
                text: "¡No seleccionaste el perfil de Usuario!",
                type: "error",
                showCancelButton: false,
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Ok!'
            });  
}
});
</script>
</body>
</html>