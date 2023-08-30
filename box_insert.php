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

<header style="text-align: center; color: wheat; font-weight: bold; font-size:2em;position: fixed;top: 0;width: 100%;
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
                
        
</nav>
</body>
</html>


<!-- ......................................      boxs inserting ....................................... -->
<!-- start of add box -->
<?php
  // File upload path
  error_reporting(0);

 if(isset($_POST['submit_add_box'])/*  && !empty($_FILES["file"]["name"]) */ ){

   $filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "./box_pic/".$filename;  

    $box_id = $_POST['box_id']; $status_type = $_POST['status_type']; $percentage= $_POST['percentage'];
    $company = $_POST['company']; $model = $_POST['model']; $behind_door= $_POST['behind_door'];
    $right_side = $_POST['right_side']; $left_side = $_POST['left_side']; $thickness= $_POST['thickness'];
    $angle_type = $_POST['angle_type']; $frame_type = $_POST['frame_type']; $box_floor_type= $_POST['box_floor_type'];
    $chassis = $_POST['chassis'];  $location = $_POST['location']; $height= $_POST['height'];
    $width = $_POST['width']; $length = $_POST['length']; $unit_iD= $_POST['unit_iD'];
     $palamma_y_or_n= $_POST['palamma_y_or_n']; $palamma_type = $_POST['palamma_type']; $image = $_POST['image'];
    $box_name= $_POST['box_name']; $notes = $_POST['notes']; $entry_date = $_POST['entry_date'];
    $buying_price= $_POST['buying_price']; $selling_price = $_POST['selling_price']; $color = $_POST['color'];
    $type= $_POST['type'];
  
  echo "<div class='add_box_query' style='float:left;'>";
 
	// Check extension
   if(empty($_POST['palamma_y_or_n'])){ 
    $palamma_y_or_n= 'FALSE';
  }else if(empty($_POST['chassis'])){
    $chassis = 'FALSE';
  }

  $add_box = "INSERT INTO `sheet_boxs` (`B_ID`,`B_Status Type`,`B_Percentage`,`B_Company`,`B_Model`,`Behind Door`,`Right Side`
              ,`Left Side`,`Thickness`,`Angle Type`,`Frame Type`,`Box Floor Type`,`Chassis`,`B_Location`,`Height`,`Width`,
              `Length`,`U_ID`,`Palamma Y or N`,`Palamma Type`,`B_Image` ,`Box name`,`B_Notes`,`B_Entry date`,`B_Buying Price`,`B_Selling Price`,
              `Color`,`Type`) VALUES ('".$box_id."','".$status_type."',".$percentage.",'".$company."','".$model."',".$behind_door.",".$right_side.",
              ".$left_side.",".$thickness.",'".$angle_type."','".$frame_type."','".$box_floor_type."','".$chassis."','".$location."',".$height.",".$width.",
              ".$length.",'".$unit_iD."','".$palamma_y_or_n."','".$palamma_type."','".$image."','".$box_name."','".$notes."','".$entry_date."',".$buying_price.",
              ".$selling_price.",'".$color."','".$type."') ";
      
  if ($conn->query($add_box)/*  && move_uploaded_file($tempname, $folder) */ === TRUE) {
    echo"
    <script type=\"text/javascript\">
    alert('Box Added successfully');
    </script> 
    ";
   // echo "Selling created successfully";
  } else {
    
    echo "Error: " . $add_box . "<br>" . $conn->error;
  }

  echo "</div>";
  $conn->close(); 

}
?>
</div>

<!-- end of add box -->

