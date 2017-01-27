                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                      <?php if ($profile)
                                                        { ?>
                                                        {profile}
                                                        <div class="form-group">

                                                             <h4>{first_name} {last_name}</h4>
                                                        </div>

                                                <?php }?>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Overview</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Personal Info</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">Change Avatar</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_4" data-toggle="tab">Edit Profile</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="#">
                                                            
                                                            <h4> Assignments </h4>
                                                            <table class="table table-bordered table-striped table-condensed flip-content">
                                                            <thead class="flip-content">
                                                               
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Deadline</th>
                                                                
                                                            </thead>
                                                             <tbody>
                                                                    <?php if ($assignments)
                                                                    { ?>
                                                                    {assignments}
                                                                        <tr>
                                                                            
                                                                            <td>{assign_name}</td>
                                                                            <td>{assign_description}</td>
                                                                            <td>{deadline_date}</td>

                                                                        </tr>
                                                                    {/assignments}
                                                                    <?php } else

                                                                    { ?>
                                                                        
                                                                        <tr><td colspan = '12' style='text-align:center;color: rgba(0,0,0,0.3)'><h4><span class='glyphicon glyphicon-ban-circle'></span>&nbsp;&nbsp;No Assignments yet</h4></td></tr>
                                                                    <?php
                                                                    } ?>
                                                                    </tbody>
                                                                
                                                            </table>
                                                                {role}
                                                                <a class="btn btn-primary " href="<?php echo base_url().'dashboard/assignments/createseparateassignment/{user_id}'; ?>">New Separate Assignment</a>
                                                                <a class="btn btn-primary " href="<?php echo base_url().'dashboard/assignments/createassignment/{user_id}'; ?>">New Assignment</a>
                                                        </form>
                                                    </div>
                                                    <!-- PERSONAL INFO TAB -->

                                                    <div class="tab-pane" id="tab_1_2">
                                                        <form role="form" action="#">
                                                            <div class="form-group">
                                                                <label class="control-label">Name: {first_name} {last_name}</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email: {email}</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Mobile Number: {mobile}</label>
                                                            </div>
                                                            
                                                        </form>

                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <form action="#" role="form">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img id="avatar" style="width: 100%; height: 100%;" src="<?=base_url()?>{image}" alt="" /> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <input type="file" name="avi" class="avi"> </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green" id="uploadAvi"> Upload </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    {/profile}

                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_4">
                                                        <form action="#">
                                                            <div class="form-group">
                                                                 <label class="control-label">Change First Name</label><div id="fname"></div>
                                                                <input type="text" name="fname" value="" class="form-control profile-form" /> </div>
                                                            <div class="form-group">
                                                                 <label class="control-label">Change Last Name</label><div id="lname"></div>
                                                                <input type="text" name="lname" value="" class="form-control profile-form" /> </div>
                                                            <div class="form-group">
                                                                 <label class="control-label">Change Email</label><div id="email"></div>
                                                                <input type="text" name="email" value="" class="form-control profile-form" /> </div>
                                                            <div class="form-group">
                                                                 <label class="control-label">Change Phone Number</label><div id="phone"></div>
                                                                <input type="text" name="phone" value="" class="form-control profile-form" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Current Password</label><div id="cpass">{cpass}</div>
                                                                <input type="password" name="cpass" value="{cpass_value}" class="form-control profile-form" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">New Password</label><div id="npass">{npass}</div>
                                                                <input type="password" name="npass" value="{npass_value}" class="form-control profile-form" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Password</label><div id="rpass">{rpass}</div>
                                                                <input type="password"  name="rpass" value="{rpass_value}" class="form-control profile-form" /> </div>
                                                            <div class="margin-top-10">
                                                                <a class="btn btn-primary" id="submit-edit"> Edit Profile </a>
                                                                <input type="reset" value="Cancel" class="btn default">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->