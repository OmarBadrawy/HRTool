
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>HRTool | Admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN LAYOUT FIRST STYLES -->
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../../../public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../../../public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../../../public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../public/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../../../public/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../../../public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../../../public/assets/layouts/layout6/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../public/assets/layouts/layout6/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../public/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>public/css/dashboard/style.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
    <!-- END HEAD -->

    <body class="login">
        <!-- BEGIN HEADER -->
        <header class="page-header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <div class="havbar-header">
                        
                        <!-- BEGIN TOPBAR ACTIONS -->
                        <div class="topbar-actions">
                            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                            
                            <!-- END HEADER SEARCH BOX -->
                            <a class="btn font-white admin-logout"href="<?=base_url()?>admin/authentication/logout/{admin_id}"> <i class="icon-key"></i> Log Out </a>
                             
                            
                        </div>
                        <form class="search-form" action="" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search here" name="query">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn md-skip submit">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                        
                        <!-- END TOPBAR ACTIONS -->
                    </div>
                </div>
                <!--/container-->
            </nav>
        </header>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="container-fluid">
            <div class="page-content page-content-popup">
                <div class="page-content-fixed-header">
                    <!-- BEGIN BREADCRUMBS -->
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="#">HRTool</a>
                        </li>
                        <li>Home</li>
                    </ul>
                    <!-- END BREADCRUMBS -->
                    <div class="content-header-menu">
                        <!-- BEGIN MENU TOGGLER -->
                        <button type="button" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                        </button>
                        <!-- END MENU TOGGLER -->
                    </div>
                </div>
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    
                    <div class="page-sidebar navbar-collapse collapse">
                        
                       <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="nav-item start ">
                                <a href="<?=base_url()?>admin/homepage" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Home</span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Features</h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Admins</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                       <a href="<?=base_url()?>admin/admins" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Admin List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                       <a href="<?=base_url()?>admin/admins/addadmin" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Add Admin</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Users</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                       <a href="<?=base_url()?>admin/user/userlist" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">User List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                       <a href="<?=base_url()?>admin/user/adduser" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Add User</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Projects</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?=base_url()?>admin/project/projectslist" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Projects List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Assignments</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?=base_url()?>admin/project/assignmentslist" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Assignments List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <div class="page-fixed-main-content">
                    <!-- BEGIN PAGE BASE CONTENT -->