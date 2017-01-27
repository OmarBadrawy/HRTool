<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>HRTool - Reset Password</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?=base_url()?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url()?>public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />       
         <link href="<?=base_url()?>public/css/dashboard/style.css" rel="stylesheet" type="text/css" />

    <body class="login">

        <div class="reset" >

            <form class="login-form col-xs-9 col-xs-offset-1">
                <h3 class="form-title font-white">Enter New Password.</h3>
                    <input type="hidden" name="token" class="reset-password" value="{token}" /> 
                <div class="form-group"> 
                    <div id="pass"></div><div id="token"></div>
                    <input class="form-control reset-password" id="pass" type="password" placeholder="Password" name="pass" onkeyup="validate(this, event)" onclick="validate(this, event)" /> 
                </div>
                <div class="form-group">  
                    <div id="cpass"></div>                 
                    <input class="form-control reset-password" id="cpass" type="password" placeholder="Password Confirmation" name="cpass" onkeyup="validate(this, event)" onclick="validate(this, event)" /> 
                </div>
                <div class="form-actions">
                    <button type = "button" id="reset-password" class="btn green uppercase col-xs-12">Reset</button>
                    
                </div>
            </form>
        <script src="<?=base_url()?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/js/dashboard/submit.js" type="text/javascript"></script>


    </body>

</html>