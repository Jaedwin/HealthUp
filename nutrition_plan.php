<?php
    include_once 'header.php';
?>

<section class ="main-container">
    <div class="main-wrapper">
        <?php
            if(isset($_SESSION['u_uid'])){
				$firstname = $_SESSION['u_first'];
				echo "<h2>$firstname's Nutrition Plans</h2>";
				echo '<select name="routine_nutrition" class="ddList">
					   <option value="">Please Select a Plan</option>
					   <option class="lt" value="--">none</option>
					   <option class="lt" value="AL">Alabama</option>
					   </select>';
            }
            else{
				header("Location: index.php?error=notloggedin");
                //echo '<h2>Please Login</h2>';
            }
        ?>
    </div>
</section>

<?php
    include_once 'footer.php';
?>