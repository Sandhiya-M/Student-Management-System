<!DOCTYPE html>
<html>
<head>
  <title>Upload</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://smtpjs.com/v3/smtp.js"></script>
  <script type="text/javascript">
    function sendEmail() {
      var email=document.getElementById('em').value;
 
  Email.send({
  Host: "smtp.gmail.com",
  Username : "trendytechs2021@gmail.com",
  Password : "sss@2021",
  To : email,
  From : "trendytechs2021@gmail.com",
  Subject : "Results are Uploaded!!",
  Body : "Dear parents,we have uploaded the marks please check out our website!!!<br> <a href='#'>Click here</a>",
  }).then(
    message => alert("mail sent successfully")
  );

    }
  </script>
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
  $sql=mysqli_query($link,"SELECT * FROM exmdet");
    echo "<h1>X_A</h1>";

}
elseif ($db=='tenb.php') {
  include "tenb.php";
  $sql=mysqli_query($link,"SELECT * FROM exmdet");
    echo "<h1>X_B</h1>";
}
 

echo "<div class='main'>
      <div class='one'  >
        <div class='register' style='background-color: pink;'>
          
            <div>";
echo"            
<form method='get'  id='reg-form'>";
echo"  <div><input type='text' name='roll' placeholder='rollno' required><br></div>";
echo " SELECT THE EXAM:<br>";
while($row=mysqli_fetch_array($sql)){
echo "<input type='radio' name='em' required value=" .$row['ename'] .">".$row['ename']."<br>";
}
echo "<input type='submit' class='button' name='submit' value='check'><br></form></div>";

if(isset($_GET['submit'])){
  $roll=$_GET['roll'];
  $em=$_GET['em'];
  $re=mysqli_query($link,"SELECT * FROM studdetails WHERE rollno='$roll'");
    $c1=mysqli_num_rows($re);
    if($c1!=0){
  $email=mysqli_fetch_array($re);
  $sender=$email['email'];}
  $sql=mysqli_query($link,"SELECT rollno,name FROM studdetails WHERE rollno='$roll'");
  $c=mysqli_num_rows($sql);
  if($c!=0){
  $row=mysqli_fetch_array($sql);

  $name=$row['name'];
echo "<form method='post' id='reg-form'>";
echo "<div><input type='text' name='rollno' value=".$row['rollno']." ></div>";
echo "<div><input type='text'  name='name'  value=".$row['name']."></div>";
echo "<div><input type='text'  name='name'  id='em' value=".$sender."></div>";

echo "<div><input type='number' required min=1 max=100 name='tam'  placeholder='Tamil'></div>";
echo "<div><input type='number' required  min=1 max=100 name='eng' placeholder='English'></div>";
echo "<div><input type='number'  required min=1 max=100 name='mat' placeholder='Mathematics'></div>";
echo "<div><input type='number' required  min=1 max=100 name='sci' placeholder='Science'></div>";
echo "<div><input type='number'  required min=1 max=100 name='ss' placeholder='Social Studies'></div>";
echo "<div><input type='submit' class='button' name='add' value='add'></div>";
echo "<div><input  type='button' class='button' onclick='sendEmail();' value='SEND'></div>";
echo "</form>";


if(isset($_POST['add'])){

$tam=$_POST['tam'];
$eng=$_POST['eng'];
$mat=$_POST['mat'];
$sci=$_POST['sci'];
$ss=$_POST['ss'];
$tot=$tam+$eng+$mat+$sci+$ss;
$avg=$tot/5;


$sql1="SELECT * FROM  $em WHERE Rollno='$roll'"; 
  $res1=mysqli_query($link,$sql1);
  $cout=mysqli_num_rows($res1);

  if ($cout==0){

  $sql="INSERT INTO $em VALUES('$roll','$name',$tam,$eng,$mat,$sci,$ss,$tot,$avg)";
  $res=mysqli_query($link,$sql);
   echo "<script>alert('You have the data successfully')</script>";
}

  else{
    
    echo "<script>alert('You have already updated this rollno mark')</script>";
  }

}

}
else{
  echo "<script>alert('The rollno you entered does not exixts please ckeck the class list')</script>";
}}
?>

</div>