<?php
include "dbconnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" name="viewport" content="width=device-width">
        <link href="style.css?<?php echo time(); ?>" rel="stylesheet" >
        <title>Employee</title>
        <style>
          table{
            float:left;
          }
          td{
            width:fit-content;
            height:50px;
          }
          nav{
            margin-top:0px;
          }
        </style>
    </head>
<body>
<script type="text/javascript">
        
    </script>
<header style="text-align: center; color: wheat; font-weight: bold; font-size:2em;
                box-shadow: 5px 10px 20px #720661 inset;">Halima Company</header>
<nav>
    <form action="attendance.php" method="post">
        <input type="submit" value="حضور وإنصراف">
        <hr>
        </form>
        <form>
        <input type="submit" value="تسجيل عمل جديد">
        <hr>
    </form>
    <form>
        <input type="submit" value="إنهاء عمل">
        <hr>
    </form>
    <form>
        <input type="submit" value="إضافه مصاريف">
        <hr>
    </form>
</nav>
<main style="width:max-content; ">
<!-- $sql = "SELECT `E_ID`,`name`,`date`,`date_time` FROM `employee` ;  -->
<?php
/* date("Y-m-d").date("h:i:s")*/
$sql = "SELECT `E_ID`,`day`,`name`,`date_time` FROM `employee`where `date`= CURDATE() ORDER BY `date_time` DESC"; 

$result = $conn->query($sql);
echo "<table border='1'>
<tr>
<th> الرقم </th>
<th> اليوم </th>
<th> إسم الموظف </th>
<th> الوقت  </th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['E_ID'] . "</td>";
  echo "<td>" . $row['day'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['date_time'] . "</td>";
  echo "</tr>";
  }

echo "</table>"; ?>
</main>
<?php
//SELECT COUNT(`E_ID`), `name` FROM employee GROUP BY name ORDER BY COUNT(`E_ID`) DESC;
echo "<div class='dash' style='float:left;'>";
$sql1 = "SELECT COUNT(`E_ID`), `name`,`monthly`,`weekly` ,`daily` ,`piece`,`bonus`,`discount`,`borrow`, `total_salary`  FROM `employee` 
          GROUP BY `name` ORDER BY COUNT(`E_ID`) DESC"; 

$result1 = $conn->query($sql1);
echo "<table style='margin:-35px;' border='1'>
<tr>
<th> عدد أيام الحضور </th>
<th> الإسم </th>
<th> المستحق </th>
</tr>";


while($row1 = mysqli_fetch_array($result1))
  {
  echo "<tr>";
  echo "<td>" . $row1['COUNT(`E_ID`)'] . "</td>";
  echo "<td>" . $row1['name'] . "</td>";

  $total_salary =( (($row1['monthly'])/30 ) + ( ($row1['weekly'])/6 ) +  ($row1['daily'])  + ($row1['piece']) + ($row1['bonus'])  - ( ($row1['discount'])
                - ($row1['borrow']) )   )  *  ($row1['COUNT(`E_ID`)']) ;

  echo "<td>" . /* $row1['total_salary'] */ round($total_salary, 2). "</td>";
  echo "</tr>";
  }
  

echo "</table>";
echo "</div>";
$conn->close();
?>


</body>
</html>