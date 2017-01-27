<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HRTool | {title}</title>
   <!-- BEGIN LAYOUT FIRST STYLES -->
        <!-- END LAYOUT FIRST STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{base_url}public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{base_url}public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{base_url}public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{base_url}public/assets/layouts/layout6/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/layouts/layout6/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{base_url}public/assets/global/plugins/dropzone/dropzone.min.css">
        <link href="{base_url}public/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>public/css/dashboard/style.css" rel="stylesheet" type="text/css" />

         <script src="{base_url}public/js/jquery.min.js" type="text/javascript"></script>



        <!-- END THEME LAYOUT STYLES -->
</head>
<body class="login ">
<div class="container-fluid">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{base_url}dashboard/homepage">HRTool</a>
    </div>
    <ul class="nav navbar-nav">
      
      <li class="nav-item"><a href="{base_url}dashboard/account/">My Account</a></li>
     </ul>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{base_url}dashboard/authentication/logout">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<div class="container-fluid ">
<div class="row ">
  <div class="container-fluid ">
      <div class="portlet light portlet-fit bordered col-xs-10 col-xs-push-1">
          <div class="portlet-title">
              <div class="caption">
                  <i class=" icon-layers font-green"></i>
                  <span class="caption-subject font-green bold uppercase">{heading}</span>
              </div>
          </div>


	