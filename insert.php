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
  echo "<h1>X_A</h1>";
}
elseif ($db=='tenb.php') {
  include "tenb.php";
    echo "<h1>X_B</h1>";
}

echo"
<div class='main'>
      <div class='one'  >
        <div class='register' style='background-color: pink;'>";
    

echo "<form method='post' id='reg-form'>";
echo "<div><input type='text' placeholder='Rollno' name='rollno'></div>";
echo "<div><input type='text' placeholder='Name' name='name'></div>";
echo "<div><input type='text' placeholder='Gender' name='gen' ></div>";
echo "<div><input type='text' placeholder='Phone' name='phone'></div>";
echo "<div><input type='text' name='email'  placeholder='email'></div>";
echo "<div><input type='submit'  class='button' name='add' value='INSERT'></div>";
echo "</form>";

if(isset($_POST['add'])){
$roll=$_POST['rollno'];

 $name=$_POST['name'];
 $gen=$_POST['gen'];
 $ph=$_POST['phone'];
$sql=mysqli_query($link,"SELECT * FROM studdetails WHERE rollno='$roll'");
$c=mysqli_num_rows($sql);
if($c==0){
$sql1="INSERT INTO studdetails VALUES('$roll','$name','$gen',$ph)";
  $res1=mysqli_query($link,$sql1);
  echo "<script>alert('You have updated the data successfully')</script>";
}
else{
    echo "<script>alert('The rollno already exists!!!Give an unique rollno!!')</script>";

}
}