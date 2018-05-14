<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/images/favicon_1.ico">

        <title>SISTEMA DE REPORTES DEL DENGUE</title>
    <?php include('includes/css.inc'); ?>
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
          <h1 class="text-center" style="color:#fff;"><b>SISTEMA DE REPORTE DEL DENGUE</b></h1>
          <div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> Iniciar sesión <strong class="text-custom"></strong> </h3>
            </div> 


            <div class="panel-body">
            <div class="form-horizontal m-t-20" >
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text"  name="usuario" id="usuario" value="<?php if(isset($_COOKIE['usuario'])){ echo  $_COOKIE['usuario'];  } ?>" placeholder="Usuario">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" placeholder="Clave" name="clave" id="clave" value="" placeholder="Contraseña">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                           <?php if(isset($_COOKIE['recuerdo'])){  ?>
                            <input type="checkbox"  id="recuerdo" checked >
                            <label for="checkbox-signup">
                                Recordarme
                            </label>
                            <?php }else{ ?>
                              <input    id="recuerdo" type="checkbox">
                            <label for="checkbox-signup">
                                Recordarme
                            </label>
                             <?php } ?> 
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="login()" type="submit">Inicia Sesión</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        
                    </div>
                </div>
            </div> 
            
            </div>   
            </div>                              
                <div class="row">
              <div class="col-sm-12 text-center">
               
                        
                    </div>
            </div>
            
        </div>
        
        

        
      <script>
            var resizefunc = [];

         function login(){
      var clave = $('#clave').val();
      var usuario = $('#usuario').val();
      var recuerdo ='0';
      if ($('#recuerdo').prop('checked')) {
      recuerdo ='1';  
      }
      if (usuario=='') {
        $('#no_usu').css('display','block');
      }else{
        $('#no_usu').css('display','none');
      }
      if (clave=='') {
        $('#no_clave').css('display','block');
      }else{
        $('#no_clave').css('display','none');
      }
      if(clave!='' && usuario!=''){
      $.post("<?php echo base_url();?>Portal_c/autentificar",{"clave":clave,"usuario":usuario,"recuerdo":recuerdo},
        function(data){
          $json = JSON.parse(data);
          if($json.autentificar=='1'){
            window.location='Principal_c';
          } 
        });
    }
    }   
        </script>
  <?php include('includes/js_login.inc'); ?>
  </body>
</html>