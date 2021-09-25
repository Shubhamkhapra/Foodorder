<?php
	
	//start session
	session_start();

    //create constants to store Non repating values
    $dsn = 'localhost';
    $user = "sk";
    $password = "Devil21@";
    $DB_NAME_MY = "foodorder"; 
    $SITEURl = "http://localhost/food-order/";  
	$conn = mysqli_connect($dsn, $user, $password) ;
	if (mysqli_connect_errno())
		{
			echo "faild to connect to Mysql: ".mysqli_connect_errno();
			exit();
		}

	$db_select = mysqli_select_db($conn, $DB_NAME_MY) or die("Unable to connect query");

?>