<!DOCTYPE html>
<html>
<head>
  <title>View</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<body  style="background-color: skyblue;">

<div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:250px">
  <h1 style="text-align: center;font-weight: bold; text-decoration: underline;">Exam</h1>
  <a onclick="window.open('edit.php','_self')"class="w3-bar-item w3-button"><i class="fas fa-edit">Edit</i></a> 
  <a onclick="window.open('upload.php','_self')" class="w3-bar-item w3-button"><i class="fas fa-upload">Upload</i></a> 
      <a onclick="window.open('view.php','_self')"  class="w3-bar-item w3-button"><i class="  far fa-eye">View</i></a> 
          <a onclick="window.open('add.php','_self')"  class="w3-bar-item w3-button"><i class=" fas fa-plus">Add exam</i></a><hr> <h1 style="text-align: center;font-weight: bold; text-decoration: underline;">Student</h1>
    <a onclick="window.open('modify.php','_self')"  class="w3-bar-item w3-button"><i class="  far fa-keyboard">Modify</i></a> 
<a onclick="window.open('insert.php','_self')"  class="w3-bar-item w3-button"><i class=" fas fa-envelope-open-text">Insert</i></a> <hr>
  <a onclick="window.open('teacher.php','_self')" class="w3-bar-item w3-button"><i class="  fas fa-power-off">Logout</i></a>
  
</div>

<div style='margin-left:250px;text-align: center; '>
<?php
session_start();
$db=$_SESSION['db'];

if($db=='tena.php'){
  include "tena.php";
  echo "<center style='font-size:30px'><h1>X_A</h1>";
  $sql=mysqli_query($link,"SELECT * FROM exmdet");
}
elseif ($db=='tenb.php') {
  include "tenb.php";
  echo "<center style='font-size:30px'><h1>X_B</h1>";
  $sql=mysqli_query($link,"SELECT * FROM exmdet");
} 




echo "<form method='post'>";
	echo "SELECT THE EXAM TO VIEW:<br>";
while($row=mysqli_fetch_array($sql)){
echo "<input type='radio' name='em' required value=" .$row['ename'] .">".$row['ename']."<br>";
}
echo"<input type='submit' name='submit' width='200' height='200'></form>";

if(isset($_POST['submit'])){
$exm=$_POST['em'];
$sql=mysqli_query($link,"SELECT * FROM $exm ORDER BY Rollno");
echo "<table frame='box' rules='all' width='1000' border='5' style='font-size:30px'>";
echo "<tr><th>Rollno</th><th>Name</th><th>Tamil</th><th>English</th><th>Maths</th><th>Science</th><th>Social</th><th>Total</th><th>Percentage</th></tr>";
while($row=mysqli_fetch_array($sql)){
echo "<tr><td>".$row['Rollno']."</td>";
echo "<td>".$row['Name']."</td>";
echo "<td>".$row['Tamil']."</td>";
echo "<td>".$row['English']."</td>";
echo "<td>".$row['Maths']."</td>";
echo "<td>".$row['Science']."</td>";
echo "<td>".$row['Social']."</td>";
echo "<td>".$row['Total']."</td>";
echo "<td>".$row['Percentage']."</td>";
echo "</tr>";

}
echo "<input type='submit' value='print' onclick='window.print()'>";}
?>