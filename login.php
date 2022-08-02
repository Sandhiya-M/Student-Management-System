<?php
include "s_connection.php";
if(isset($_POST['submit'])){
$user=$_POST['uname'];
$pass=$_POST['pwd'];

$cmt="SELECT * FROM tlogin WHERE username='$user'";
$res=mysqli_query($link,$cmt);
$row=mysqli_fetch_array($res);
if ($row['password']==''){
echo "<script>alert('Inavalid username')</script>";
}
else{
if($row['password']==$pass){
	if($row['class']=='10A'){
		echo "<script>window.open('TenthA.php')</script>";
	}
	else{
		echo "<script>window.open('TenthB.php')</script>";
   }
   }
 
else{
	echo "<script>alert('Inavalid password')</script>";
}
}
}
?>