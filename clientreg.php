<?php
    include_once 'header.php';
?>

<section class ="main-container">
    <div class="main-wrapper">
		<form class="clientreg-form" action="includes/clientreg.inc.php" method="POST">
		<h2>Client Information</h2>
		<input type ="text" name ="phone" placeholder="Phone Number">
		<input type ="text" name ="address" placeholder="Address">
		<input type ="text" name ="availability" placeholder="Availability">
		<button type ="submit" name="submit">Register</button>
		</form> 
    </div>
</section>

<?php
    include_once 'footer.php';
?>