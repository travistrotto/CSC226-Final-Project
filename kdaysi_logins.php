<?php

/**
 * AUTHOR: Travis Trotto
 * 02/28/2020
 */

//LEGAL ACCESS: verify credentials for access to process_data.php file
if(!isset($_REQUEST['user'])||!isset($_REQUEST['pwd'])){
	//ILLEGAL ACCESS: if you try to access DIRECTLY
	header("Location: login.html");
}

//GET USERNAME,PASSWORD FROM user<-text, pwd<-text
$username=$_REQUEST['user'];
$password=$_REQUEST['pwd'];

//DATABASE
$logins=array(	"admin"=>"admin1",
				"ttrotto"=>"1998");
/**
 *  CASE 1: 
 *	REGISTER BUTTON - Check if username is taken, Welcomes user
 */
if ($_REQUEST['submit']=='register'){
	//compare username->logins KEYs
	if(array_key_exists($username,$logins)){
		echo ("THAT USERNAME IS TAKEN.");
		exit(0); //end program
	}
	else{ // Username is not taken => Register user
		array_push($logins,$logins[$username]=$password);
		echo ("SUCCESS! Welcome, ".$username."!");
		exit(0);  //end program
	}
}
/**
 *  CASE 2:
 * 	SUBMIT BUTTON - Verify credentials
 */
//make all logins keys & values as x & x_value
foreach($logins as $x => $x_value){ 	
	//if submitted username & password matches x & x_value
	if($x==$username && $x_value==$password){	
		echo ("Welcome back, ".$username."!");

		echo '<a href="Cart2.php"> Click here to return to all products </a>';
		exit(0); //end program
	}
}
/**
 *  CASE 3:
 * 	WRONG INFORMATION VIA SUBMIT
 */
echo ("ERROR! User does not exist!");

?>
