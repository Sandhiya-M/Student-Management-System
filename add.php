<!DOCTYPE html>
<html>
<head>
  <title>Add</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="upload.css">
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
}
elseif ($db=='tenb.php') {
  include "tenb.php";
  echo "<center style='font-size:30px'><h1>X_B</h1>";
} 
?>





<!DOCTYPE html>
<html>

  <title>Adding examdetails</title>
  <link rel="stylesheet" type="text/css" href="upload.css">
<body>
  <center>
  <form method='post'>
    <div>
    <input type='text' name='exmname' placeholder="EXAM NAME" required=""></div>
    <div>
      <input type="text" name="date" placeholder="DD-MM-YYYY" required="">
    </div>
    <div>
      <input type="text" name="inv" placeholder="invigilation staff" required="">
    </div>
    <div><input type='submit' name="suub"></div>

  </form>
  </center>
  <?php

  if(isset($_POST['suub'])){
    $n=$_POST['exmname'];
    $d=$_POST['date'];
    $i=$_POST['inv'];
    $sql=mysqli_query($link,"SELECT * FROM exmdet WHERE ename='$n'");
    $c=mysqli_num_rows($sql);
    if($c==0){
      $sql1=mysqli_query($link,"INSERT INTO exmdet VALUES('$n','$d','$i')");
      echo "<script>alert('Your exam data have been added successfully!!!!!')</script>";

    }
    else{
           echo "<script>alert('You have already added this exam please check!!!!!')</script>";
 
    }
  }

  ?>
  
</body>