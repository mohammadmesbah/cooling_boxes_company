<?php
include "dbconnect.php";

?>

<!DOCTYPE html>
<html>
<head>
<link href="style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
<link href="boxs.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8" name="viewport" content="width=device-width">
<title>Boxs</title>
<script src="jquery-3.6.4.min.js?<?php echo time(); ?>" type="text/javascript"></script>
<script src="box_script.js?<?php echo time(); ?>" type="text/javascript"></script>
<style>
tr{
    height:60px;
}
</style>    
</head>
<body direction="ltr">
<script type="text/javascript">

    </script>
<header style="text-align: center; color: wheat; font-weight: bold; font-size:2em;position: inherit;top: 0;width: 100%;
        box-shadow: 5px 10px 20px #720661 inset;">Halima Company</header>
<nav>
<form action="home.php" method="post">
    <input type="submit" value="Home">  
    <hr>  
  </form>     
      
    <input id="add_box" type="submit" value="Add Box">  
    <hr>
     
    
    <input id="edit_box" type="submit" value="Edit Box">  
    <hr>
        
     
    <input id="remove_box" type="submit" value="Remove Box">
    <hr>
  
      
    <input id="selling_box" type="submit" value="Selling">    
    <hr>
                
        
</nav>
<div class="main">
<?php
$sql = /* "SELECT `B_ID`,`Status Type`,`Company`,`Model`,`Behind Door`,`Right Side`,`Left Side`,`Thickness`
,`Angle Type`,`Frame Type`,`Box Floor Type`,`Chassis`,`Height`,`Width`,`Length`,`Palamma Y or N`,`Image`
,`Box name`,`Notes`,`Selling Price`
FROM `sheet_boxs` 
ORDER BY `B_ID` ASC "; */ 
"SELECT `sheet_boxs`.`B_ID`,`sheet_boxs`.`B_Status Type`,`sheet_boxs`.`B_Company`,`sheet_boxs`.`B_Model`,`sheet_boxs`.`Behind Door`
,`sheet_boxs`.`Right Side`,`sheet_boxs`.`Left Side`,`sheet_boxs`.`Thickness`,`sheet_boxs`.`Angle Type`,`sheet_boxs`.`Frame Type`
,`sheet_boxs`.`Box Floor Type`,`sheet_boxs`.`Chassis`,`sheet_boxs`.`Height`,`sheet_boxs`.`Width`,`sheet_boxs`.`Length`
,`sheet_boxs`.`Palamma Y or N`,`sheet_boxs`.`B_Image`, `sheet_boxs`.`Box name`,`sheet_boxs`.`B_Notes`,`sheet_boxs`.`B_Selling Price`
, `sheet_units`.`U_ID`,`sheet_units`.`Status Type`,`sheet_units`.`Percentage`,`sheet_units`.`Company`,`sheet_units`.`Model Number`
,`sheet_units`.`Type`,`sheet_units`.`Image`,`sheet_units`.`Selling Price` FROM `sheet_boxs` LEFT JOIN `sheet_units` 
ON `sheet_boxs`.`U_ID` = `sheet_units`.`U_ID`";
$result = $conn->query($sql);
echo "<table border='1'>
<tr>
<th> B_ID </th>  <th> Status Type </th>  <th>Company </th>  <th> Model </th>
<th> Behind Door </th>  <th> Right Side </th>  <th>Left Side </th>  <th> Thickness </th>
<th> Angle Type </th>  <th> Frame Type </th>  <th>Box Floor Type </th>  <th> Chassis </th>
<th> Height </th>  <th> Width </th>  <th>Length </th>  <th> Palamma Y or N </th>
<th> Image </th>  <th> Box name </th>  <th>Notes </th>  <th> Selling Price </th>
<th>Unit ID</th>  <th>status</th>  <th>percentage</th>  <th>company</th>
<th>Model</th>  <th>Type</th>  <th>Image</th>  <th> Selling Price </th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['B_ID'] . "</td>"; echo "<td>" . $row['B_Status Type'] . "</td>";
  echo "<td>" . $row['B_Company'] . "</td>"; echo "<td>" . $row['B_Model'] . "</td>";
  echo "<td>" . $row['Behind Door'] . "</td>"; echo "<td>" . $row['Right Side'] . "</td>";
  echo "<td>" . $row['Left Side'] . "</td>"; echo "<td>" . $row['Thickness'] . "</td>";
  echo "<td>" . $row['Angle Type'] . "</td>"; echo "<td>" . $row['Frame Type'] . "</td>";
  echo "<td>" . $row['Box Floor Type'] . "</td>"; echo "<td>" . $row['Chassis'] . "</td>";
  echo "<td>" . $row['Height'] . "</td>"; echo "<td>" . $row['Width'] . "</td>";
  echo "<td>" . $row['Length'] . "</td>"; echo "<td>" . $row['Palamma Y or N'] . "</td>";
  echo "<td>" ?> <img src="./box_pic/<?php echo $row['B_Image']?>" style="width:75px;height:75px;"/> </td>
  <?php
  echo "<td>" . $row['Box name'] . "</td>";
  echo "<td style='width:50px;'>" . $row['B_Notes'] . "</td>"; echo "<td>" . $row['B_Selling Price'] . "</td>";
  echo "<td>" . $row['U_ID'] . "</td>"; echo "<td>" . $row['Status Type'] . "</td>";
  echo "<td>" . $row['Percentage'] . "</td>"; echo "<td>" . $row['Company'] . "</td>";
  echo "<td>" . $row['Model Number'] . "</td>"; echo "<td>" . $row['Type'] . "</td>"; 
  echo "<td>" ?> <img src="./box_pic/<?php echo $row['Image']?>" style="width:75px;height:75px;"/> </td>
  <?php
   echo "<td>" . $row['Selling Price'] . "</td>"; 
  echo "</tr>";
  }

