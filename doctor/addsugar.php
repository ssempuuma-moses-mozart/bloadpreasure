<?php

    require ("../doctor/dbinfo.php");
    // Create connection
    $conn = mysqli_connect($Host, $User, $Password, $DBName);
    // Check connection
    if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
         mysqli_query($conn, "SET names UTF8");
    }


    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
     
    // Escape user inputs for security
    $client  = mysqli_real_escape_string($conn, $_REQUEST['client']);
    $relation = mysqli_real_escape_string($conn, $_REQUEST['relation']);
    $sugartesting = mysqli_real_escape_string($conn, $_REQUEST['sugartesting']);
    $bloodsugar = mysqli_real_escape_string($conn, $_REQUEST['bloodsugar']);

		
     
    // Attempt insert query execution
    
    $sql = "INSERT INTO sugar (Client, Relation, Sugar_Testing, Blood_Sugar) VALUES ('$client', '$relation', '$sugartesting','$bloodsugar')";

    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
        header("location: addsugardetails.html");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);
    ?>














