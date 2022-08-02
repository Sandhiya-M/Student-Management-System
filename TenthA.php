<!DOCTYPE html>
<html>
<title>Dashboard</title>
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

<h2>Class:10_A</h2>
<h2>Section:A</h2>
<h2>Class Teacher:Prema</h2><hr>

<h3>Handling staffs</h3>
<table align="center" style="font-size: 20px;font-family: cursive;font-weight: 200; color:orangered; " frame="box" rules="all">
<tr>
<th>S.no</th>
<th>Subject</th>
<th>Subject teachers</th>
</tr>
<tr>
<td>1</td>
<td>Tamil</td>
<td>Prema M</td>
</tr>
<tr>
	<td>2</td>
<td>English</td>
<td>Joseph J</td>
</tr>
<tr>
	<td>3</td>
<td>Mathematics</td>
<td>Balaji M</td>
</tr>
<td>4</td>
<td>Science</td>
<td>Jayanthi R</td>
</tr>
<td>5</td>
<td>Social Studies</td>
<td>Racheal R</td>
</tr>
</table><hr><br>
<h3>Students of the class X-A</h3>
<table align="center" style="font-size: 20px;font-family: cursive;font-weight: 200; color:blueviolet; " frame="box" rules="all" width="800"><tr><th>Rollno</th><th>Name</th><th>Gender</th><th>Phone</th></tr>

<?php
session_start();
$_SESSION['db']='tena.php';
include "tena.php";
$sql="SELECT * FROM studdetails";
$res=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($res)){
	
	echo "<tr>";
	echo "<td>".$row['rollno']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['gender']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo "</tr>";
}
?>
</div>
</body>
</html>





