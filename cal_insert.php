<?php
include "dbconnect.php";

?>

<!DOCTYPE html>
<html>
<head>
<link href="style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
<link href="calculate.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8" name="viewport" content="width=device-width">
<title>Cal Inserting</title>
<script src="jquery-3.6.4.min.js?<?php echo time(); ?>" type="text/javascript"></script>
<script src="box_script.js?<?php echo time(); ?>" type="text/javascript"></script>
<style>
tr{
    height:60px;
}
</style>    
</head>
<body direction="ltr">

<header style="text-align: center; color: wheat; font-weight: bold; font-size:2em;position: inherit;top: 0;width: 100%;
        box-shadow: 5px 10px 20px #720661 inset;">Halima Company</header>
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
    <form action="calculate.php" method="post">
             <input type="submit" name="enter_cal" value="Calculator's">
             <hr>
    </form>
                
        
</nav>
</body>
</html>

<?php
  // File upload path
 // error_reporting(0);

 if(isset($_POST['submit_cal'])){ 

    $cal_date = $_POST['cal_date']; $cal_incoming = $_POST['cal_incoming'];
    $cal_outgoing= $_POST['cal_outgoing'];$cal_report = $_POST['cal_report'];
    $cal_notes = $_POST['cal_notes']; $cal_boxID= $_POST['cal_boxID'];
    $cal_unitID = $_POST['cal_unitID']; 
    
 //add spending value to boxs
if(!empty($cal_boxID) || $cal_boxID !== ""){

    $pre_spend_val="SELECT `spending` FROM `sheet_boxs` WHERE `B_ID`='$cal_boxID'";
    $sell_spend_val="SELECT `spending` FROM `box_selling` WHERE `B_ID`='$cal_boxID'";

    $result1 = mysqli_query($conn, $pre_spend_val);
    $result2 = mysqli_query($conn, $sell_spend_val);

    if(mysqli_num_rows($result1) > 0){
    while ($row = mysqli_fetch_assoc($result1)) { 
      $pre_spend=$row['spending']; 
    }
      $add_spend = "UPDATE `sheet_boxs` SET `spending` =($pre_spend + $cal_outgoing) where `B_ID`='$cal_boxID'";
      if ($conn->query($add_spend) === TRUE) {
        echo"
        <script type=\"text/javascript\">
        alert('New spendding to ".$cal_boxID." Added successfully');
        </script> 
        ";
      } else {
        
        echo "Error: " . $add_spend . "<br>" . $conn->error;
      }

    }else if(mysqli_num_rows($result2) > 0){
      while ($row = mysqli_fetch_assoc($result2)) { 
        $sell_spend=$row['spending']; 
      }
        $add_spend = "UPDATE `box_selling` SET `spending` =($sell_spend + $cal_outgoing) where `B_ID`='$cal_boxID'";
    

      if ($conn->query($add_spend) === TRUE) {
          echo"
          <script type=\"text/javascript\">
          alert('New spendding to ".$cal_boxID." Added successfully');
          </script> 
          ";
        } else {
          
          echo "Error: " . $add_spend . "<br>" . $conn->error;
        }
      }
    }

//add spending value to units
else if(!empty($cal_unitID)){
    $pre_spend_val="SELECT `spending` FROM `sheet_units` WHERE `U_ID`='$cal_unitID'";
    $result = mysqli_query($conn, $pre_spend_val);
    while ($row = mysqli_fetch_assoc($result)) { 
      $pre_spend=$row['spending']; 
  }
      $add_spend = "UPDATE `sheet_units` SET `spending` =($pre_spend + $cal_outgoing) where `U_ID`='$cal_unitID'";
  
      if ($conn->query($add_spend) === TRUE) {
          echo"
          <script type=\"text/javascript\">
          alert('New spendding to ".$cal_unitID." Added successfully');
          </script> 
          ";
        } else {
          
          echo "Error: " . $add_spend . "<br>" . $conn->error;
        }
}

  $pre_still_val="SELECT `still` FROM `calculate` WHERE `id` IN (SELECT MAX(`id`) FROM `calculate`)";
  $result = mysqli_query($conn, $pre_still_val);
  while ($row = mysqli_fetch_assoc($result)) { 
    $pre_still=$row['still']; 
}  

  $add_cal = "INSERT INTO `calculate` (`date`,`incoming`,`outgoing`,`report`,`notes`,`B_ID`,`U_ID`,`still`) 
              VALUES ('".$cal_date."',".$cal_incoming.",".$cal_outgoing.",'".$cal_report."','".$cal_notes."'
              ,'".$cal_boxID."','".$cal_unitID."',".($pre_still+$cal_incoming-$cal_outgoing).") ";
      
  if ($conn->query($add_cal) === TRUE) {
    echo"
    <script type=\"text/javascript\">
    alert('New Calculation Added successfully');
    </script> 
    ";
  } else {
    
    echo "Error: " . $add_cal . "<br>" . $conn->error;
  }  
  $conn->close(); 

 }
 

/*   $pre_still_val="SELECT `still` FROM `calculate` WHERE `id` IN (SELECT MAX(`id`) FROM `calculate`)";
  $result = mysqli_query($conn, $pre_still_val);
  while ($row = mysqli_fetch_assoc($result)) { 
    $pre_still=$row['still']; 
}
  
  $oldest_id_val="SELECT MAX(`id`) FROM `calculate` WHERE `date` ='$cal_date'";
  $oldest_result = mysqli_query($conn, $oldest_id_val);
  while ($row3 = mysqli_fetch_assoc($oldest_result)) { 
    $get_oldest_id=$row3['MAX(`id`)'];
  }
  
  $max_id_val="SELECT MAX(`id`) , `still` FROM `calculate`";
  $max_result = mysqli_query($conn, $max_id_val);
  while ($row1 = mysqli_fetch_assoc($max_result)) { 
    $max_id=$row1['MAX(`id`)'];
    $still_val=$row1['still'];
  } 

  for($i=$get_oldest_id; $i<=$max_id; $i++){
    $update_pre_still = "UPDATE `calculate` SET `id`=$get_oldest_id+1 , `still`=($pre_still + $cal_incoming - $cal_outgoing) ";
  }

  $add_cal = "INSERT INTO `calculate` (`date`,`incoming`,`outgoing`,`report`,`notes`,`B_ID`,`U_ID`,`still`) 
  VALUES ('".$cal_date."',".$cal_incoming.",".$cal_outgoing.",'".$cal_report."','".$cal_notes."'
  ,'".$cal_boxID."','".$cal_unitID."',".($pre_still+$cal_incoming-$cal_outgoing).") ";

  if ($conn->query($add_cal) && $conn->query($update_pre_still) === TRUE) {
    echo"
    <script type=\"text/javascript\">
    alert('New Calculation Added successfully');
    </script> 
    ";
  } else {
    
    echo "Error: " . $add_cal . "<br>" . $conn->error;
  } */

?>