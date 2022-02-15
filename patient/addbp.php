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
		$mysqldate = mysqli_real_escape_string($conn, $mysqldate);
		$mysqltime = mysqli_real_escape_string($conn, $mysqltime);
		$client = mysqli_real_escape_string($conn, $client);
		$systolic = mysqli_real_escape_string($conn, $systolic);
		$diastolic = mysqli_real_escape_string($conn, $diastolic);
		$pulse = mysqli_real_escape_string($conn, $pulse);
		$notes = mysqli_real_escape_string($conn, $notes);

		$Tablename = "records";
		$sql = "INSERT INTO $Tablename (Client, Date, Time, Systolic, Diastolic, Pulse, Notes) VALUES ('$client', '$mysqldate', '$mysqltime', '$systolic', '$diastolic', '$pulse', '$notes');";

		if (mysqli_query($conn, $sql)) {
			$msg = "Your Blood Pressure data was entered into the database";
		} else {
			$msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
        header('Location: historybp.php');
	}
    
?>
<!-- <pre>Successfully Registered</pre> -->