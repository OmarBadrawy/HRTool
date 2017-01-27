<?php
class UserModel extends CI_Model{

	public function addUser($fname,$lname, $email,$password, $phone,$role){
		$query = "INSERT INTO user(first_name, last_name, email, password, mobile, role) VALUES('".addslashes($fname)."', '".addslashes($lname)."', '".addslashes($email)."' ,'".addslashes($password)."','".addslashes($phone)."', '".addslashes($role)."');";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function getUserInfo($key)
	{
		$query = "SELECT * FROM user WHERE email = '".addslashes($key)."' OR user_id = '".addslashes($key)."' OR mobile = '".addslashes($key)."';";
		$result = $this->db->query($query);
	 	return $result->result_array();
	}

	public function getUser($key)
	{
		$query = "SELECT * FROM user WHERE email = '".addslashes($key)."' OR user_id = '".addslashes($key)."' OR mobile = '".addslashes($key)."';";
		$result = $this->db->query($query);
	 	return $result->row();
	}

	public function isActive($userId, $active)
	{
		$query = "UPDATE user SET isActive = '".addslashes($active)."' WHERE user_id='".addslashes($userId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function fLogin($userId, $flogin)
	{
		$query = "UPDATE user SET flogin = '".addslashes($flogin)."' WHERE user_id='".addslashes($userId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function getUserActivationToken($token){
		$query = "SELECT * FROM user WHERE user.activation_token ='".addslashes($token)."' LIMIT 1;";
		$result = $this->db->query($query);
	 	return $result->result_array();
	}

	public function addUserActivationToken($userEmail, $token) {
		$query = "UPDATE user SET activation_token = '".addslashes($token)."' WHERE email='".addslashes($userEmail)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function activate($userId, $active)
	{
		$query = "UPDATE user SET activated = '".addslashes($active)."' WHERE user_id='".addslashes($userId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function getUserPasswordToken($token){
		$query = "SELECT * FROM forgot_password WHERE token = '".addslashes($token)."' AND changed = 0 AND disabled = 0 LIMIT 1;";
		$result = $this->db->query($query);
	 	return $result->result_array();
	}

	public function disableTokens($userId){
		$query = "UPDATE forgot_password SET disabled = '1' WHERE user_id='".addslashes($userId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function addUserPasswordToken($userId, $token){
		$query = "INSERT INTO forgot_password (user_id, token) VALUES ('".addslashes($userId)."','".addslashes($token)."')";
		$result = $this->db->query($query);
		return $result;
	}

	public function updateUserPassword($userId, $password){
		$query = "UPDATE user SET password = '".addslashes($password)."' WHERE user_id='".addslashes($userId)."'";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function passwordChanged($token){
		$query = "UPDATE forgot_password SET changed = '1' WHERE  token = '".addslashes($token)."' ";
		$result = $this->db->query($query);
	 	return $result;
	}

	public function updateProfile($fname, $lname, $email, $phone, $password, $user_id)
	{
		$query = "UPDATE user SET first_name = '".addslashes($fname)."',last_name ='".addslashes($lname)."', email='".addslashes($email)."', mobile='".addslashes($phone)."', password = '".addslashes($password)."' WHERE user_id='".addslashes($user_id)."'";
		$result = $this->db->query($query);
		return $result;
	}

	public function getUsers()
	{
		$query  = "SELECT * FROM user";
	 	$result = $this->db->query($query);
	 	return $result->result_array();
	}

	public function getProfileInfo($userId){
		$query  = "SELECT * FROM user WHERE user_id = '".addslashes($userId) ."';";
	 	$result = $this->db->query($query);
	 	return $result->result_array();
	}
	public function getDetails($userId){
		$query  = "SELECT * FROM user WHERE user_id = '".addslashes($userId) ."';";
	 	$result = $this->db->query($query);
	 	return $result->row();
	}

	public function deleteUser($id) {
		$this->db->where('user_id',$id);		
		$this->db->delete('user');
		return $this->db->affected_rows();
	}
}