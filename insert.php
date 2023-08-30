<?php
include "dbconnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" name="viewport" content="width=device-width">
        <link href="style.css?<?php echo time(); ?>" rel="stylesheet" >
        <script src="jquery-3.6.4.min.js?<?php echo time(); ?>" type="text/javascript"></script>
        <title>Employee</title>
        
    </head>
    <body>
        <script type="text/javascript">
             
            </script>
        <header style="text-align: center; color: wheat; font-weight: bolder;">آل حليمه</header>
        <nav>
            <form action="attendance.php" method="post">
             <input type="submit" value="Attendance">
             <hr>
             </form>
             <form action="home.php" method="post">
             <input type="submit" value="Home">
             <hr>
            </form>
            <form action="boxs.php" method="post">
             <input type="submit" value="Box">
             <hr>
            </form>
            <form>
             <input type="submit" value="">
             <hr>
            </form>
        </nav>
        <?php
    
        ?>
    </body>
</html>
<?php

 if(isset($_POST['submit_attende'])){
  $ID = $_POST['ID'];
  $monthly = $_POST['monthly'];
  $weekly = $_POST['weekly'];
  $daily = $_POST['daily'];
  $piece = $_POST['piece'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $bonus = $_POST['bonus'];
  $evening = $_POST['evening'];
  $discount = $_POST['discount'];
  $borrow = $_POST['borrow'];
  if (isset($_POST['attende']) || isset($_POST['day'])){
   $name= $_POST['attende'];
   $day= $_POST['day'];
  }else {
   $name= 0;
   $day=0;
  }

  $query2 = /* "SELECT SUM(`total_salary`) FROM `employee` where `E_ID`=$ID" */
  "SELECT `total_salary` FROM `employee` WHERE `E_ID`=$ID ORDER BY `date` DESC LIMIT 1"; 
  $result = mysqli_query($conn, $query2); 
   
  while ($row = mysqli_fetch_assoc($result)) { 
       $sum_pre=$row['total_salary']; 
  }

  if($ID == 7){
    $total_salary =( (($_POST['monthly'])/30 ) + ( ($_POST['weekly'])/7 ) +  ($_POST['daily'])  + ($_POST['piece']) 
    + ($_POST['bonus']) + ($_POST['evening'])  - ( ($_POST['discount'])
    - ($_POST['borrow']) )   ) + $sum_pre ;
  }else{
  //equation to calculate total salary to insert into databas
  $total_salary =( (($_POST['monthly'])/30 ) + ( ($_POST['weekly'])/6 ) +  ($_POST['daily'])  + ($_POST['piece']) 
  + ($_POST['bonus']) + ($_POST['evening'])  - ( ($_POST['discount'])
  - ($_POST['borrow']) )   ) + $sum_pre ;
  }
 
      $query = "INSERT INTO employee (`E_ID`,`day`,`name`,`date`,`date_time`,`monthly`,`weekly`,`daily`
                ,`piece`,`bonus`,`evening`,`discount`,`borrow`,`total_salary`)
                VALUES(".$ID.",'".$day."', '".$name."', '".$date."', '".$time."' , ".$monthly." , ".$weekly." , ".$daily." , ".$piece."
                , ".$bonus." , ".$evening." , ".$discount." , ".$borrow.", ".$total_salary.")";
      //$zero_previous = "UPDATE `employee` SET `total_salary`=0 where `E_ID`=$ID AND `date` !='$date'";
     // $result = $conn->query($query);
      if ($conn->query($query) /* && $conn->query($zero_previous) */  === TRUE) {
        
        echo"
          <script type=\"text/javascript\">
          alert('New Record Created successfully');
          </script> 
          ";
      } else {
        
        echo "Error: " . $query . "<br>" . $zero_previous . "<br>" . $conn->error;
      }
      
      $conn->close(); 
  }
 
