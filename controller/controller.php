<?php
require_once getcwd()."/../libraries/constant.php";
//echo SITE_URL;die;
require_once getcwd().'/../libraries/validate.php';

ini_set("display_errors", "1");

$route = array();

class MyClass 
{
	public function handleLogin() 
	{
//echo "hrflkjs";die;

        
        /* Validate username password */
		$obj = new validate();
		$obj->validator("username",$_POST ["username"], 'required#username#maxlength=25','Username Required# Username is not valid#Username should not be more than 25 chracter long');
		$obj->validator("password",$_POST ["password"], 'required#minlength=5#maxlength=25','Password Required#Password should not be less than 5 characters long#Password should not be more than 25 chracter long');
        //$authObject->validateLogin ();
    		$error=$obj->result();
		//print_r($error);
		if(!empty($error['username']))
		{			
			header("Location:../View/comment.php?user=".$error['username']);
		}
		else if(!empty($error['password']))
		{
			header("Location:../View/comment.php?password=".$error['password']);
		}
		else
		{
			require_once SITE_PATH.'/../model/gettersettermodel.php';
        		/* Getting rid of sql injection */
			$objInitiateUser = new Register ();
			$objInitiateUser->setUsername($_POST['username']);
			$objInitiateUser->setPassword($_POST['password']);
        		
        	$a=$objInitiateUser->login () ;
        	if ($a == 1) 
			{
				$b=$objInitiateUser->updateLogged () ;
				//print_r($a);die;
            	$this->showUserPanel();
        	}
        	else 
			{
            	require_once(SITE_PATH);
        	}
		}
    }
    
    /* -----------------------------------------------------
         Function to add FAQ called from faq.php
       -----------------------------------------------------
    */
    public function loggedinCount ()
	{	
			
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$b=$objInitiateUser->loggedinCount () ;
		print_r($b);
		
	}
	
	public function assignUserspace ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$b=$objInitiateUser->assignUserSpace () ;
	}

	public function insertMessage ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$objInitiateUser->setMessage($_REQUEST['message']);
		$b=$objInitiateUser->insertMessage () ;
		print_r($b);
	}
	
	public function fetchPlayingUser ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$b=$objInitiateUser->fetchPlayingUser () ;
		
		if(count($b) == 4)
		$objInitiateUser->userScoreTable () ;
		require_once SITE_PATH.'/../View/try.php';
		
		
	}
	
	public function turnRandom ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$objInitiateUser->setRandom1($_REQUEST['r1']);
		$objInitiateUser->turnRandom () ;
		
	}
	
	public function insertslipRandom ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$objInitiateUser->setRandom2($_REQUEST['r2']);
		$objInitiateUser->slipRandom();
		$objInitiateUser->turnRandom () ;
	
	}
	
	public function fetchturnRandom ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$b = $objInitiateUser->fetchturnRandom () ;
	
	}
	
	public function fetchslipRandom ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$b = $objInitiateUser->fetchslipRandom () ;
		$b =str_replace(',', '', $b);
		die($b);
		
	
	}

	public function getMessage ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$b=$objInitiateUser->getnewMessage () ;
		if(!empty($b))
		{
			for($i = 0 ; $i < count($b) ;$i ++)
			{
				$arr[] = $b[$i]["user"];
				$arr[] = $b[$i]["message"];
			}
		}
		echo json_encode($arr);
	}
	
	public function gameSet ()
	{
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$b=$objInitiateUser->updateUser () ;
		print_r($b);die;
		
	}
	public function logout ()
	{	
		require_once SITE_PATH.'/../model/gettersettermodel.php';
		$objInitiateUser = new Register ();
		$b=$objInitiateUser->logOut () ;
		if($b == "1")
		{
			header("Location:".SITE_URL);
		}
	}
	
	public function showUserPanel ()
	{
		
		require_once("../View/playgame.php");
	}
	


}


$request = "";
if (isset($_GET["method"])) {

    $request = $_GET["method"];
}

$obj = new MyClass();

if (!empty($request)) {
    $obj->$request();
}

?>
