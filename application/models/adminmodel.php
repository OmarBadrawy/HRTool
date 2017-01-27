<?php
class AdminModel extends CI_Model{

	public function addAdmin($fname,$lname,$email,$password){
		$query = "INSERT INTO admin(admin_fname, admin_lname, email, password) VALUES('".$fname."', '".$lname."', '".$email."' ,'".$password."');";
		$result = $this->db->query($query);
		return $result;
	}

	public function getAdminInfo($key)
	{
		$query = "SELECT * FROM admin WHERE admin_id = '".addslashes($key)."' OR email =  '".addslashes($key)."'" ;
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getAdmin($key)
	{
		$query = "SELECT * FROM admin WHERE admin_id = '".addslashes($key)."' OR email =  '".addslashes($key)."'" ;
		$result = $this->db->query($query);
		return $result->row();
	}

	public function getAllAdmins(){
		$query = "SELECT * FROM admin";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function editAdmin($id, $fname,$lname,$email,$password){

		$query = "UPDATE admin SET admin_fname='".addslashes($fname)."', admin_lname='".addslashes($lname)."', email='".addslashes($email)."', password='".addslashes($password)."' WHERE admin_id='".$id."'";
		$result = $this->db->query($query);
		return $result;
	}

	public function deleteAdmin($id) {
		$this->db->where('admin_id',$id);		
		$this->db->delete('admin');
		return $this->db->affected_rows();
	}

	public function getUserActivationToken($token){
		$query = "SELECT * FROM admin WHERE admin.activation_token ='".addslashes($token)."' LIMIT 1;";
		$result = $this->db->query($query);
	 	return $result->result_array();
	}

	public function addUserActivationToken($Email, $token) {
		$query = "UPDATE admin SET activation_token = '".addslashes($token)."' WHERE email='".addslashes($Email)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function activate($adminId, $active)
	{
		$query = "UPDATE admin SET activated = '".addslashes($active)."' WHERE admin_id='".addslashes($adminId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function isActive($adminId, $active)
	{
		$query = "UPDATE admin SET isActive = '".addslashes($active)."' WHERE admin_id='".addslashes($adminId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function fLogin($adminId, $flogin)
	{
		$query = "UPDATE admin SET flogin = '".addslashes($flogin)."' WHERE admin_id='".addslashes($adminId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function getUserPasswordToken($token){
		$query = "SELECT * FROM admin_forget_password WHERE token = '".addslashes($token)."' AND changed = 0 AND disabled = 0 LIMIT 1;";
		$result = $this->db->query($query);
	 	return $result->result_array();
	}

	public function disableTokens($AdminId){
		$query = "UPDATE admin_forget_password SET disabled = '1' WHERE admin_id='".addslashes($AdminId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function addUserPasswordToken($AdminId, $token){
		$query = "INSERT INTO admin_forget_password (admin_id, token) VALUES ('".addslashes($AdminId)."','".addslashes($token)."')";
		$result = $this->db->query($query);
		return $result;
	}

	public function updateUserPassword($AdminId, $password){
		$query = "UPDATE admin SET password = '".addslashes($password)."' WHERE admin_id='".addslashes($AdminId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function passwordChanged($token){
		$query = "UPDATE admin_forget_password SET changed = '1' WHERE  token = '".addslashes($token)."' ";
		$result = $this->db->query($query);
	 	return $result;
	}

}