<!-- edit box section -->
<?php
if(isset($_POST['do_edit_box'])){
  $box_id= $_POST['box_id'];

$do_edit_box = "SELECT `B_ID`,`B_Status Type`,`B_Percentage`,`B_Company`,`B_Model`,`Behind Door`,`Right Side`,`Left Side`,`Thickness`
,`Angle Type`,`Frame Type`,`Box Floor Type`,`Chassis`,`B_Location`,`Height`,`Width`,`Length`,`U_ID`,`Palamma Y or N`,`Palamma Type`
,`B_Image`,`Box name`,`B_Notes`,`B_Entry date`,`B_Buying Price`,`B_Selling Price`,`Color`,`Type` FROM `sheet_boxs` where `B_ID`='$box_id'"; 

$result = $conn->query($do_edit_box);

if($result->num_rows != 1){
  // redirect to show page
  die('id is not in db');
}

?>

<?php
//$data = $result->fetch_assoc();
 while($row = mysqli_fetch_array($result))
  {
echo"<div class='edit_box_section'>
<form action='#' method='POST'> 
<br><label>Box ID: </label> 
<input type='text' name='box_id' value='". $row['B_ID']."'> ";    
echo" <br><label>Status Type: </label> 
<input type='text' name='status_type' value='". $row['B_Status Type']."'> ";
echo"  <br><label>Percentage: </label>
<input type='number' min='0' step='any' name='percentage' defaultValue='0' value='". $row['B_Percentage']."' >";
echo"  <br><label>Company: </label> 
<input type='text' min='0' step='any' name='company' value='".  $row['B_Company']."'>";
echo"  <br><label>Model: </label> 
<input type='text' min='0' step='any' name='model' value='". $row['B_Model']."'>";
echo"  <br><label>Behind Door: </label> 
<input type='number' min='0' step='any' name='behind_door' defaultValue='0' value='". $row['Behind Door']."'>";
echo"  <br><label>Right Side: </label> 
<input type='number' min='0' step='any' name='right_side' defaultValue='0' value='". $row['Right Side']."'>";
echo"  <br><label>Left Side: </label> 
<input type='number' min='0' step='any' name='left_side' defaultValue='0' value='". $row['Left Side']."'>";
echo"  <br><label>Thickness: </label> 
<input type='number' min='0' step='any' name='thickness' defaultValue='0' value='". $row['Thickness']."'>";
echo"  <br><label>Angle Type: </label> 
<input type='text' min='0' step='any' name='angle_type' value='". $row['Angle Type']."'>";
echo"  <br><label>Frame Type: </label> 
<input type='text'  name='frame_type' value='". $row['Frame Type']."'>";
echo"  <br><label>Box Floor Type: </label> 
<input type='text'  name='box_floor_type' value='". $row['Box Floor Type']."'>";
echo"  <br><label>Chassis: </label> 
<input type='text' value='". $row['Chassis']."'  name='chassis' >";
echo"  <br><label>Location: </label> 
<input type='text'  name='location' value='". $row['B_Location']."'>";
echo"  <br><label>Height: </label> 
<input type='number' min='0' step='any' name='height' defaultValue='0' value='". $row['Height']."'>";
echo"  <br><label>Width: </label> 
<input type='number' min='0' step='any' name='width' defaultValue='0' value='". $row['Width']."'>";
echo"  <br><label>Length: </label> 
<input type='number' min='0' step='any' name='length' defaultValue='0' value='". $row['Length']."'>";
echo"  <br><label>Unit ID: </label> 
<input type='text'  name='unit_iD' value='". $row['U_ID']."'>";
echo"  <br><label>Palamma Y or N: </label> 
<input type='text' value='". $row['Palamma Y or N']."' name='palamma_y_or_n' >";
echo"  <br><label>Palamma Type: </label> 
<input type='text'  name='palamma_type' value='". $row['Palamma Type']."'>";
echo"  <br><label>Image: </label> 
<input type='file'  name='image' style='height:fit-content; width:fit-content;' value='". $row['B_Image']."'>";
echo"  <br><label>Box name: </label> 
<input type='text'  name='box_name' value='". $row['Box name']."'>";
echo"  <br><label>Notes: </label> 
<input type='text'  name='notes' value='". $row['B_Notes']."'>";
echo"  <br><label>Entry date: </label> 
<input type='date'  name='entry_date' value='". $row['B_Entry date']."'>";
echo"  <br><label>Buying Price: </label> 
<input type='number' min='0' step='any'  name='buying_price' defaultValue='0' value='". $row['B_Buying Price']."'>";
echo"  <br><label>Selling Price: </label> 
<input type='number' min='0' step='any'  name='selling_price' defaultValue='0' value='". $row['B_Selling Price']."'>";
echo"  <br><label>Color: </label> 
<input type='text'  name='color' value='". $row['Color']."'>";
echo"  <br><label>Type: </label> 
<input type='text'  name='type' value='". $row['Type']."'>";
echo"  <br>";

  }  

?>
<input type='submit' name='submit_edit_box' value='Edit Box' id='view_to_edit' class='submit'>
</form>   
</div> 

<?php }  ?>

<!-- edit selling box -->

