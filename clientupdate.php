<?php
    include_once 'header.php';
?>

<section class ="main-container">
    <div class="main-wrapper">
		<form class="clientreg-form" action="includes/clientupdate.inc.php" method="POST">
		<h2>Update Client Information</h2>
		<input type ="text" name ="phone" placeholder="Phone Number">
		<input type ="text" name ="address" placeholder="Address">
		<input type ="text" name ="availability" placeholder="Availability">
		<button type ="submit" name="submit">Update</button>
		</form> 
    </div>
</section>

<?php
    include_once 'footer.php';
?>