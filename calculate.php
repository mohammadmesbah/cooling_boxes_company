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
<script src="jquery-3.6.4.min.js?<?php echo time(); ?>" type="text/javascript"></script>
<title>Calculation</title>    
</head>

<body direction="ltr">
<script type="text/javascript">
        $(document).ready(function(){

        });
</script>
<header style="text-align: center; color: wheat; font-weight: bold; font-size:2em;
box-shadow: 5px 10px 20px #720661 inset;">Halima Company</header>
<nav>
<form action="home.php" method="post">
<input type="submit" value="Home">  
<hr>  
</form>
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
<input type="submit" value="Calculator's">
<hr>
</form>
</nav>

<!-- calculate section -->
<div class="calculate_section">
 <form action="cal_insert.php" method="post">
 <?php
if(isset($_POST['enter_cal'])){
        $max_id="SELECT MAX(`id`) FROM `calculate`";
        $result = mysqli_query($conn, $max_id);
        while ($row = mysqli_fetch_assoc($result)) { 
          $pre_still=$row['MAX(`id`)']; 
        echo"  <br><label>ID: </label> 
      <input type='number' name='cal_id' value='". $row['MAX(`id`)']."'> ";
      }  
      
        $conn->close(); 
      
      }
?>
       <br>
       <label>Date: </label>
       <input type="date" name="cal_date" required>
       <br>
       <label>incoming: </label>
       <input type="number" min="0" step="any" name="cal_incoming" value="0">
       <br><label>outgoing: </label>
       <input type="number" min="0" step="any" name="cal_outgoing" value="0">
       <br>
       <br><label>Report: </label>
       <textarea  name="cal_report" rows="4" cols="50"></textarea>
       <br>
       <br><label>Notes: </label>
       <input type="text" name="cal_notes" >
       <br>
       <br><label>Box ID: </label>
       <input type="text" name="cal_boxID" >
       <br>
       <br><label>Unit ID: </label>
       <input type="text" name="cal_unitID" >
       <br>
       <input type="submit" name="submit_cal" value="Do" class="submit">
  </form>
</div>

</body>
</html>