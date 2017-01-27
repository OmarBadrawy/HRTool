        <div class="content">
            <!-- BEGIN REGISTRATION FORM -->
                <h3 class="font-green">Add Admin</h3>
                <p class="hint"> Enter Admin details below: </p>
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">First Name</label><div id="fname"></div>
                    <input class="form-control placeholder-no-fix add_admin" type="text"  autocomplete="off" placeholder="First Name" name="fname" onkeyup="validate(this, event, 'add_admin', 'admin/admins/validateaddadmin')" onclick="validate(this, event, 'add_admin', 'admin/admins/validateaddadmin')" /> 
                </div>
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Last Name</label><div id="lname"></div>
                    <input class="form-control placeholder-no-fix add_admin" type="text"  autocomplete="off" placeholder="Last Name" name="lname" onkeyup="validate(this, event, 'add_admin', 'admin/admins/validateaddadmin')" onclick="validate(this, event, 'add_admin', 'admin/admins/validateaddadmin')"/> 
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Email</label><div id="admin_email"></div>
                    <input class="form-control placeholder-no-fix add_admin" type="text" placeholder="Email" name="admin_email" onkeyup="validate(this, event, 'add_admin', 'admin/admins/validateaddadmin')" onclick="validate(this, event, 'add_admin', 'admin/admins/validateaddadmin')"/> 
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9 add_admin">Password</label><div id="admin_password"></div>
                    <input class="form-control placeholder-no-fix add_admin" type="password" autocomplete="off" id="admin_pass" placeholder="Password" name="admin_password" onkeyup="validate(this, event, 'add_admin', 'admin/admins/validateaddadmin')" onclick="validate(this, event, 'add_admin', 'admin/admins/validateaddadmin')" /> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info uppercase" onclick="submit_form('admin/admins/generatepassword')">Generate</button>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success uppercase pull-right" onclick="submit_form('admin/admins/validateaddadmin','add_admin')">Add Admin</button>
                </div>
                
            <!-- END REGISTRATION FORM -->
        </div><br>
        <div id="result"></div>