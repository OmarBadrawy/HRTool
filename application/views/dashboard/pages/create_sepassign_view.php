

	
	<form action="{action}" method="post">
	  
		<div class="form-group col-xs-6">
		<div id="assign_name">Assignment Name</div>
	    <input class="form-control form-control-solid placeholder-no-fix create-sepassign" type="text" placeholder="Assign_name" autocomplete="off" name="assign_name" value=""/> 
	  </div>
	  <div class="form-group col-xs-6">
	  	<div id="description">Description</div>
	  	<textarea class="form-control  create-sepassign" type="text" placeholder="Description" autocomplete="off" name="description" value="" ></textarea>
	  </div>
	   <div class="form-group col-xs-6">
	   	
	  	<div id="assigned_to"> Assigned To:</div>
	  	<select class="form-control create-sepassign" name="assigned_to"/>
	  	
	  		<option value="0"></option>
	  	{profile}
	  		<option class="form-control create-sepassign" type="text" placeholder="Assign_To" value="{user_id}" onkeyup="validate(this, event)" onclick="validate(this, event)">{first_name} {last_name}</option>
	  	{/profile}
	  	</select>
	  	
	  </div>
	  <div class="form-group col-xs-6">
	  	<div id="deadline">Due by: </div>
	  	 <input class="form-control create-sepassign" type="datetime-local" placeholder="Deadline" name="deadline" value="" onkeyup="validate(this, event)" onclick="validate(this, event)"/>
	  </div>	
	  <div class="form-group col-xs-12">
	  	<a id='sepresult'>
	  </div>
	   <div class="form-group col-xs-12">
	   	 <button type="submit" class="btn btn-primary uppercase pull-right" id="submit-user-sepassignment">Create Assignment</button>
	   </div>
	 </form>


