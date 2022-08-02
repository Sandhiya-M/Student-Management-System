<title>Rank board</title>
<?php 
$s=$_GET['exam'];
$cl=$_GET['cl'];
if($cl=='tena'){

include "tena.php";
}
elseif ($cl=='tenb') {
  
include "tenb.php";
}


$rnk="SELECT Total,Name,Rollno,ROW_NUMBER() OVER(ORDER BY Total desc) RowNumber FROM $s";
    $res=mysqli_query($link,$rnk);
    $fn=mysqli_fetch_array($res);

echo "<br><br><br><br><br><br>";
  echo"<center><h1>RANK LIST OF THE CLASS</h1>";

     echo "<div><center><table frame='box' rules='all' width='1000' style='font-size:30px'>";
     echo "<tr style='font-weight:bold'><th>Name</th><th>Mark</th><th>Rank</th></tr>";
      
      
        echo "<tr>";
      echo "<td >".$fn['Name']."</td>";
      echo "<td>".$fn['Total']."</td>";
      echo "<td>".$fn['RowNumber']."</td>";
      
     
 while ( $fn=mysqli_fetch_array($res)){
      
    
      echo "<tr>";
      echo "<td>".$fn['Name']."</td>";
      echo "<td>".$fn['Total']."</td>";
      echo "<td>".$fn['RowNumber']."</td>";
      echo "</tr>";
    }

echo "</table>";
?>