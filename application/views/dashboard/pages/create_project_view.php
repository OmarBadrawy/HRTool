	<form action="{action}" method="post">
	  
	  	<div class="form-group col-xs-12">
		  	<div id="project_name"> Project Name:</div>
		  	<input class="form-control create-project" type="text" placeholder="Project_name" autocomplete="off" name="project_name" value="" onkeyup="validate(this, event)" onclick="validate(this, event)"/>
		</div>
	  <div class="form-group col-xs-12">
	  	<div id="description">Description</div>
	  	<textarea class="form-control  create-project" type="text" placeholder="Description" autocomplete="off" name="description" value="" ></textarea>
	  </div>
	   
	  <div class="form-group col-xs-6">
	  	<div id="deadline">Due by: </div>
	  	 <input class="form-control create-project" type="datetime-local" placeholder="Deadline" name="deadline" value="" onkeyup="validate(this, event)" onclick="validate(this, event)"/>
	  </div>	
	  <div class="form-group col-xs-12">
	  	<a id='result'>
	  </div>
	   <div class="form-group col-xs-12">
	   	 <button type="submit" class="btn btn-success uppercase pull-right" id="submit-user-project">Create Project</button>
	   </div>
	 </form>


