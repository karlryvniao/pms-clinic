<?php


define('CORRECT_PIN', '1111');
$entered_pin = $_POST['pin'];
if(isset($_POST['submit'])) { 
   if ($entered_pin === CORRECT_PIN) {
    header("Location:patients.php");
}else{
  $message = "Invalid Pin!, Please Try Again!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
?>
