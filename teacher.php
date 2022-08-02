<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Portal</title>
	<link rel="stylesheet" type="text/css" href="teacher.css">
</head>
<body style="background-color: black;">
<script type="text/javascript">
  function validate(){
    var a=document.getElementById('us').value;
    var b=document.getElementById('p').value;
    if(!a||!b){
      alert("enter all the fields");
    }
    }
    function show() {
  var x = document.getElementById("p");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php
  include "login.php";
  ?>
<form class="login" method="post">
  <h1>Admin Login</h1>
  <input type="text" name="uname" placeholder="username" id='us' required="">
  <input type="password" name="pwd" placeholder="password" id='p' required="">show password
   <input type="checkbox"  onclick="show();">
  <button type="submit" name="submit" onclick="validate();">Check</button><button style="margin-left: 200px;" onclick="window.open('home.html')">Back</button>
</form>

