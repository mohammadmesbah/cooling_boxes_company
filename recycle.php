<?php
/* 
$test="SELECT `monthly`,`weekly`,`daily`,`piece`,`bonus`,`evening`,`discount`,`receive`
         FROM `employee` where `E_ID`=$discount_ID AND `date`='$discount_date'";
$record =mysqli_query($conn,$test); 

if (!mysqli_num_rows($record)) {
  echo '...';
} else {
while($row = mysqli_fetch_assoc($record))
{
$monthly= $row['monthly']; $weekly= $row['weekly']; $daily= $row['daily']; $piece= $row['piece'];
$bonus= $row['bonus']; $evening= $row['evening']; $discount= $row['discount']; $receive= $row['receive'];
}
$discount_query = "UPDATE `employee` 
            SET `discount`=$discount_register , `receive`=$receiving_register , 
            `total_salary`= $monthly/30+$weekly/6+$daily+$piece+$bonus+$evening-$discount-$receive
             where `E_ID`=$discount_ID AND `date`='$discount_date'";
} */

/* $_SESSION['status']='inserted failed';
        header("location: attendance.php"); */

/* $_SESSION['status']='inserted success';
        header("location: attendance.php"); */
?>
<!-- <div class='edit_box_section'>
 <br><label>Status Type: </label> 
<input type='text' name='status_type' value=''>
  <br><label>Percentage: </label>
<input type='number' min='0' step='any' name='percentage' defaultValue='0' value='' >
  <br><label>Company: </label> 
<input type='text' min='0' step='any' name='company' value=''>
  <br><label>Model: </label> 
<input type='text' min='0' step='any' name='model' value=''>
  <br><label>Behind Door: </label> 
<input type='number' min='0' step='any' name='behind_door' defaultValue='0' value=''>
  <br><label>Right Side: </label> 
<input type='number' min='0' step='any' name='right_side' defaultValue='0' value=''>
  <br><label>Left Side: </label> 
<input type='number' min='0' step='any' name='left_side' defaultValue='0' value=''>
  <br><label>Thickness: </label> 
<input type='number' min='0' step='any' name='thickness' defaultValue='0' value=''>
  <br><label>Angle Type: </label> 
<input type='text' min='0' step='any' name='angle_type' value=''>
  <br><label>Frame Type: </label> 
<input type='text'  name='frame_type' value=''>
  <br><label>Box Floor Type: </label> 
<input type='text'  name='box_floor_type' value=''>
  <br><label>Chassis: </label> 
<input type='checkbox' value=''  name='chassis' >TRUE
  <br><label>Location: </label> 
<input type='text'  name='location' value=''>
  <br><label>Height: </label> 
<input type='number' min='0' step='any' name='height' defaultValue='0' value=''>
  <br><label>Width: </label> 
<input type='number' min='0' step='any' name='width' defaultValue='0' value=''>
  <br><label>Length: </label> 
<input type='number' min='0' step='any' name='length' defaultValue='0' value=''>
  <br><label>Unit ID: </label> 
<input type='text'  name='unit_iD' value=''>
  <br><label>Palamma Y or N: </label> 
<input type='checkbox' value='' name='palamma_y_or_n' >TRUE
  <br><label>Palamma Type: </label> 
<input type='text'  name='palamma_type' value=''>
  <br><label>Image: </label> 
<input type='file'  name='image' style='height:fit-content; width:fit-content;' value=''>
  <br><label>Box name: </label> 
<input type='text'  name='box_name' value=''>
  <br><label>Notes: </label> 
<input type='text'  name='notes' value=''>
  <br><label>Entry date: </label> 
<input type='date'  name='entry_date' value=''>
  <br><label>Buying Price: </label> 
<input type='number' min='0' step='any'  name='buying_price' defaultValue='0' value=''>
  <br><label>Selling Price: </label> 
<input type='number' min='0' step='any'  name='selling_price' defaultValue='0' value=''>
  <br><label>Color: </label> 
<input type='text'  name='color' value=''>
  <br><label>Type: </label> 
