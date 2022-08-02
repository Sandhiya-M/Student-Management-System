<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Result</title>
  <style type="text/css">
    div{
     
      background-color: snow;
      font-size: 20px;
    }
    table{
      align-self: center;

    }
  </style>
</head>
<body>




<?php
  	$roll=$_POST['roll'];
    $em=$_POST['exam'];
    $cl=$_POST['class'];
    if($cl=='tena'){
  	include "tena.php";}
    elseif ($cl=='tenb') {
     include "tenb.php";
    }
     $tammax=mysqli_fetch_array(mysqli_query($link,"SELECT max(Tamil) FROM $em "));
     $engmax=mysqli_fetch_array(mysqli_query($link,"SELECT max(English) FROM $em"));
     $matmax=mysqli_fetch_array(mysqli_query($link,"SELECT max(Maths) FROM $em"));
     $scimax=mysqli_fetch_array(mysqli_query($link,"SELECT max(Science) FROM $em"));
     $ssmax=mysqli_fetch_array(mysqli_query($link,"SELECT max(Social) FROM $em")); 
     $totmax=mysqli_fetch_array(mysqli_query($link,"SELECT max(Total) FROM $em"));

  	$sql="SELECT * FROM $em WHERE Rollno='$roll'";
  	$res=mysqli_query($link,$sql);
    $c=mysqli_num_rows($res);
    if ($c!=0){
      	$row=mysqli_fetch_array($res);

       
  
$rnk="SELECT Total,Name,Rollno,ROW_NUMBER() OVER(ORDER BY Total desc) RowNumber FROM $em ; ";
    $res=mysqli_query($link,$rnk);
    $fn=mysqli_fetch_array($res);   

     if($fn['Name']==$row['Name']){
   $rank=$fn['RowNumber'];}

while ( $fn=mysqli_fetch_array($res)){
    if($fn['Name']==$row['Name']){ 
     $rank=$fn['RowNumber'];}}  
echo"<h1 style='text-align: center;'>YOUR  ".$em."  RESULTS</h1>";

    echo "<div><center><table frame='box' rules='all' width='500'>";
    
  echo "<tr><td>Rollno</td>";
  echo "<td>".$row['Rollno']."</td></tr>";

  echo "<tr><td>Name</td>";
  echo "<td>".$row['Name']."</td></tr>";

  echo "<tr><td>Tamil</td>";
  echo "<td>".$row['Tamil']."</td></tr>";

  echo "<tr><td>English</td>";
  echo "<td>".$row['English']."</td></tr>";
  
  echo "<tr><td>Science</td>";
  echo "<td>".$row['Science']."</td></tr>";

  echo "<tr><td>Social Studies</td>";
  echo "<td>".$row['Social']."</td></tr>";

  echo "<tr><td>Mathematics</td>";
  echo "<td>".$row['Maths']."</td></tr>";

  echo "<tr><td style='font-size:30px;  background-color:hotpink;'>Total:</td>";
  echo "<td style='font-size:40px;  background-color:hotpink;'>".$row['Total']."</td></tr>";

  echo "<tr><td style='font-size:30px; background-color:hotpink;'>Percentage:</td>";
  echo "<td style='font-size:40px;  background-color:hotpink;'>".$row['Percentage']."</td></tr>";
  
  echo "<tr><td style='font-size:30px; background-color:hotpink;'>Rank:</td>";
  echo "<td style='font-size:40px;  background-color:hotpink;'>".$rank."</td></tr></div></table>";



 
  echo " If any query please contact your class teacher<hr>";

  echo "<br><br><br><br><br><br>";
  echo "<h1>Class Highest Score</h1>";
  echo "<div><center><table frame='box' rules='all' width='500'>";

  echo "<tr style='background-color:skyblue;'><td>Tamil</td>";
  echo "<td>".$tammax[0]."</td></tr>";

  echo "<tr style='background-color:skyblue;'><td>English</td>";
  echo "<td>".$engmax[0]."</td></tr>";
  
  echo "<tr style='background-color:skyblue;'><td>Science</td>";
  echo "<td>".$scimax[0]."</td></tr>";

  echo "<tr style='background-color:skyblue;'><td>Social Studies</td>";
  echo "<td>".$ssmax[0]."</td></tr>";

  echo "<tr style='background-color:skyblue;'><td>Mathematics</td>";
  echo "<td>".$matmax[0]."</td></tr>";

  echo "<tr style='background-color:hotpink;'><td>Total:</td>";
  echo "<td >".$totmax[0]."</td></tr></table><hr>";

echo "<a href='rank.php?exam=$em&cl=$cl'>To see the class rank list Click here</a>"; }


else{
 echo"<h1 style='text-align: center;color:red'>!!!!!YOUR RESULTS ARE NOT YET PUBLISHED!!!!!!</h1>";
 echo "<h2 style='text-align: center;'>Check Your Rollno/Class .If any Query Please contact your Class teacher</h2>";
}
?>
</body>
</html>