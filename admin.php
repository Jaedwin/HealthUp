<?php
    include_once 'header.php';
	include_once 'includes/dbh.inc.php'
?>

<section class ="main-container">
    <div class="main-wrapper">
        <?php
            if(isset($_SESSION['u_id'])){
            $id = $_SESSION['u_id'];
            if($id == 0){
                // GYM's
                $sql = "SELECT * FROM gym";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");
				echo "<h2>Admin Panel</h2>";
                echo "<h2>Gyms</h2>";
                
                echo '<form id="form" action="" method="post">';
                echo '<select name="gyms" class="ddList">';
                echo "<option value='default'>Please Select a Gym</option>";
                while($row = mysqli_fetch_assoc($result)){
                    $rowname = $row['Name'];
                    echo "<option value='$rowname'>" . $rowname . "</option>";
                }
                echo '</select>';
                echo '<input type="submit" value="Delete">';
                echo '</form>';    
                $value = $_POST['gyms'];
                
                $sql = "DELETE FROM gym WHERE Name = '$value'";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");

                // FOOD's
                $sql = "SELECT * FROM food";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");
                echo "<h2>Foods</h2>";
                
                echo '<form id="form" action="" method="post">';
                echo '<select name="foods" class="ddList">';
                echo "<option value='default'>Please Select a Food</option>";
                while($row = mysqli_fetch_assoc($result)){
                    $rowname = $row['Name'];
                    echo "<option value='$rowname'>" . $rowname . "</option>";
                }
                echo '</select>';
                echo '<input type="submit" value="Delete">';
                echo '</form>';    
                $value = $_POST['foods'];
                
                $sql = "DELETE FROM food WHERE Name = '$value'";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");

                
                // EXCERCISES's
                $sql = "SELECT * FROM exercise";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");
                echo "<h2>Excercises</h2>";
                
                echo '<form id="form" action="" method="post">';
                echo '<select name="exercises" class="ddList">';
                echo "<option value='default'>Please Select an Exercise</option>";
                while($row = mysqli_fetch_assoc($result)){
                    $rowname = $row['Name'];
                    echo "<option value='$rowname'>" . $rowname . "</option>";
                }
                echo '</select>';
                echo '<input type="submit" value="Delete">';
                echo '</form>';    
                $value = $_POST['exercises'];
                
                $sql = "DELETE FROM exercise WHERE Name = '$value'";
                $result = mysqli_query($conn,$sql) or die("Bad Query: $sql");
            }else{
                header("Location: index.php");
                exit();  
            }
            }else{
                header("Location: index.php");
                exit();  
            }
        ?>
    </div>
</section>

<?php
    include_once 'footer.php';
?>