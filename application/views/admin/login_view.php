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
        <title>HRTool | Admin Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--         <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
 -->        <link href="{base_url}public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{base_url}public/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{base_url}public/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{base_url}public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{base_url}public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <!-- <link href="{base_url}public/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=base_url()?>public/css/dashboard/style.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
    <!-- END HEAD -->

    <body class=" login">
        <div class="signin">
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
                <h3 class="form-title font-white">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Email and password. </span>
                </div>
                <form action="{action}" method="post">
                    <div class="form-group" >
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="control-label visible-ie8 visible-ie9">Email</label><div id="email">{email}</div>
                        <input class="form-control form-control-solid placeholder-no-fix login_form" type="text"  autocomplete="off" placeholder="E-Mail" name="email" value="{email_value}" onkeyup="validate(this, event)" onclick="validate(this, event)" /> </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label><div id="password">{password}</div>
                        <input class="form-control form-control-solid placeholder-no-fix login_form" type="password" autocomplete="off" placeholder="Password" name="password" value="{password_value}" onkeyup="validate(this, event)" onclick="validate(this, event )"/> </div>
                    <div class="form-actions">
                        <button  type="submit" class="btn green uppercase" id="submit-admin-login">Login</button>
                        <a href="<?=base_url()?>dashboard/Authentication/forgotpassword" id="forget-password" class="forget-password font-white">Forgot Password?</a>

                    </div>
                </form>
            <!-- END LOGIN FORM -->
           </div>
        </div>
        
        <!--[if lt IE 9]>
<script src="{base_url}public/assets/global/plugins/respond.min.js"></script>
<script src="{base_url}public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{base_url}public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{base_url}public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{base_url}public/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{base_url}public/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{base_url}public/js/dashboard/submit.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>