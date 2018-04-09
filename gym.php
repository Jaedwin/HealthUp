<?php
    include_once 'header.php';
?>

<section class ="main-container">
    <div class="main-wrapper">
		<form class="clientreg-form" action="includes/gym.inc.php" method="POST">
		
		<h2>Remove Gym</h2>
		<input type ="text" name ="location2" placeholder="Location">
		<input type ="text" name ="sin" placeholder="SIN">
		<button type ="submit" name="remove">Remove</button>
		
		<h2>Update Gym</h2>
		<input type ="text" name ="location3" placeholder="Current Location">
		<input type ="text" name ="location4" placeholder="Updated Location">
		<input type ="text" name ="name2" placeholder="Name">
		<input type ="text" name ="status2" placeholder="Status">
		<input type ="text" name ="totalmembers2" placeholder="Total Members">
		<input type ="text" name ="livecount2" placeholder="Live Count">
		<input type ="text" name ="capacity2" placeholder="Capacity">
		<input type ="text" name ="sin2" placeholder="SIN">
		<button type ="submit" name="update">Update</button>
		
		</form> 
    </div>
</section>

<?php
    include_once 'footer.php';
?>