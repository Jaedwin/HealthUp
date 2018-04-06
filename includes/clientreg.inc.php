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
        header("Location: ../clientreg.php?clientreg=empty");
        exit();
    } 
	else {
		$sid = $_SESSION['u_id'];
		$sql = "SELECT * FROM client WHERE userid = $sid";
		$result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
                
        if($resultCheck > 0){
			header("Location: ../clientreg.php?clientreg=alreadyregistered");
			exit();
		} else {
				//Insert the user into the database
				$sql = "INSERT INTO client(userid, phone, address, availability) VALUES ('$sid', '$phone','$address','$availability');"; 
				mysqli_query($conn, $sql);
				header("Location: ../clientreg.php?clientreg=success");
				exit();
			}
		}
	}
else {
    header("Location: ../clientreg.php");
    exit();
}