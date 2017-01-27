<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>HRTool - New Password</title>
       
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?=base_url()?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url()?>public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />       
        <link href="../../public/css/dashboard/style.css" rel="stylesheet" type="text/css" />

    <body class="login" style="background-color:#364150;">

        <div class="container">

            <form class="login-form col-xs-9 col-xs-offset-1">
                <h3 class="form-title font-white">Please Enter Your Email.</h3>
                <div id="email"></div>
                <div id="user-email-div" class="form-group">                   
                    <input class="form-control form-control-solid placeholder-no-fix new-password" id="email" type="text" placeholder="Email" name="email" onkeyup="validate(this, event)" onclick="validate(this, event)" /> </div>
                <div class="form-actions">
                    <button type = "button" id="new-password" class="btn green uppercase col-xs-12">Reset</button>
                </div>
            </form>
        <script src="<?=base_url()?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/js/dashboard/submit.js" type="text/javascript"></script>


    </body>

</html>