<input type='text'  name='type' value=''>
  <br>
  <input type='submit' name='submit_edit_box' value='Edit Box' id='view_to_edit' class='submit'>
  </div> -->

  
<?php

/* $status_type = $row['Status Type']; $percentage= $row['Percentage'];
    $company = $row['Company']; $model = $row['Model']; $behind_door= $row['Behind Door'];
    $right_side = $row['Right Side']; $left_side = $row['Left Side']; $thickness= $row['Thickness'];
    $angle_type = $row['Angle Type']; $frame_type = $row['Frame Type']; $box_floor_type= $row['Box Floor Type'];
    $chassis = $row['Chassis'];  $location = $row['Location']; $height= $row['Height'];
    $width = $row['Width']; $length = $row['Length']; $unit_iD= $row['Unit ID'];
    $palamma_y_or_n= $row['Palamma Y or N']; $palamma_type = $row['Palamma Type']; $image = $row['Image'];
    $box_name= $row['Box name']; $notes = $row['Notes']; $entry_date = $row['Entry date'];
    $buying_price= $row['Buying Price']; $selling_price = $row['Selling Price']; $color = $row['Color'];
    $type = $row['Type']; */


//     echo "<div class='edit_box_section'>";
/*echo" <br><label>Status Type: </label> 
<input type='text' name='status_type' value='". $status_type."'> ";
echo"  <br><label>Percentage: </label>
<input type='number' min='0' step='any' name='percentage' defaultValue='0' value='". $row['Percentage']."' >";
echo"  <br><label>Company: </label> 
<input type='text' min='0' step='any' name='company' value='".  $row['Company']."'>";
echo"  <br><label>Model: </label> 
<input type='text' min='0' step='any' name='model' value='". $row['Model']."'>";
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
<input type='checkbox' value='". $row['Chassis']."'  name='chassis' >TRUE";
echo"  <br><label>Location: </label> 
<input type='text'  name='location' value='". $row['Location']."'>";
echo"  <br><label>Height: </label> 
<input type='number' min='0' step='any' name='height' defaultValue='0' value='". $row['Height']."'>";
echo"  <br><label>Width: </label> 
<input type='number' min='0' step='any' name='width' defaultValue='0' value='". $row['Width']."'>";
echo"  <br><label>Length: </label> 
<input type='number' min='0' step='any' name='length' defaultValue='0' value='". $row['Length']."'>";
echo"  <br><label>Unit ID: </label> 
<input type='text'  name='unit_iD' value='". $row['Unit ID']."'>";
echo"  <br><label>Palamma Y or N: </label> 
<input type='checkbox' value='". $row['Palamma Y or N']."' name='palamma_y_or_n' >TRUE";
echo"  <br><label>Palamma Type: </label> 
<input type='text'  name='palamma_type' value='". $row['Palamma Type']."'>";
echo"  <br><label>Image: </label> 
<input type='file'  name='image' style='height:fit-content; width:fit-content;' value='". $row['Image']."'>";
echo"  <br><label>Box name: </label> 
<input type='text'  name='box_name' value='". $row['Box name']."'>";
echo"  <br><label>Notes: </label> 
<input type='text'  name='notes' value='". $row['Notes']."'>";
echo"  <br><label>Entry date: </label> 
<input type='date'  name='entry_date' value='". $row['Entry date']."'>";
echo"  <br><label>Buying Price: </label> 
<input type='number' min='0' step='any'  name='buying_price' defaultValue='0' value='". $row['Buying Price']."'>";
echo"  <br><label>Selling Price: </label> 
<input type='number' min='0' step='any'  name='selling_price' defaultValue='0' value='". $row['Selling Price']."'>";
echo"  <br><label>Color: </label> 
<input type='text'  name='color' value='". $row['Color']."'>";
echo"  <br><label>Type: </label> 
<input type='text'  name='type' value='". $row['Type']."'>";
echo"  <br>
  <input type='submit' name='submit_edit_box' value='Edit Box' id='view_to_edit' class='submit'>
  </div>"; */

?>