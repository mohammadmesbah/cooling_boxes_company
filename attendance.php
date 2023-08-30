<?php
include "dbconnect.php";
?>   
<!DOCTYPE html>
<html lan="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" name="viewport" content="width=device-width">
    <title>Attendance</title>
    <link href="style.css?<?php echo time(); ?>" rel="stylesheet" >
    <link href="attendance.css?<?php echo time(); ?>" rel="stylesheet" >
    <script src="jquery-3.6.4.min.js" type="text/javascript"></script>
    <script src="script.js" type="text/javascript"></script>
<style>

</style>
</head>
<body>
        
<!-- <div style="display:block; text-align:center;" class="address">تسجيل الحضور</div> -->
<header style="text-align: center; color: wheat; font-weight: bold; font-size:2em;
  box-shadow: 5px 10px 20px #720661 inset;">Halima Company</header>

<nav>
<form action="home.php" method="post">
  <input type="submit" value="Home">
  <hr>
</form>
<!-- <form action="attendance.php" method="post"> -->
  <input id="Register_Attende" type="submit" value="Register Attende">
  <hr>
  <!-- </form> -->
  <!-- <form action="#" method="post"> -->
  <input id="bonus" type="submit" value="Bonus Register">
  <hr>

  <input id="discount" type="submit" value="Discount Register">
  <hr>

  <input id="remove" type="submit" value="Remove Attende">
  <hr>

  <input id="receive_salary" type="submit" value="Receive Salary">
  <hr>

</nav>
<!-- main attendance view -->

<div class="choose_date">
  <form action="attendance.php" method="POST" style="margin: -12px;">
  <span>From: </span> <input class="select_date" type="date" name="date_from" >
  <span>To: </span> <input class="select_date" type="date" name="date_to" >
  <input class="submit" type="submit" name="date_result" value="View" 
  style="width:90px; font-size:small; float:none;background-color:#ddf32b;color:rgb(4, 4, 39);">
  </form>
</div>

<br>
<!-- today view attendance -->
<div class="main_view" style="width:max-content; ">
<?php

$sql = "SELECT `E_ID`,`day`,`name`,`date_time`,`total_salary` FROM `employee` where `date`= CURDATE() ORDER BY `date_time` DESC"; 

$result = $conn->query($sql);

echo "<table class='today_view' border='1'>
<tr>
<th> الرقم </th>
<th> اليوم </th>
<th> إسم الموظف </th>
<th> الوقت  </th>
<th> المستحق  </th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
    $total_of_salary=$row['E_ID'];
  echo "<tr>";
  echo "<td>" . $row['E_ID'] . "</td>";
  echo "<td>" . $row['day'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['date_time'] . "</td>";
  echo "<td>" . $row['total_salary'] . "</td>";
  echo "</tr>";
  }

echo "</table>"; 
echo "</div>";
?>
</div>
<!-- end of today view attendance -->

<!-- calculate attendance salary by date -->

<?php
 if(isset($_POST['date_result'])){
  $date_from = $_POST['date_from'];
  $date_to = $_POST['date_to'];

echo "<div class='main_money_view' style='float:left;'>";

$sql1 = "SELECT COUNT(`E_ID`), `name`,`monthly`,`weekly` ,`daily` ,`piece`,SUM(`bonus`),SUM(`discount`),SUM(`borrow`),SUM(`receive_salary`), SUM(`total_salary`)
         FROM `employee` 
         where `date`
         BETWEEN '$date_from' AND '$date_to' GROUP BY `name` ORDER BY COUNT(`E_ID`) DESC"; 

$result1 = $conn->query($sql1);

echo "<table class='money_view' style='' border='1'>
<tr>
<th> عدد أيام الحضور </th>
<th> الإسم </th>
<th> الزياده </th>
<th> الخصم </th>
<th> وصل </th>
<th> استلم القبض </th>
<th> المستحق </th>
</tr>";
while($row = mysqli_fetch_array($result1))
  {
    echo "<tr>";
      echo "<td>" . $row['COUNT(`E_ID`)'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['SUM(`bonus`)'] . "</td>";
      echo "<td>" . $row['SUM(`discount`)'] . "</td>";
      echo "<td>" . $row['SUM(`borrow`)'] . "</td>";
      echo "<td>" . $row['SUM(`receive_salary`)'] . "</td>";
      echo "<td>" . round($row['SUM(`total_salary`)'],2) . "</td>";
    echo "</tr>";
  }

echo "</table>"; 
echo "</div>";

$conn->close(); 
}
?>

<!-- end of main attendance view -->
<div class="info">
    <table>
        <tr>
         <th>الرقم</th> 
         <th>اللإسم</th> 
         <th>الراتب</th>
        </tr>   
        <tr> <td>1</td> <td>عم/ ياسر</td> <td>1400</td> </tr> 
        <tr> <td>2</td> <td>عاطف السعيد</td> <td>1100</td> </tr>
        <tr> <td>3</td> <td>مصطفى</td> <td>700</td> </tr>
        <tr> <td>4</td> <td>أحمد خليل</td> <td>600</td> </tr>
        <tr> <td>6</td> <td>إبراهيم يوسف</td> <td>500</td> </tr>
        <tr> <td>7</td> <td>عم/ السيد</td> <td>600</td> </tr>
        <tr> <td>8</td> <td>السيد عبده</td> </tr>
        <tr> <td>9</td> <td>رمضان</td> </tr>
        <tr> <td>10</td> <td>فارس</td> <td>500</td> </tr>
        <tr> <td>11</td> <td>أحمد صقر</td> <td>3500</td> </tr>
        <tr> <td>12</td> <td>محمد عماد</td> </tr>
       </table>
    </div>
    <?php 
      if(isset($_SESSION['status']))
      {
        echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);
      }  
    ?>
