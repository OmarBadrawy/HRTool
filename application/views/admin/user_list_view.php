            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i> Users List </div>
<!--                                     <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div> -->
                                </div>
                                <div class="portlet-body flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content">
                                            <tr>
                                                
                                                <th> First Name </th>
                                                <th> Last Name </th>
                                                <th> Email </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($users) 
                                        { ?>
                                        {users}
                                            <tr>
                                                
                                                <td> {first_name} </td>
                                                <td> {last_name} </td>
                                                <td> {email} </td>
												<td>
												<a class="btn btn-warning btn-sm btn-block" href="<?php echo base_url().'admin/admins/edituser/{user_id}'; ?>">Edit</a>
												<a href="#" class="btn btn-danger btn-sm btn-block delUser" id="{user_id}">Delete</a></td>
											</tr>
										{/users}
										<?php }else 
										{ ?>	
											<tr><td colspan = '12' style='text-align:center;color: rgba(0,0,0,0.3)'><h4><span class='glyphicon glyphicon-ban-circle'></span>&nbsp;&nbsp;No users added yet</h4></td></tr>
										<?php 
										} ?>	

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->