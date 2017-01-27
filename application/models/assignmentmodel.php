<?php

class AssignmentModel extends CI_Model{
	
public function createAssignment($project, $assign_name,$description,$deadline,$assign_to,$userid)
{
	$query = "INSERT INTO assignment(project_id,assign_name, assign_description,deadline_date, assigned_to, created_by) 
	VALUES('".addslashes($project)."','".addslashes($assign_name)."', '".addslashes($description)."', '".addslashes($deadline)."' ,
		'".addslashes($assign_to)."','".addslashes($userid)."');";
		$result = $this->db->query($query);
	 	return $result;
}

public function createSeparateAssignment($assign_name,$description,$deadline,$assign_to,$userid)
{
	$query = "INSERT INTO assignment(assign_name, assign_description,deadline_date, assigned_to, created_by) 
	VALUES('".addslashes($assign_name)."', '".addslashes($description)."', '".addslashes($deadline)."' ,
		'".addslashes($assign_to)."','".addslashes($userid)."');";
		$result = $this->db->query($query);
	 	return $result;
}

public function getAssignments()
{
	$query = "SELECT * FROM assignment";
	$result=$this->db->query($query);
	return $result->result_array();
}

public function getAssignmentDetails()
{
	$query = "SELECT * FROM assignment";
	$result=$this->db->query($query);
	return $result->row();
}

public function getAssignInfo($userId)
{
	$query = "SELECT * FROM assignment WHERE created_by = '".addslashes($userId)."';";
	$result=$this->db->query($query);
	return $result->result_array();
}

public function getAssignDetails($userId)
{
	$query = "SELECT * FROM assignment WHERE assigned_to = '".addslashes($userId)."';";
	$result=$this->db->query($query);
	return $result->row();
}

public function getValidList($userId)
{
	$query = "SELECT * FROM user u LEFT JOIN assignment a ON u.user_id = '".addslashes($userId)."' WHERE u.role >= 2";
	$result = $this->db->query($query);
	return $result->result_array();

}

public function getAssignedName($assigned_to)
{
	$query  = "SELECT u.first_name, u.last_name FROM assignment a JOIN user u ON u.user_id = '".addslashes($assigned_to)."'";
	$result = $this->db->query($query);
	return $result->result_array();
}

public function getProjectName($project_id)
{
	$query  = "SELECT p.project_name FROM assignment a Right JOIN projects p ON a.project_id = '".addslashes($project_id)."'";
	$result = $this->db->query($query);
	return $result->result_array();
}



















}
