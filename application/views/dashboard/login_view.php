
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>HRTool | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--         <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
 -->        <link href="<?=base_url()?>public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url()?>public/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>public/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url()?>public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url()?>public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url()?>public/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
         <link href="<?=base_url()?>public/css/dashboard/style.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
    <!-- END HEAD -->
        
    <body class=" login">
        
        <!-- BEGIN LOGIN -->
        <div class="signin">
            
            <!-- BEGIN LOGIN FORM -->
                <h3 class="form-title font-white">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Email and password. </span>
                </div>
                <form action="{action}" method="post">
                    <div class="form-group">
                        {activation_message}
                    </div>
                    <div class="form-group ">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="control-label visible-ie8 visible-ie9">Email</label><div id="email">{email}</div>
                        <input class="form-control form-control-solid placeholder-no-fix login_form" type="text"  autocomplete="off" placeholder="E-Mail" name="email" value="{email_value}" onkeyup="validate(this, event)" onclick="validate(this, event)" /> </div>
                    <div class="form-group ">
                        <label class="control-label visible-ie8 visible-ie9">Password</label><div id="password">{password}</div>
                        <input class="form-control form-control-solid placeholder-no-fix login_form" type="password" autocomplete="off" placeholder="Password" name="password" value="{password_value}" onkeyup="validate(this, event)" onclick="validate(this, event )"/> </div>
                    <div class="form-actions">
                        <button  type="submit" class="btn blue uppercase" id="submit-user-login">Login</button>
                        <a href="<?=base_url()?>dashboard/Authentication/forgotpassword" id="forget-password" class="forget-password font-white">Forgot Password?</a>
                    </div>
                </form>
            <!-- END LOGIN FORM -->
              
            </form>
              <div class="create-account">
                    <p>
                        <a href="<?=base_url()?>dashboard/Authentication/register" id="register-btn" class="uppercase font-white">Create an account</a>
                    </p>
                </div>
            
            <!-- END FORGOT PASSWORD FORM -->
        </div>

        
        <!--[if lt IE 9]>
            <script src="<?=base_url()?>public/assets/global/plugins/respond.min.js"></script>
            <script src="<?=base_url()?>public/assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url()?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/js/dashboard/submit.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>