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
        header("Location: ../employeereg.php?employeereg=empty");
        exit();
    } 
	else {
		$sid = $_SESSION['u_id'];
		$sql = "SELECT * FROM employee WHERE userid = $sid";
		$result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
                
        if($resultCheck > 0){
			header("Location: ../employeereg.php?employeereg=alreadyregistered");
			exit();
		} else {
				//Insert the user into the database
				$sql = "INSERT INTO employee(sin, userid, wage, address, phone, schedule) VALUES ('$SIN', '$sid', '$wage','$address','$phone', '$schedule');"; 
				mysqli_query($conn, $sql);
				header("Location: ../employeereg.php?employeereg=success");
				exit();
			}
		}
	}
else {
    header("Location: ../employeereg.php");
    exit();
}