// for Bonus calculate....
if(isset($_POST['submit_bonus'])){
  $bonus_register = $_POST['bonus_register'];
  $evening_register = $_POST['evening_register'];
  $bonus_ID=$_POST['bonus_ID'];
  $bonus_date=$_POST['bonus_date'];

  $pre_total="SELECT `total_salary` FROM `employee` where `E_ID`=$bonus_ID AND `date`='$bonus_date'";
    $result1 = mysqli_query($conn, $pre_total);
    while ($row = mysqli_fetch_assoc($result1)) { 
      $pre_total_salary=$row['total_salary']; 
    }
  $bonus_query = "UPDATE `employee` SET `bonus`=$bonus_register , `evening`=$evening_register 
              ,`total_salary`= $evening_register+$bonus_register+ $pre_total_salary where `E_ID`=$bonus_ID AND `date`='$bonus_date'";

    // to calculate the last total salary
  $query2 = "SELECT `total_salary` FROM `employee` WHERE `E_ID`=$bonus_ID ORDER BY `date` DESC LIMIT 1"; 
    $result = mysqli_query($conn, $query2); 
    while ($row = mysqli_fetch_assoc($result)) { 
         $sum_pre=$row['total_salary']; 
    }
  $all_bonus_query = "UPDATE `employee` SET`total_salary`= $evening_register + $bonus_register + $sum_pre 
  where `E_ID`=$bonus_ID ORDER BY `date` DESC LIMIT 1";

if ($conn->query($bonus_query) && $conn->query($all_bonus_query) === TRUE) {
  
  echo"
          <script type=\"text/javascript\">
          alert('New Bonus Record Created successfully');
          </script> 
          ";
} else {
  echo "Error: " . $all_bonus_query . "<br>" . $bonus_query . "<br>" . $conn->error;
}

$conn->close(); 
}
// for Discount calculate....
if(isset($_POST['submit_discount'])){
$discount_register = $_POST['discount_register'];
$borrow_register = $_POST['borrow_register'];
$discount_ID=$_POST['discount_ID'];
$discount_date=$_POST['discount_date'];

$pre_total="SELECT `total_salary` FROM `employee` where `E_ID`=$discount_ID AND `date`='$discount_date'";
    $result1 = mysqli_query($conn, $pre_total);
    while ($row = mysqli_fetch_assoc($result1)) { 
      $pre_total_salary=$row['total_salary']; 
    }

$discount_query = "UPDATE `employee` SET `discount`=$discount_register , `borrow`=$borrow_register , 
`total_salary`= $pre_total_salary -$discount_register-$borrow_register where `E_ID`=$discount_ID AND `date`='$discount_date' ";

  // to calculate the last total salary
  $query2 = "SELECT `total_salary` FROM `employee` WHERE `E_ID`=$discount_ID ORDER BY `date` DESC LIMIT 1"; 
  $result = mysqli_query($conn, $query2); 
  while ($row = mysqli_fetch_assoc($result)) { 
        $sum_pre=$row['total_salary']; 
  }
  $all_discount_query = "UPDATE `employee` SET`total_salary`= $sum_pre - $discount_register - $borrow_register 
  where `E_ID`=$discount_ID ORDER BY `date` DESC LIMIT 1";


if ($conn->query($discount_query) && $conn->query($all_discount_query) === TRUE) {

  echo"
  <script type=\"text/javascript\">
  alert('New Discount Record Created successfully');
  </script> 
  ";
} else {
echo "Error: " . $discount_query . "<br>" . $all_discount_query . "<br>" . $conn->error;
}

$conn->close(); 
}

//for receiving salary
if(isset($_POST['submit_receive_salary'])){

  $receive_salary_money = $_POST['receive_salary_money'];
  $receive_salary_ID=$_POST['receive_salary_ID'];
  $receive_salary_date=$_POST['receive_salary_date'];
  


  $receive_salary = "UPDATE `employee` SET `receive_salary`=$receive_salary_money ,`total_salary`= (`total_salary`) - $receive_salary_money
   where `E_ID`=$receive_salary_ID AND `date`='$receive_salary_date' ";
  
  if ($conn->query($receive_salary) === TRUE) {
  
    echo"
  <script type=\"text/javascript\">
  alert('Recieve Salary Record Created successfully');
  </script> 
  ";
  } else {
  echo "Error: " . $receive_salary . "<br>" . $conn->error;
  }
  
  $conn->close(); 
  }
?>

