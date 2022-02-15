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
    $fullname = mysqli_real_escape_string($conn, $_REQUEST['fullname']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $privilege_id = mysqli_real_escape_string($conn, $_REQUEST['title']);
     
    // Attempt insert query execution
    $sql = "INSERT INTO users (UserName, Password, privilege_id) VALUES ('$fullname', '$password','$privilege_id')";
    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
        header("location: login.html");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);
    ?>
