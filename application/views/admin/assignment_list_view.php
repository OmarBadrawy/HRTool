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
                                        <i class="fa fa-cogs"></i> Assignments List </div>
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
                                                
                                                <th> Assignment Name </th>
                                                <th> Assignment Description </th>
                                                <th> Project Name </th>
                                                <th> Assigned To </th>
                                                <th> Deadline Date</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($assignments) 
                                        { ?>
                                        {assignments}
                                            <tr>
                                                
                                                <td> {assign_name} </td>
                                                <td> {assign_description} </td>
                                                {p_name} <td> {project_name} </td> {/p_name}
                                                {assign} <td> {first_name} {last_name} </td> {/assign}
                                                <td> {deadline_date}</td>
						
											</tr>
										{/assignments}
										<?php }else 
										{ ?>	
											<tr><td colspan = '12' style='text-align:center;color: rgba(0,0,0,0.3)'><h4><span class='glyphicon glyphicon-ban-circle'></span>&nbsp;&nbsp;No assignments added yet</h4></td></tr>
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