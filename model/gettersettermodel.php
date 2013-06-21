<?php
session_start ();
require_once 'model.php';
ini_set ( "display_error", 'on' );
class Register extends model {
	protected $username;
	protected $password;
	protected $message;
	protected $recid;
	protected $j =1;
	protected $random1;
	protected $random2;
	
	/**
	 * @return the $random1
	 */
	public function getRandom1() {
		return $this->random1;
	}

	/**
	 * @param field_type $random1
	 */
	public function setRandom1($random1) {
		$this->random1 = $random1;
	}

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
			$_SESSION ['username'] = $result [0] ['username'];
		}
		return count ( $result );
	}
	public function updateLogged() {
		$this->db->Fields ( array (
				"loggedin" => "Y" 
		) );
		$this->db->From ( "user" );
		$this->db->Where ( array (
				"username" => $_SESSION ['username'] 
		) );
		$result = $this->db->Update ();
		return $result;
	}
	
	public function fetchturnRandom() {
		$this->db->Fields ( array ("turnrandom"));
		$this->db->From ( "randomvalue" );
		$result = $this->db->Select ();
		return $result[0]["turnrandom"];
	}
	
	public function fetchslipRandom() {
		$this->db->Fields ( array ("sliprandom"));
		$this->db->From ( "randomvalue" );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		return $result[0]["sliprandom"];
	}
	
	public function turnRandom() {
		$this->db->Fields ( array ("id"));
		$this->db->From ("randomvalue");
		$this->db->Select ();
		$result = $this->db->resultArray ();
		$this->db->From ("randomvalue");
		if(empty($result))
		{
			$this->db->Fields ( array ("turnrandom" => $this->getRandom1 ()));
			$result1 = $this->db->Insert ();
		}
		else
		{
			$this->db->Fields ( array ("turnrandom" => $this->getRandom1 ()) );
			$result1 = $this->db->Update ();
		}
	}
	
	public function slipRandom() {
		$this->db->Fields ( array ("id"));
		$this->db->From ("randomvalue");
		$this->db->Select ();
		$result = $this->db->resultArray ();
		$this->db->From ("randomvalue");
		if(empty($result))
		{
			$this->db->Fields ( array ("sliprandom" => $this->getRandom2 ()));
			$result1 = $this->db->Insert ();
		}
		else
		{
			$this->db->Fields ( array ("sliprandom" => $this->getRandom2 ()) );
			$result1 = $this->db->Update ();
			echo $this->db->lastQuery();
		}
	}

	/**
	 * @return the $random2
	 */
	public function getRandom2() {
		return $this->random2;
	}

	/**
	 * @param field_type $random2
	 */
	public function setRandom2($random2) {
		$this->random2 = $random2;
	}

	public function insertMessage() {
		
		$this->db->Fields ( array ("user"));
		$this->db->From ($_SESSION ['user1'][0].$_SESSION ['user2'][0].$_SESSION ['user3'][0].$_SESSION ['user4'][0]."message");
		$this->db->Where ( array ("user" => $_SESSION ['username'] ) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		$this->db->From ($_SESSION ['user1'][0].$_SESSION ['user2'][0].$_SESSION ['user3'][0].$_SESSION ['user4'][0]."message");
		if(empty($result))
		{
			$this->db->Fields ( array ("user" => $_SESSION['username']  ,"message" =>$this->getMessage () , "status"=>"n") );
			$result1 = $this->db->Insert ();
		}
		else
		{
			$this->db->Fields ( array ("message" =>$this->getMessage () , "status"=>"n") );
			$this->db->Where ( array ("user" => $_SESSION ['username'] ) );
			$result1 = $this->db->Update ();
		}
		return $result1;
	}
	

	public function updateUser() {
		$this->db->Fields ( array (
				"playing" => "Y" 
		) );
		$this->db->From ( "user" );
		$this->db->Where ( array (
				"username" => $_SESSION ['username'] 
		) );
		$result = $this->db->Update ();
		return $result;
	}

	public function userScoreTable() {
		$this->db->Fields ( array ("table_name") );
		$this->db->From ( "information_schema.tables" );
		$this->db->Where ( array ("table_schema" => "rvcsgame" , "table_name" =>$_SESSION ['user1'][0].$_SESSION ['user2'][0].$_SESSION ['user3'][0].$_SESSION ['user4'][0]."score" ) );
		$this->db->Select ();
		//$this ->db->Limit("4");
		$result = $this->db->resultArray ();
		if(empty($result))
		{
			$this->db->Create ("create table ".$_SESSION ['user1'][0].$_SESSION ['user2'][0].$_SESSION ['user3'][0].$_SESSION ['user4'][0]. "score (id int primary key auto_increment ," . $_SESSION ['user1'] . " int ," . $_SESSION ['user2'] . " int ,". $_SESSION ['user3'] . " int ," .$_SESSION ['user4'] . " int )");

			$this->db->Create ("create table ".$_SESSION ['user1'][0].$_SESSION ['user2'][0].$_SESSION ['user3'][0].$_SESSION ['user4'][0]. "message (id int primary key auto_increment , user varchar(40) ,message varchar(200) ,status char )");
		}
		
		}


	public function logOut() {
		$this->db->Fields ( array (
				"loggedin" => "N" , "playing"=>"N"
		) );
		$this->db->From ( "user" );
		$this->db->Where ( array (
				"username" => $_SESSION ['username'] 
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
		$this->db->From ( "user where loggedin='Y' and playing <> 'Y'");
		$this->db->Select ();
		$this ->db->Limit("4");
		$result = $this->db->resultArray ();
		
		
		
		return (count($result));
	}

	public function getnewMessage() {
		$this->db->Fields ( array ("message","user") );
		$this->db->From ($_SESSION ['user1'][0].$_SESSION ['user2'][0].$_SESSION ['user3'][0].$_SESSION ['user4'][0]."message");
		$this->db->Where ( array ("status" => "n" ));
		$this->db->Select ();
		//$this ->db->Limit("4");
		$result = $this->db->resultArray ();
		return ($result);
	}
	
	public function fetchPlayingUser() {
		$this->db->Fields ( array ("username") );
		$this->db->From ("user");
		$this->db->Where ( array ("loggedin" => "Y" , "playing" => "Y" ));
		$this->db->Select ();
		$this ->db->Limit("4");
		$result = $this->db->resultArray ();
		for($i =0 ; $i < count($result) ; $i ++)
		{
			$_SESSION["user".$this->j] = $result[$i]['username'];
				$this->j ++;
		}
		return ($result);
	}
	
}


?>
