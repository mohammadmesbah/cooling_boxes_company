<?php
include "dbconnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" name="viewport" content="width=device-width">
        <script src="jquery-3.6.4.min.js?<?php echo time(); ?>" type="text/javascript"></script>
        <title>Home</title>
    <style>
        .dashboard1{
            background-color:white;
            margin-left:auto;
            margin-right:auto;
            border:none;
            width:400px;
            float:left;
        }  
        table{
            background-color:#090934;;
            font-size:1em;
            height:150px;
            width: inherit;
        }
        tr{
            height: 90px;
        }
        th{
            word-wrap: break-word;
            font-size:.5em;
        }
        td{
            word-wrap: break-word;
            font-size:.5em;
        }
    </style>    
    </head>
    <body direction="ltr">
        <script type="text/javascript">
              $(document).ready(function(){

              });
            </script>
        <header style="text-align: center; color: wheat; font-weight: bold; font-size:2em;
                box-shadow: 5px 10px 20px #720661 inset;">Halima Company</header>
        <nav>
            <form action="boxs.php" method="post">
             <input type="submit" value="Box's">
             <hr>
             </form>
             <form action="units.php" method="post">
             <input type="submit" value="Unit's">
             <hr>
            </form>
            <form action="attendance.php" method="post">
             <input type="submit" value="Employee's">
             <hr>
            </form>
            <form>
             <input type="submit" value="Customer's">
             <hr>
            </form>
            <form>
             <input type="submit" value="Supplier's">
             <hr>
            </form>
            <form action="calculate.php" method="post">
             <input type="submit" name="enter_cal" value="Calculator's">
             <hr>
            </form>
        </nav>
<div class="dashboard1">
<?php
$sql1 = "SELECT COUNT(`B_ID`) FROM `sheet_boxs` "; 

$result1 = $conn->query($sql1);
echo "<table border='1'>
<tr>
<th> number of Boxs </th>
  </tr>"; 


while($row1 = $result1->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row1['COUNT(`B_ID`)'] . "</td>";
echo "</tr>";
}
 echo "</table>"; 
?>
</div>

<div class="dashboard1">
<?php
$sql2 = "SELECT COUNT(`B_ID`) FROM `sheet_boxs` where `B_ID` like 'B%' "; 

$result2 = $conn->query($sql2);

echo  "<table border='1'> 
<tr>
<th> number of colmun Boxs </th>
</tr>";


while($row2 = $result2->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row2['COUNT(`B_ID`)'] . "</td>";
echo "</tr>";
}
 echo "</table>"; 
?>
</div>

<div class="dashboard1">
<?php
$sql3 = "SELECT COUNT(`B_ID`) FROM `sheet_boxs` where `B_ID` like 'IB%' "; 

$result3 = $conn->query($sql3);
echo "<table border='1'>
<tr>
<th> number of iron Boxs </th>
</tr>";


while($row3 = $result3->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row3['COUNT(`B_ID`)'] . "</td>";
echo "</tr>";
}
 echo "</table>"; 
?>
</div>


<div class="dashboard1">
<?php
$sql5 = "SELECT COUNT(`U_ID`) FROM `sheet_units` "; 

$result5 = $conn->query($sql5);
echo "<table border='1'>
<tr>
<th> number of Units </th>
</tr>";


while($row5 = $result5->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row5['COUNT(`U_ID`)'] . "</td>";
echo "</tr>";
}
 echo "</table>"; 

?>
</div>

<div class="dashboard1">
<?php
$sql4 = "SELECT COUNT(`U_ID`) FROM `sheet_units` where `Has Box`='false' "; 

$result4 = $conn->query($sql4);
echo "<table border='1'>
<tr>
<th> number of separate Units </th>
</tr>";


while($row4 = $result4->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row4['COUNT(`U_ID`)'] . "</td>";
echo "</tr>";
}
 echo "</table>"; 
?>
</div>

<div class="dashboard1">
<?php
$sql5 = "SELECT COUNT(`U_ID`) FROM `sheet_units` where `Has Box`='true' "; 

$result5 = $conn->query($sql5);
echo "<table border='1'>
<tr>
<th> number of Units has box </th>
</tr>";


while($row5 = $result5->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row5['COUNT(`U_ID`)'] . "</td>";
echo "</tr>";
}
echo "</table>";
$conn->close();
?>
</div>
    </body>
</html>