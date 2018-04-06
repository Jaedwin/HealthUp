<?php
    include_once 'header.php';
?>

<section class ="main-container">
    <div class="main-wrapper">
		<form class="clientreg-form" action="includes/employeeupdate.inc.php" method="POST">
		<h2>Update Employee Information</h2>
		<input type ="text" name ="SIN" placeholder="SIN">
		<input type ="text" name ="wage" placeholder="Wage">
		<input type ="text" name ="address" placeholder="Address">
		<input type ="text" name ="phone" placeholder="Phone">
		<input type ="text" name ="schedule" placeholder="Schedule">
		<button type ="submit" name="submit">Update</button>
		</form> 
    </div>
</section>

<?php
    include_once 'footer.php';
?>