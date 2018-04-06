<?php

session_start();

if (isset($_POST['submit'])) {
    
    include_once 'dbh.inc.php';
	
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $availability = mysqli_real_escape_string($conn, $_POST['availability']);
    
    //Error handlers
    //Check for empty fields
	
	if (empty($phone) || empty($address) || empty($availability)){
        header("Location: ../clientupdate.php?clientupdate=empty");
        exit();
    } 
	else {
		$sid = $_SESSION['u_id'];
		
		//Insert the user into the database
		$sql = "UPDATE client SET phone = '$phone', address = '$address', availability = '$availability' WHERE userid = '$sid';"; 
		mysqli_query($conn, $sql);
		header("Location: ../clientupdate.php?clientupdate=success");
		exit();
			
		}
	}
else {
    header("Location: ../clientupdate.php");
    exit();
}