  <?php if (!$_SESSION["id_usuario"]) {
  redirect('Portal_c');
} ?>
<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="#" class="logo" ><i class="icon-magnet icon-c-logo"></i><span style="color: #fff;">H<i class="md md-album"></i>LA!</span> </a>
            <!-- Image Logo here -->
            <!--<a href="index.html" class="logo">-->
                <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                <!--</a>-->
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container" style="background-color:  #0086b3">
                <div class="">

                    <div class="pull-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="md md-menu"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>

                    <ul class="nav navbar-nav navbar-right pull-right">

                        <li class="dropdown top-menu-item-xs">
                            <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="https://scontent.flim5-3.fna.fbcdn.net/v/t1.0-1/p160x160/24774781_939237826231205_7207010486429044126_n.jpg?_nc_cat=0&oh=c4dc6884cbc598f258ec6ae5372be4b6&oe=5B574564" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-lock m-r-10 text-custom"></i> Lock screen</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url();?>Principal_c/logout"><i class="ti-power-off m-r-10 text-danger"></i> Desconectar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                  <li class="text-muted menu-title">NAVEGACIÓN PRINCIPAL</li>

                  <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cogs"></i> <span> Mantenimiento </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url();?>Ipress_c"><i class="fa fa-hospital-o"></i>Ipress</a></li>
                        <li><a href="<?php echo base_url();?>Categorias_c"><i class="fa fa-th-list"></i>Categorias</a></li>
                        <li><a href="<?php echo base_url();?>Tipos_c"><i class="fa fa-medkit"></i>Tipos</a></li>
                        <li><a href="<?php echo base_url();?>Microred_c"><i class="fa fa-sitemap"></i>Microred</a></li> 
                        <li><a href="<?php echo base_url();?>Red_c"><i class="fa fa-wifi"></i>Red</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion-locked"></i> <span> Seguridad </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url();?>Usuarios_c""><i class="fa  fa-users"></i>Usuarios</a></li>
                        <li><a href="<?php echo base_url();?>Privilegios_c"><i class="fa  fa-key"></i>Permisos</a></li>
                        <li><a href="<?php echo base_url();?>Perfil_usuario_c"><i class="fa  fa-slideshare"></i>Perfil de Usuarios</a></li>  
                        <li><a href="<?php echo base_url();?>Modulo_c"><i class="fa fa-file"></i>Modulos</a></li>
                    </ul>
                </li>
               
    

    <li class="text-muted menu-title">Reportes</li>

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> Crm </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="crm-dashboard.html"> Dashboard </a></li>
            <li><a href="crm-contact.html"> Contacts </a></li>
            <li><a href="crm-opportunities.html"> Opportunities </a></li>
            <li><a href="crm-leads.html"> Leads </a></li>
            <li><a href="crm-customers.html"> Customers </a></li>
        </ul>
    </li>

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart"></i><span class="label label-warning pull-right">6</span><span> eCommerce </span></a>
        <ul class="list-unstyled">
            <li><a href="ecommerce-dashboard.html"> Dashboard</a></li>
            <li><a href="ecommerce-products.html"> Products</a></li>
            <li><a href="ecommerce-product-detail.html"> Product Detail</a></li>
            <li><a href="ecommerce-product-edit.html"> Product Edit</a></li>
            <li><a href="ecommerce-orders.html"> Orders</a></li>
            <li><a href="ecommerce-sellers.html"> Sellers</a></li>
        </ul>
    </li>

</ul>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
<!-- Left Sidebar End -->

<!-- =============================================== -->
