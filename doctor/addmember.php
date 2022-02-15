<?php
   $msg = "";

   if (isset($_POST['submit'])) {

	   foreach($_POST as $key =>$value) {
			$$key=$value;
		}

		//convert date into MYSQL date
		$phpdate = strtotime($mydate);
		$mysqldate = date('Y-m-d', $phpdate);

		//convert time into MYSQL time
		$phptime = strtotime($mytime);
		$mysqltime = date('H:i:s', $phptime);

		require ("dbinfo.php");
		// Create connection
		$conn = mysqli_connect($Host, $User, $Password, $DBName);
		// Check connection
		if (!$conn) {
			 die("Connection failed: " . mysqli_connect_error());
		}

		//values
		// $rowid = "0";
		// $clientid = "1";

		//escape variables for security
		$fname = mysqli_real_escape_string($conn, $fname);
		$sname = mysqli_real_escape_string($conn, $sname);
		$age = mysqli_real_escape_string($conn, $age);
		$gender = mysqli_real_escape_string($conn, $gender);
		$weight = mysqli_real_escape_string($conn, $weight);
		$relation = mysqli_real_escape_string($conn, $relation);
		$district = mysqli_real_escape_string($conn, $district);
		$phonenumber = mysqli_real_escape_string($conn, $phonenumber);
		$email = mysqli_real_escape_string($conn, $email);

		$Tablename = "register";
		$sql = "INSERT INTO $Tablename (FirstName, SecondName, Age, Gender, Weight, Relation, District, PhoneNumber, Email) VALUES ('$fname', '$sname', '$age', '$gender', '$weight', 'relation', '$district', '$phonenumber', '$email');";

		if (mysqli_query($conn, $sql)) {
			$msg = "You have added a new data into the database";
		} else {
			$msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
        header('Location: managemember.php');
	}
    
?>
<!-- <pre>Successfully Registered</pre> -->