<main id="main">
    
    <form action="insert.php" method="post" style="text-align:left;">
       <label>ID: </label>
       <input style="margin-bottom:10px;width:150px;" type="number" name="ID" placeholder="الرقم..." required>
       
       <br>
       <label for="day">Day :</label>

       <select name="day" id="day" style="margin-bottom:10px;">
         <option value="السبت">السبت</option>
         <option value="الأحد">الأحد</option>
         <option value="الإثنين">الإثنين</option>
         <option value="الثلاثاء">الثلاثاء</option>
         <option value="الأربعاء">الأربعاء</option>
         <option value="الخميس">الخميس</option>
         <option value="الجمعه">الجمعه</option>
       </select>

       <br>
       <label for="names"> Choose Name:</label>

       <select name="attende" id="name">
       <option value="">إختر إسم...</option>
       <option value="عم_ياسر">عم/ ياسر</option>
         <option value="عاطف">عاطف</option>
         <option value="مصطفى">مصطفى</option>
         <option value="أحمد خليل">أحمد خليل</option>
         <option value="إبراهيم يوسف">إبراهيم يوسف</option>
         <option value="عم_السيد">عم/ السيد</option>
         <option value="السيد عبده">السيد عبده</option>
         <option value="رمضان">رمضان</option>
         <option value="صبحى">صبحى</option>
         <option value="فارس">فارس</option>
         <option value="أحمد صقر">أحمد صقر</option>
         <option value="محمد عماد">محمد عماد</option>
       </select>

       <br> <label>Date: </label>
       <input type="date" name="date" required>
       
       <br> <label>Date & Time: </label>
       <input type="datetime-local" name="time">

       <br> <label> Month Salary:  </label>
       <input style="width: 200px;" type="number" name="monthly" placeholder="3500" value="0">
       <br> <label>  Week Salary:  </label>
       <input style="width: 200px;" type="number" name="weekly" placeholder="1400" value="0">
       <br> <label> Day Salary :  </label>
       <input style="width: 200px;" type="number" name="daily" placeholder="100" value="0">
       <br> <label> Piece Salary :  </label>
       <input style="width: 200px;" type="number" name="piece" placeholder="1500" value="0">
       
       <br> <label>Bonus :  </label>
       <input style="width: 200px;" type="number" name="bonus" placeholder="100" value="0">
       <br> <label>Evevning :  </label>
       <input style="width: 200px;" type="number" name="evening" placeholder="100" value="0">
       <br> <label>Discount :  </label>
       <input style="width: 200px;" type="number" name="discount" placeholder="50" value="0">
       <br> <label>borrow :  </label>
       <input style="width: 200px;" type="number" name="borrow" placeholder="100" value="0">
       <br>
       <input class="submit" type="submit" name="submit_attende" value="Register">
    </form>

</main>
<!-- for bonus  -->
<div class="bonus_main">
  <form action="insert.php" method="post">
  <label>ID: </label>
       <input style="margin-bottom:10px;width:150px;" type="number" name="bonus_ID" placeholder="ID..." required>
  <br> <label>Date: </label>
       <input type="date" name="bonus_date" required>
  <br> <label>Bonus :  </label>
       <input style="width: 200px;" type="number" min="0" step="any" name="bonus_register" placeholder="100" value="0">
       <br> <label>Evevning :  </label>
       <input style="width: 200px;" type="number" min="0" step="any" name="evening_register" placeholder="100" value="0">
       <br>
       <input type="submit" name="submit_bonus" value="Register" class="submit">
  </form>
</div>

<!-- for discount  -->
<div class="discount_main">
  <form action="insert.php" method="post">
  <label>ID: </label>
       <input style="margin-bottom:10px;width:150px;" type="number" name="discount_ID" placeholder="ID..." required>
  <br> <label>Date: </label>
       <input type="date" name="discount_date" required>
  <br> <label>discount :  </label>
       <input style="width: 200px;" type="number" min="0" step="any"  name="discount_register" placeholder="100" value="0">
       <br> <label>borrow :  </label>
       <input style="width: 200px;" type="number" min="0" step="any"  name="borrow_register" placeholder="100" value="0">
       <br>
       <input type="submit" name="submit_discount" value="Register" class="submit">
  </form>
</div>

<!-- for remove attende -->
<div class="remove_main">
  <form action="remove.php" method="post">
  <label>ID: </label>
       <input style="margin-bottom:10px;width:150px;" type="number" name="remove_ID" placeholder="ID..." required>
  <br> <label>Date: </label>
       <input type="date" name="remove_date" required>
       <br>
       <input type="submit" name="submit_discount" value="Remove" class="submit">
  </form>
</div>

<!-- for recieve money  -->
<div class="receive_salary">
  <form action="insert.php" method="post">
  <label>ID: </label>
       <input style="margin-bottom:10px;width:150px;" type="number" name="receive_salary_ID" placeholder="ID..." required>
  <br> <label>Date: </label>
       <input type="date" name="receive_salary_date" required>
  <br> <label>Receive Salary :  </label>
       <input style="width: 200px;" type="number" min="0" step="any"  name="receive_salary_money" placeholder="100" value="0">
       <br>
       <input type="submit" name="submit_receive_salary" value="Register" class="submit">
  </form>
</div>
    </body>
</html>
