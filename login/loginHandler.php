<?php
	
	// $db_host		= 'localhost';
	// $db_user		= 'root';
	// $db_pass		= 'moses';
	// $db_database	= 'tryproject';

    require ("../doctor/dbinfo.php");
    // Create connection
    $conn = mysqli_connect($Host, $User, $Password, $DBName);
    // Check connection
    if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
         mysqli_query($conn, "SET names UTF8");
    }



    // $link =mysqli_connect($db_host,$db_user,$db_pass,$db_database) or die('Unable to establish a DB connection');
    // mysqli_query($link, "SET names UTF8");
		
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
	
	$query = "select * FROM users where UserName='$username' and Password='$password'" ;
	$result = mysqli_query($conn,$query);
	
	if(!$result) die("Access to the database failed. Try again later".mysqli_error());

    $num_row =mysqli_num_rows($result);
	   
	if($num_row  == 0) 
	{
	 echo "<script>alert('UserName or Password is incorrect')</script>";
	exit();
	}
		
	 $row = mysqli_fetch_assoc($result);
					
	 $usergroup=$row['privilege_id'];
						
	 if($usergroup ==1)
	 {

	 header("location: ../doctor/index.html");
	 }
							
	else if($usergroup ==2)

	 {

		header("location: ../patient-care-taker/index.html");
	 }

	 else if($usergroup ==3)

	 {

		header("location: ../patient/index.html");
	 }
	

	 else
	 {
	 echo "error has occured: you don't have an account";
	}
			
?>
