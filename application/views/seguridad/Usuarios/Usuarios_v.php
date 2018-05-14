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

              <h4 class="page-title">BIENVENIDOS AL REGISTRO DE USUARIOS <button id="agregar" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fa fa-plus"></i> </button></h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Seguridad</a>
                </li>
                <li>
                  <a class="active">Perfil de Usuarios</a>
                </li>

              </ol>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">

                <h4 class="m-t-0 header-title"></h4>
                <table id="usuarios_tabla"
                class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>

                    <th style="width:90px;"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php  foreach($usuarios as $value){ ?>
                    <tr id="<?php echo $value->id_usuario; ?>">
                      <td><?php echo $value->id_usuario; ?></td>
                      <td><?php echo $value->nombre; ?></td>
                      <td><?php echo $value->apellido; ?></td>
                      <td><?php echo $value->usuario; ?></td>
                      <td><?php echo $value->clave; ?></td>  
                      <td ><a href="<?php echo base_url().'Usuarios_c/editar/'.$value->id_usuario;?>" ><i class="fa fa-pencil" style="color: #337ab7;" ></i></a>    <a  style="cursor: pointer;" onclick="mostrar_eliminar(<?php echo $value->id_usuario; ?>)"  data-toggle="modal" data-target="#eliminar_modal"  > <i class="fa fa-trash" style="color: red;"></i> </a></td>
                    </tr>
                    <?php  } ?>
                  </tbody>
                </table>
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

  <!-- Modal -->
<div class="modal fade" id="eliminar_modal">
          <div class="modal-dialog panel panel-border panel-danger">
            <div class="modal-content panel-heading">
              <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: red;" >ELIMINAR</h4>
              </div>
              <div class="modal-body"  >

                
                <p style="color:#787a79; font-size: 14px;">¿Estas seguro que desea eliminar este Usuarios?</p>
                <input type="hidden" id="id_usuarios">
              </div>
              <div class="modal-footer" >
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Salir</button>
                <button type="submit" id="eliminar" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 <script>
  var resizefunc = [];
</script>

<?php include('includes/js_principal.inc'); ?>

<script>
  $('#usuarios_tabla').DataTable();

  $( "#agregar" ).click(function() {
  window.location='Usuarios_c/nuevo';
});

function mostrar_eliminar(id) {
    $("#id_usuarios").val(id);
    }

 $( "#eliminar" ).click(function() {
      var t = $('#usuarios_tabla').dataTable();
      var id = $("#id_usuarios").val();
      var nRow = $ ('#usuarios_tabla tr#'+ id)[0]; 
      t.fnDeleteRow(nRow); 
      $.ajax({
        url : "<?php echo base_url();?>Usuarios_c/eliminar",
        data : {id : id},
        type : 'POST',
        //dataType : 'json',(arrays)
        success : function(data) {
        }
      });
    });
</script>
</body>
</html>