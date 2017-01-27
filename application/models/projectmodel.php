<?php

class ProjectModel extends CI_Model{

	public function createProject($project_name,$description,$deadline,$userid)
	{
		$query = "INSERT INTO projects(project_name, project_description, created_by,deadline_date) 
		VALUES('".addslashes($project_name)."', '".addslashes($description)."', '".addslashes($userid)."' ,'".addslashes($deadline)."');";
			$result = $this->db->query($query);
		 	return $result;
	}

	public function getProjects()
	{
		$query = "SELECT * FROM projects ";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function getProjectDetails()
	{
		$query = "SELECT * FROM projects ";
		$result=$this->db->query($query);
		return $result->row();
	}

	public function getProjectInfo($userId)
	{
		$query = "SELECT * FROM projects WHERE created_by = '".addslashes($userId)."';";
		$result=$this->db->query($query);
		return $result->result_array();
	}

	public function getCreatedBy()
	{
		$query  = "SELECT u.first_name, u.last_name FROM projects p INNER JOIN user u ON u.user_id = p.created_by";
		$result = $this->db->query($query);
		return $result->result_array();
	}



}
