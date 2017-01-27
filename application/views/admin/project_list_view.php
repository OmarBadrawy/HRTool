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
                                        <i class="fa fa-cogs"></i> Projects List </div>
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
                                                
                                                <th> Project Name </th>
                                                <th> Project Description </th>
                                                <th> Created By </th>
                                                <th> Deadline Date </th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($projects) 
                                        { ?>
                                        {projects}
                                            <tr>
                                                
                                                <td> {project_name} </td>
                                                <td> {project_description} </td>
                                              {creator}  <td> {first_name} {last_name} </td> {/creator}
                                                <td> {deadline_date}</td>
						
											</tr>
										{/projects}
										<?php }else 
										{ ?>	
											<tr><td colspan = '12' style='text-align:center;color: rgba(0,0,0,0.3)'><h4><span class='glyphicon glyphicon-ban-circle'></span>&nbsp;&nbsp;No projects added yet</h4></td></tr>
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