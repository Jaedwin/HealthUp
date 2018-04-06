<?php

session_start();

if (isset($_POST['submit'])) {
    
    include_once 'dbh.inc.php';
	
    $SIN = mysqli_real_escape_string($conn, $_POST['SIN']);
    $wage = mysqli_real_escape_string($conn, $_POST['wage']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$schedule = mysqli_real_escape_string($conn, $_POST['schedule']);
    
    //Error handlers
    //Check for empty fields
	
	if (empty($SIN) || empty($wage) || empty($address) || empty($phone) || empty($schedule)){
        header("Location: ../employeeupdate.php?employeeupdate=empty");
        exit();
    } 
	else 
	{
			$sid = $_SESSION['u_id'];
			
			//Insert the user into the database
			$sql = "UPDATE employee SET sin = '$SIN', wage = '$wage', address = '$address', phone = '$phone', schedule = '$schedule' WHERE userid = '$sid';"; 
			mysqli_query($conn, $sql);
			header("Location: ../employeeupdate.php?employeeupdate=success");
			exit();
	}
}
else {
    header("Location: ../employeeupdate.php");
    exit();
}