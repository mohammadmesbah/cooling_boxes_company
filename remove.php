<?php
include "dbconnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" name="viewport" content="width=device-width">
        <link href="style.css?<?php echo time(); ?>" rel="stylesheet" >
        <title>Remove</title>
        
    </head>
    <body>
        <script type="text/javascript">
             
            </script>
        <header style="text-align: center; color: wheat; font-weight: bolder;">آل حليمه</header>
        <nav>
            <form action="home.php" method="">
             <input type="submit" value="Home">
             <hr>
             </form>
             <form action="attendance.php" method="">
             <input type="submit" value="Attendance">
             <hr>
            </form>
            
            </form>
             <form action="boxs.php" method="">
             <input type="submit" value="Boxs">
             <hr>
            </form>
        </nav>
        <?php
    
        ?>
    </body>
</html>
<?php

 if(isset($_POST['submit_discount'])){
  $remove_ID = $_POST['remove_ID'];
  $remove_date = $_POST['remove_date'];

 
$query = "DELETE FROM `employee` WHERE `E_ID`=$remove_ID AND `date`='$remove_date'";
 if ($conn->query($query) === TRUE) {
        
    echo "register removed successfully";
  } else {
    
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  
  $conn->close(); 
}
?>

<!-- remove box section -->
<?php
 if(isset($_POST['submit_remove_box'])){
    $box_remove_id = $_POST['box_remove_id'];
  
  echo "<div class='box_sell_view' style='float:left;'>";
  
  $remove_box="DELETE FROM `sheet_boxs` where `B_ID`='$box_remove_id' ";

  if ($conn->query($remove_box)  === TRUE) {
    echo"
    <script type=\"text/javascript\">
    alert('Box Deleted successfully');
    </script> 
    ";
  } else {
    
    echo "Error: " . $remove_box . "<br>" . $conn->error;
  }
  echo "</div>";
  $conn->close(); 
}
?>