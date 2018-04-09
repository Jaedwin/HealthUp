<?php
    include_once 'header.php';
	include_once 'includes/dbh.inc.php'
?>

<section class ="main-container">
    <div class="main-wrapper">
        <?php
            if(isset($_SESSION['u_uid'])){
				$id = $_SESSION['u_id'];
				$sql = "SELECT * FROM user WHERE id = $id";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");
				
                $row = mysqli_fetch_assoc($result);
				// ID, Age, Email, Firstname, Lastname, Username, Password, CurrentWeight, GoalWeight, Height, BodyFat //
				$age = $row['Age'];
				$firstname = $row['Firstname'];
				$lastname = $row['Lastname'];
				$currweight = $row['CurrentWeight'];
				$goalweight = $row['GoalWeight'];
				$height = $row['Height'];
				
				//BMI calculation//
				$weightInKg = $currweight/2.2;
				$heightInM = $height/100;
				
				$bmi = $weightInKg/($heightInM*$heightInM); 
				$bmi = number_format((float)$bmi, 2, '.', '');
				if($bmi <= 18.4){
					$bmiStat = "low -- gain weight";
				} else if ($bmi > 25.5){
					$bmiStat = "high -- reduce weight";
				} else {
					$bmiStat = "normal -- maintain weight";
				}
				echo "<h2>Welcome $firstname $lastname!</h2>";
					
				echo "<table border='1'>";
				echo "<tr><td>Age</td><td>Height</td><td>Current Weight</td><td>Goal Weight</td><td>BMI</td><td>BMI Status</td></tr>";
				echo "<tr><td>$age</td><td>$height</td><td>$currweight</td><td>$goalweight</td><td>$bmi</td><td>$bmiStat</td></tr>";
				echo "</table>";
				//Update buttons//
				echo '<form action="includes/update_weight.inc.php" method="post">
					<input type ="text" name ="new_cweight" placeholder="New current weight">
					<button type ="submit" name ="updateCurrWeight">Update Current Weight</button>
					</form>';
				echo '<form action="includes/update_weight.inc.php" method="POST">
					<input type ="text" name ="new_gweight" placeholder="New goal weight">
					<button type ="submit" name="updateGoalWeight">Update Goal Weight</button>
					</form>';
				echo '<form action="includes/update_weight.inc.php" method="POST">
					<input type ="text" name ="new_age" placeholder="New Age">
					<button type ="submit" name="updateAge">Update Age</button>	
					</form>';
					
				// Checking if user is client //
				$sql = "SELECT * FROM client WHERE UserId = $id";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");
				$resultCheck = mysqli_num_rows($result);
				
				if ($resultCheck > 0){
                echo "<h2>Client Information:</h2>";
				echo "<table border='1'>";
				echo "<tr><td>Availability</td><td>Gym</td><td>Address</td></tr>";
				while($row = mysqli_fetch_assoc($result)){
					$avail = $row['Availability'];
					$gym = $row['Address'];
					echo "<tr><td>$avail</td><td></td><td>$gym</td></tr>";
					}
				echo "</table>";
				}
            }else{
                echo '<h2>Please Login or Signup</h2>';
            }
        ?>
    </div>
</section>

<?php
    include_once 'footer.php';
?>