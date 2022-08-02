<!DOCTYPE html>
<html>

  <title>Modify</title>
  <link rel="stylesheet" type="text/css" href="upload.css">

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

<div style='margin-left:250px;text-align: center;'>

<?php
session_start();
$db=$_SESSION['db'];
if($db=='tena.php'){
  include "tena.php";
  $sql=mysqli_query($link,"SELECT * FROM studdetails");
  echo "<h1>X_A</h1>";
}
elseif ($db=='tenb.php') {
  include "tenb.php";
  $sql=mysqli_query($link,"SELECT * FROM studdetails");
    echo "<h1>X_B</h1>";
}

echo"
<div class='main'>
      <div class='one'  >
        <div class='register' style='background-color: pink;'>
          
          
            <div>";
echo "<form method='get'  id='reg-form'>";
  echo "<div>
<input type='text' name='roll' placeholder='rollno' required><br></div>";

echo "<input type='submit' class='button' name='submit' value='check'><br></form></div>";

if(isset($_GET['submit'])){
  $roll=$_GET['roll'];

  $sql=mysqli_query($link,"SELECT * FROM studdetails WHERE rollno='$roll'");
  $c=mysqli_num_rows($sql);
  if($c!=0){
  $row=mysqli_fetch_array($sql);

echo "<form method='post' id='reg-form'>";
echo "<div><input type='text' name='rollno' value=".$row['rollno']." ></div>";
echo "<div><input type='text'  name='name'  value=".$row['name']."></div>";
echo "<div><input type='text'  name='gen'  value=".$row['gender']."></div>";
echo "<div><input type='text' name='phone'  value=".$row['phone']."></div>";
echo "<div><input type='text' name='email'  value=".$row['email']."></div>";

echo "<div><input type='submit' min=1 max=100 class='button' name='add' value='add'></div>";
echo "</form>";

if(isset($_POST['add'])){


 $name=$_POST['name'];
 $gen=$_POST['gen'];
 $ph=$_POST['phone'];
$email=$_POST['email'];
$sql1="UPDATE studdetails SET name='$name',gender='$gen',phone=$ph ,email='$email' WHERE rollno=$roll"; 
  $res1=mysqli_query($link,$sql1);
  echo "<script>alert('You have updated the data successfully')</script>";
}

}
else{
  echo "<script>alert('The data does not exixts')</script>";
}}