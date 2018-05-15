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

              <h4 class="page-title">REGISTRAR NUEVO USUARIO</h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Seguridad</a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>Usuarios_c">Usuarios</a>
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
                  <form action="" method="post" data-parsley-validate novalidate>
                   
                    <div class="form-group">
                      <label for="nombres">Nombres*</label>
                      <input type="text" name="nombres" parsley-trigger="change" required placeholder="Escribe sus nombres" class="form-control" id="nombres">
                    </div>
                    <div class="form-group">
                      <label for="apellidos">Apellidos*</label>
                      <input type="text" name="apellidos" parsley-trigger="change" required placeholder="Escribe sus Apellidos" class="form-control" id="apellidos">
                    </div>
                    <div class="form-group">
                      <label for="usuario">Usuario*</label>
                      <input type="text" name="usuario" parsley-trigger="change" required placeholder="Escribe el nombre usuario" class="form-control" id="usuario">
                    </div>
                    <div class="form-group">
                      <label for="clave">Contraseña*</label>
                      <input type="password" name="clave" parsley-trigger="change" required placeholder="Escribe su contraseña" class="form-control" id="clave" onkeyup="limpiar()" >
                      <div id="no_clave" style="display: none; color:red; font-size: 12px;">Las contraseñas no coinciden</div> 
                    </div>
                    <div class="form-group">
                      <label for="clave_con">Confirmar Contraseña*</label>
                      <input type="password" name="clave_con" parsley-trigger="change" required placeholder="Escribe su contraseña para confirmar" class="form-control" id="clave_con" onkeyup="limpiar()">
                     <div id="no_clave_con" style="display: none; color:red; font-size: 12px; ">Las contraseñas no coinciden</div> 
                    </div>
                    <div class="form-group text-right m-b-0">
                      <button class="btn btn-primary waves-effect waves-light" id="agregar" type="submit"><i class="fa fa-save"></i>
                        Guardar
                      </button>
                      <a type="reset" href="<?php echo base_url();?>Usuarios_c" class="btn btn-danger waves-effect waves-light m-l-5 pull-left"><i class="fa fa-sign-out"></i>
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


 </div>
 <!-- END wrapper -->

 <script>
  var resizefunc = [];
</script>

<?php include('includes/js.inc'); ?>

<script>
$("form").on("submit", function(event) {
    var nombres = $('#nombres').val();
    var apellidos = $('#apellidos').val();
    var usuario = $('#usuario').val();
    var clave = $('#clave').val();
    var clave_con = $('#clave_con').val();
    event.preventDefault();
    if (clave==clave_con) {
       
        $.ajax({
          url: "<?php echo base_url();?>Usuarios_c/agregar",
          data: {nombres : nombres,apellidos : apellidos,nombres : nombres,usuario : usuario,clave : clave},
            type : 'POST',
          success: function(result){
            $('#no_clave').css('display','none');
            $('#no_clave_con').css('display','none');
            $('#clave').css('border-color','');
            $('#clave_con').css('border-color','');
            window.location = '../Usuarios_c';
        }
      });
      }else{
        $('#no_clave').css('display','block');
        $('#no_clave_con').css('display','block');
        $('#clave').css('border-color','red');
        $('#clave_con').css('border-color','red');
      }
    });

function limpiar(){
if ($('#no_clave').val()=='') {
  $('#no_clave').css('display','none');
}
if ($('#no_clave_con').val()=='') {
  $('#no_clave_con').css('display','none');
}
}
/*
$.ajax({
    url: 'php/upload.php',
    data: $('#file').attr('files'),
    cache: false,
    contentType: 'multipart/form-data',
    processData: false,
    type: 'POST',
    success: function(data){
        alert(data);
    }
});
*/
</script>
</body>
</html>