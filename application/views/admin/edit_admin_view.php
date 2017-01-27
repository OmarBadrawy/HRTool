        <div class="content">
            <!-- BEGIN REGISTRATION FORM -->
                <h3 class="font-green">Edit Admin</h3>
                <p class="hint"> Enter Admin details below: </p>
               {admin}
                <input type="hidden" class="add_admin" name="id" value="{id}" >
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">First Name</label><div id="fname"></div>
                    <input class="form-control placeholder-no-fix add_admin" type="text"  autocomplete="off" placeholder="First Name" name="fname" onkeyup="validate(this, event, 'add_admin', 'admin/admins/validateeditadmin')" onclick="validate(this, event, 'add_admin', 'admin/admins/validateeditadmin')" value="{admin_fname}" /> 
                </div>
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Last Name</label><div id="lname"></div>
                    <input class="form-control placeholder-no-fix add_admin" type="text"  autocomplete="off" placeholder="Last Name" name="lname" onkeyup="validate(this, event, 'add_admin', 'admin/admins/validateeditadmin')" onclick="validate(this, event, 'add_admin', 'admin/admins/validateeditadmin')" value="{admin_lname}"/> 
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label><div id="email"></div>
                    <input class="form-control placeholder-no-fix add_admin" type="text" placeholder="Email" name="email" onkeyup="validate(this, event, 'add_admin', 'admin/admins/validateeditadmin')" onclick="validate(this, event, 'add_admin', 'admin/admins/validateeditadmin')" value="{email}"/> 
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9 add_admin">Password</label><div id="password"></div>
                    <input class="form-control placeholder-no-fix add_admin" type="password" autocomplete="off" placeholder="Password" name="password" onkeyup="validate(this, event, 'add_admin', 'admin/admins/validateeditadmin')" onclick="validate(this, event, 'add_admin', 'admin/admins/validateeditadmin')" /> 
                </div>
                {/admin}
                <div class="form-actions">
                    <button type="submit" class="btn btn-success uppercase pull-right" onclick="submit_form('admin/admins/validateeditadmin','add_admin')">Submit</button>
                </div>
            <!-- END REGISTRATION FORM -->
        </div>