<?php
session_start ();
require_once 'model.php';
ini_set ( "display_error", 'on' );
class Register extends model {
	protected $username;
	protected $password;
	protected $message;
	protected $recid;
	protected $j =2;
	
	/**
	 *
	 * @return the $username
	 */
	public function getUsername() {
		return $this->username;
	}
	
	/**
	 *
	 * @return the $password
	 */
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 *
	 * @param field_type $username        	
	 */
	public function setUsername($username) {
		$this->username = $username;
	}
	
	/**
	 *
	 * @param field_type $password        	
	 */
	public function setPassword($password) {
		$this->password = $password;
	}
	public function setMessage($message) {
		$this->message = $message;
	}
	public function getMessage() {
		return $this->message;
	}
	public function setRecid($recid) {
		$this->recid = $recid;
	}
	public function getRecid() {
		return $this->recid;
	}
	public function login() {
		$this->db->Fields ( array (
				"username",
				"password",
				"id" 
		) );
		$this->db->From ( "user" );
		$this->db->where ( array (
				"username" => $this->getUsername (),
				"password" => $this->getPassword () 
		) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		if ($result) {
			$_SESSION ['uid'] = $result [0] ['id'];
			$_SESSION ['user1'] = $result [0] ['username'];
		}
		return count ( $result );
	}
	public function updateLogged() {
		$this->db->Fields ( array (
				"loggedin" => "Y" 
		) );
		$this->db->From ( "user" );
		$this->db->Where ( array (
				"username" => $_SESSION ['user1'] 
		) );
		$result = $this->db->Update ();
		return $result;
	}
	public function logOut() {
		$this->db->Fields ( array (
				"loggedin" => "N" 
		) );
		$this->db->From ( "user" );
		$this->db->Where ( array (
				"username" => $_SESSION ['user1'] 
		) );
		$result = $this->db->Update ();
		if ($result == "1") {
			session_destroy ();
			return $result;
		}
	}
	public function loggedinCount() {
		$this->db->Fields ( array (
				"username",
				"id" 
		) );
		$this->db->From ( "user where loggedin='Y' and username <> '" . $_SESSION ['user1'] . "'" );
		$this->db->Select ();
		$this ->db->Limit("4");
		$result = $this->db->resultArray ();
		//print_r($result);die;
		for($i =0 ; $i < count($result) ; $i ++)
		{
			$_SESSION["user".$this->j] = $result[$i]['username'];
			$this->j ++;
		}
		//print_r($_SESSION);
		//echo $this->db->lastQuery();die;
		//print_r($result);die;
		// if(count($result) == 4);
		return (count($result));
	}
	
}


?>