<?php
if(isset($_POST['submit_edit_box'])){
    $box_id= $_POST['box_id'];
    $status_type = $_POST['status_type']; $percentage= $_POST['percentage'];
    $company = $_POST['company']; $model = $_POST['model']; $behind_door= $_POST['behind_door'];
    $right_side = $_POST['right_side']; $left_side = $_POST['left_side']; $thickness= $_POST['thickness'];
    $angle_type = $_POST['angle_type']; $frame_type = $_POST['frame_type']; $box_floor_type= $_POST['box_floor_type'];
    $chassis = $_POST['chassis'];  $location = $_POST['location']; $height= $_POST['height'];
    $width = $_POST['width']; $length = $_POST['length']; $unit_iD= $_POST['unit_iD'];
    $palamma_y_or_n= $_POST['palamma_y_or_n']; $palamma_type = $_POST['palamma_type']; $image = $_POST['image'];
    $box_name= $_POST['box_name']; $notes = $_POST['notes']; $entry_date = $_POST['entry_date'];
    $buying_price= $_POST['buying_price']; $selling_price = $_POST['selling_price']; $color = $_POST['color'];
    $type = $_POST['type'];


  $edit_box = "UPDATE `sheet_boxs` SET `B_Status Type`='$status_type' ,`B_Percentage`=$percentage,`B_Company`='$company',`B_Model`='$model'
  ,`Behind Door`=$behind_door,`Right Side`=$right_side,`Left Side`=$left_side,`Thickness`=$thickness
  ,`Angle Type`='$angle_type',`Frame Type`='$frame_type',`Box Floor Type`='$box_floor_type',`Chassis`='$chassis'
  ,`B_Location`='$location',`Height`=$height,`Width`=$width,`Length`=$length,`U_ID`='$unit_iD',`Palamma Y or N`='$palamma_y_or_n'
  ,`Palamma Type`='$palamma_type',`B_Image`='$image',`Box name`='$box_name',`B_Notes`='$notes',`B_Entry date`='$entry_date'
  ,`B_Buying Price`=$buying_price,`B_Selling Price`=$selling_price,`Color`='$color',`Type`=' $type' 
  where `B_ID`='$box_id'";

if ($conn->query($edit_box) === TRUE) {

  echo"
  <script type=\"text/javascript\">
  alert('Box Edit successfully');
  </script> 
  ";
} else {
echo "Error: " . $edit_box . "<br>" . $conn->error;
}
echo " ";
$conn->close(); 
}

 ?>

<!-- selling section -->
<?php
 if(isset($_POST['submit_box_sell'])){
    $box_sell_id = $_POST['box_sell_id'];
    $box_sell_date = $_POST['box_sell_date'];
    $box_sell_price= $_POST['box_sell_price'];
  
  echo "<div class='box_sell_view' style='float:left;'>";
  
  $box_sell = "INSERT INTO `box_selling` (`B_ID`,`Status Type`,`Percentage`,`Company`,`Model`,`Behind Door`,`Right Side`
              ,`Left Side`,`Thickness`,`Angle Type`,`Frame Type`,`Box Floor Type`,`Chassis`,`Location`,`Height`,`Width`,
              `Length`,`U_ID`,`Palamma Y or N`,`Palamma Type`,`Image` ,`Box name`,`Notes`,`Entry date`,`Buying Price`,
              `Color`,`Type`,`spending`) SELECT `B_ID`,`Status Type`,`Percentage`,`Company`,`Model`,`Behind Door`,`Right Side`,`Left Side`,`Thickness` 
              ,`Angle Type`,`Frame Type`,`Box Floor Type`,`Chassis`,`Location`,`Height`,`Width`,`Length`,`U_ID`,`Palamma Y or N`,
              `Palamma Type`,`Image` ,`Box name`,`Notes`,`Entry date`,`Buying Price`,`Color`,`Type`,`spending` 
              from `sheet_boxs` where `B_ID`='$box_sell_id' ";

/*   $spending_val="SELECT `spending` FROM `box_selling` where `B_ID`='$box_sell_id'";
  $result = mysqli_query($conn, $spending_val);
  while ($row = mysqli_fetch_assoc($result)) { 
    $spending=$row['spending']; 
} */
  $sell_update="UPDATE `box_selling` SET `external date`='$box_sell_date' , `Selling Price`=$box_sell_price 
                , `Pofit`=$box_sell_price - (`Buying Price`) - (`spending`)
                where `B_ID`='$box_sell_id' "; 

  $remove_from_source="DELETE FROM `sheet_boxs` where `B_ID`='$box_sell_id' ";

  if ($conn->query($box_sell) && $conn->query($sell_update) && $conn->query($remove_from_source)  === TRUE) {
    echo"
    <script type=\"text/javascript\">
    alert('Selling created successfully');
    </script> 
    ";
    //echo "Selling created successfully";
  } else {
    
    echo "Error: " . $box_sell . "<br>". $sell_update . "<br>" . $remove_from_source . "<br>" . $conn->error;
  }
  echo "</div>";
  $conn->close(); 
}
?>
