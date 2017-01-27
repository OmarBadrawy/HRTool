            <div class="content">
            <!-- BEGIN REGISTRATION FORM -->
                <h3>Add User</h3>
                <p class="hint "> Enter your account details below: </p>
                <div class="row">
                    <div class="form-group col-xs-6">
                    
                    <label class="control-label visible-ie8 visible-ie9">First Name</label><div id="fname"></div>
                        <input class="form-control placeholder-no-fix add_user"  type="text"  autocomplete="off" placeholder="First Name" name="fname" onkeyup="validate(this, event, 'add_user', 'admin/user/validateadduser')" onclick="validate(this, event, 'add_user', 'admin/user/validateadduser')" /> 
                    {fname}
                    </div>
                     <div class="form-group  col-xs-6">
                        <label class="control-label visible-ie8 visible-ie9">Last Name</label><div id="lname"></div>
                        <input class="form-control placeholder-no-fix add_user"  type="text"  autocomplete="off" placeholder="Last Name" name="lname" onkeyup="validate(this, event, 'add_user', 'admin/user/validateadduser')" onclick="validate(this, event, 'add_user', 'admin/user/validateadduser')"/> 
                    {lname}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Email</label><div id="email"></div>
                    <input class="form-control placeholder-no-fix add_user" type="text"  autocomplete="off" placeholder="Email" name="email" onkeyup="validate(this, event, 'add_user', 'admin/user/validateadduser')" onclick="validate(this, event, 'add_user', 'admin/user/validateadduser')"/> </div>
                    {email}
                <div class="form-group ">
                    <label class="control-label visible-ie8 visible-ie9">Phone</label><div id="phone"></div>
                    <input class="form-control placeholder-no-fix add_user" type="text"  autocomplete="off" placeholder="Phone Number" name="phone" onkeyup="validate(this, event, 'add_user', 'admin/user/validateadduser')" onclick="validate(this, event, 'add_user', 'admin/user/validateadduser')"/> 
                {phone}
                </div>
                <div class="row">
                <div class="form-group col-xs-6">
                    <label class="control-label visible-ie8 visible-ie9">Password</label><div id="user_password"></div>
                    <input class="form-control placeholder-no-fix add_user" type="password" autocomplete="off" id="password" placeholder="Password" name="user_password" onkeyup="validate(this, event, 'add_user', 'admin/user/validateadduser')" onclick="validate(this, event, 'add_user', 'admin/user/validateadduser')" /> 
                {password}
                </div>
                 <div class="form-group col-xs-6">
                    <button type="button" class="btn btn-info uppercase" onclick="submit_form('admin/user/generatepassword')">Generate</button> 
                </div>
                <div class="form-group col-xs-12"> 
                <div id="role" name="role"> Select Your Role: </div>
                  <div class="col-xs-4">
                    <input class="add_user" type="radio" name="role" value="Manager">Manager </input>
                  </div>
                 <div class="col-xs-5">  
                    <input class="add_user" type="radio" name="role" value="Employee">Employee </input>
                 </div>
                 <div class="col-xs-center">  
                    <input class="add_user" type="radio" name="role" value="Trainee">Trainee </input>
                 </div>
                 
                </div>  
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success uppercase pull-right"  onclick="submit_form('admin/user/validateadduser','add_user')">Add User</button>
                </div>
                <div></div>
                <div class="form-group col-xs-12" ><div id='result' style="margin-top:5px;"></div></div>
                
            
               
                
                 
            <!-- END REGISTRATION FORM -->
        </div>
        
 
    