echo "</table>"; ?>
</div>
 

<!-- add box -->

<div class="add_box_section">
 <form action="box_insert.php" method="post">
  <label>Box ID: </label>
  <input style="margin-bottom:10px;width:150px;" type="text" name="box_id" placeholder="ID..." required>
  <br><label>Status Type: </label> <input type="text" name="status_type" >
  <br><label>Percentage: </label> <input type="number" min="0" step="any" name="percentage" defaultValue="0" value="0" >
  <br><label>Company: </label> <input type="text" min="0" step="any" name="company" >
  <br><label>Model: </label> <input type="text" min="0" step="any" name="model" >
  <br><label>Behind Door: </label> <input type="number" min="0" step="any" name="behind_door" defaultValue="0" value="0">
  <br><label>Right Side: </label> <input type="number" min="0" step="any" name="right_side" defaultValue="0" value="0">
  <br><label>Left Side: </label> <input type="number" min="0" step="any" name="left_side" defaultValue="0" value="0">
  <br><label>Thickness: </label> <input type="number" min="0" step="any" name="thickness" defaultValue="0" value="0">
  <br><label>Angle Type: </label> <input type="text" min="0" step="any" name="angle_type" >
  <br><label>Frame Type: </label> <input type="text"  name="frame_type" >
  <br><label>Box Floor Type: </label> <input type="text"  name="box_floor_type" >
  <br><label>Chassis: </label> <input type="checkbox" value="TRUE"  name="chassis" >TRUE
  <br><label>Location: </label> <input type="text"  name="location" >
  <br><label>Height: </label> <input type="number" min="0" step="any" name="height" defaultValue="0" value="0">
  <br><label>Width: </label> <input type="number" min="0" step="any" name="width" defaultValue="0" value="0">
  <br><label>Length: </label> <input type="number" min="0" step="any" name="length" defaultValue="0" value="0">
  <br><label>Unit ID: </label> <input type="text"  name="unit_iD" >
  <br><label>Palamma Y or N: </label> <input type="checkbox" value="TRUE" name="palamma_y_or_n" >TRUE
  <br><label>Palamma Type: </label> <input type="text"  name="palamma_type" >
  <br><label>Image: </label> <input type="file"  name="image" style="height:fit-content; width:fit-content;">
  <br><label>Box name: </label> <input type="text"  name="box_name" >
  <br><label>Notes: </label> <input type="text"  name="notes" >
  <br><label>Entry date: </label> <input type="date"  name="entry_date" >
  <br><label>Buying Price: </label> <input type="number" min="0" step="any"  name="buying_price" defaultValue="0" value="0">
  <br><label>Selling Price: </label> <input type="number" min="0" step="any"  name="selling_price" defaultValue="0" value="0">
  <br><label>Color: </label> <input type="text"  name="color" >
  <br><label>Type: </label> <input type="text"  name="type" >
  <br>
  <input type="submit" name="submit_add_box" value="Add Box" class="submit">
  </form>

</div>

<!-- edit box -->

<div class="do_edit_box_section">
 <form action="box_insert.php" method="post">
  <label>Box ID: </label> 
       <input style="margin-bottom:10px;width:150px;" type="text" name="box_id" placeholder="ID..." required> 
       <input type="submit" name="do_edit_box" value="DO Edit" id="doing_edit_box" class="submit">
</form>
</div>




<!-- remove section -->
<div class="remove_section">
 <form action="remove.php" method="post">
  <label>Box ID: </label>
       <input style="margin-bottom:10px;width:150px;" type="text" name="box_remove_id" placeholder="ID..." required>
       <br>
       <input type="submit" name="submit_remove_box" value="Remove Box" class="submit">
  </form>
</div>

<!-- selling section -->
<div class="selling_section">
 <form action="box_insert.php" method="post">
  <label>Box ID: </label>
       <input style="margin-bottom:10px;width:150px;" type="text" name="box_sell_id" placeholder="ID..." required>
  <br> <label>Date: </label>
       <input type="date" name="box_sell_date" required>
       <br><label>Selling Price: </label>
       <input type="number" min="0" step="any" name="box_sell_price" required>
       <br>
       <input type="submit" name="submit_box_sell" value="Sell Box" class="submit">
  </form>
</div>
    </body>
</html>