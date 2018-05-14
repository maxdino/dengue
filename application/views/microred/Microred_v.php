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

              <h4 class="page-title">BIENVENIDOS AL REGISTRO DE MICRORED <button id="agregar" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fa fa-plus"></i> </button></h4>
              <ol class="breadcrumb">
                <li>
                  <a href="<?php echo base_url();?>Principal_c">Principal</a>
                </li>
                <li>
                  <a href="#">Mantenimiento</a>
                </li>
                <li>
                  <a class="active">Microred</a>
                </li>

              </ol>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">

                <h4 class="m-t-0 header-title"></h4>
                <table id="microred_tabla"
                class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>NOMBRE DE LA MICRORED</th>
                    <th>RED</th>
                    <th style="width:90px;"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php  foreach($microred as $value){ ?>
                    <tr id="<?php echo $value->id_microred; ?>">
                      <td><?php echo $value->id_microred; ?></td>
                      <td><?php echo $value->microred; ?></td>
                      <td><?php foreach($red as $values){
                         if($value->red==$values->id_red){  echo $values->red_salud;  }else{ echo ""; }  } ?></td> 
                      <td ><a class="btn btn-icon waves-effect waves-light btn-primary" href="<?php echo base_url().'Microred_c/editar/'.$value->id_microred;?>" ><i class="fa fa-pencil"></i></a> <button class="btn btn-icon waves-effect waves-light btn-danger" onclick="mostrar_eliminar(<?php echo $value->id_microred; ?>)"  data-toggle="modal" data-target="#eliminar_modal" > <i class="fa fa-trash"></i> </button></td>
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

                
                <p style="color:#787a79; font-size: 14px;">¿Estas seguro que desea eliminar esta Microred?</p>
                <input type="hidden" id="id_microred">
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
  $('#microred_tabla').DataTable();

  $( "#agregar" ).click(function() {
  window.location='Microred_c/nuevo';
});

function mostrar_eliminar(id) {
    $("#id_microred").val(id);
    }

 $( "#eliminar" ).click(function() {
      var t = $('#microred_tabla').dataTable();
      var id = $("#id_microred").val();
      var nRow = $ ('#microred_tabla tr#'+ id)[0]; 
      t.fnDeleteRow(nRow); 
      $.ajax({
        url : "<?php echo base_url();?>Microred_c/eliminar",
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