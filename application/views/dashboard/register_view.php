<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>HRTool | Register</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--         <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
 -->        <link href="../../public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../../public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../../public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../../public/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../../public/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../../public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../../public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../../public/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../../public/css/dashboard/style.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="register">
            <!-- BEGIN REGISTRATION FORM -->
                <h3 class="font-white">Sign Up</h3>
                <p class="hint font-white"> Enter your account details below: </p>
                <div class="row font-white">
                    <div class="form-group col-xs-6">
                    <form action="{action}" method="post">
                    <label class="control-label visible-ie8 visible-ie9">First Name</label><div id="fname">First Name</div>
                        <input class="form-control placeholder-no-fix "  type="text"  autocomplete="off" placeholder="First Name" name="fname" onkeyup="validate(this, event)" onclick="validate(this, event)" /> 
                    {fname}
                    </div>
                     <div class="form-group  col-xs-6">
                        <label class="control-label visible-ie8 visible-ie9">Last Name</label><div id="lname">Last Name</div>
                        <input class="form-control placeholder-no-fix "  type="text"  autocomplete="off" placeholder="Last Name" name="lname" onkeyup="validate(this, event)" onclick="validate(this, event)"/> 
                    {lname}
                    </div>
                </div>
                <div class="form-group font-white">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label><div >Email</div>
                    <input class="form-control placeholder-no-fix " type="text" id="email"  placeholder="Email" name="email" onkeyup="validate(this, event)" onclick="validate(this, event)"/> </div>
                    {email}
                <div class="form-group font-white">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Phone</label><div >Phone</div>
                    <input class="form-control placeholder-no-fix " type="text" id="phone" placeholder="Phone Number" name="phone" onkeyup="validate(this, event)" onclick="validate(this, event)"/> 
                {phone}
                </div>
                <div class="row font-white">

                <div class="form-group col-xs-6">
                    <label class="control-label visible-ie8 visible-ie9 ">Password</label><div >Password</div>
                    <input class="form-control placeholder-no-fix " type="password" id="password" autocomplete="off" placeholder="Password" name="password" onkeyup="validate(this, event)" onclick="validate(this, event)" /> </div>
                {password}
                <div class="form-group col-xs-6">
                    <label class="control-label visible-ie8 visible-ie9 ">Re-type Your Password</label><div >Confirm Password</div>
                    <input class="form-control placeholder-no-fix " type="password" id="rpassword" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" onkeyup="validate(this, event)" onclick="validate(this, event)" /> </div>
                {rpassword}
                </div>
                <div class="form-group col-xs-12 font-white"> 
               <div id="role" name ="role"> Select Your Role: </div>
                  <div class="form-group col-xs-4">
                    <input  type="radio" name="role" value="1" onkeyup="validate(this, event)" onclick="validate(this, event)" />Manager </input>
                  </div>
                 <div class="form-group col-xs-5">  
                    <input  type="radio" name="role" value="2" onkeyup="validate(this, event)" onclick="validate(this, event)"/>Employee </input>
                 </div>
                 <div class="form-group col-xs-center">  
                    <input  type="radio" name="role" value="3" onkeyup="validate(this, event)" onclick="validate(this, event)"/>Trainee </input>
                 </div>

                </div> 
                <div class="form-group col-xs-12">
                     <a  id='register'>
                </div>  
                <div class="form-actions">
                    <button type="submit" class="btn btn-success uppercase pull-right" id="submit-user-register">Register</button>
                </div>
                
                </form>
            <!-- END REGISTRATION FORM -->
        </div>
        
        <!--[if lt IE 9]>
<script src="../../public/assets/global/plugins/respond.min.js"></script>
<script src="../../public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../../public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../public/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../../public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../../public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../../public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../../public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../../public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../../public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../../public/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../../public/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../../public/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../../public/js/dashboard/submit.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>