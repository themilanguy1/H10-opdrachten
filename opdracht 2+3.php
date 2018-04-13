<?php
include 'connect.php';
 
$agent = $_SERVER['HTTP_USER_AGENT'];
 
if(preg_match('/Linux/i',$agent)) $os = 'Linux';
  elseif(preg_match('/Mac/i',$agent)) $os = 'Mac'; 
  elseif(preg_match('/iPhone/i',$agent)) $os = 'iPhone'; 
  elseif(preg_match('/iPad/i',$agent)) $os = 'iPad'; 
  elseif(preg_match('/Droid/i',$agent)) $os = 'Droid'; 
  elseif(preg_match('/Unix/i',$agent)) $os = 'Unix'; 
  elseif(preg_match('/Windows/i',$agent)) $os = 'Windows';
  else $os = 'Unknown';
 
if(preg_match('/Firefox/i',$agent)) $br = 'Firefox'; 
  elseif(preg_match('/Mac/i',$agent)) $br = 'Mac';
  elseif(preg_match('/Chrome/i',$agent)) $br = 'Chrome'; 
  elseif(preg_match('/Opera/i',$agent)) $br = 'Opera'; 
  elseif(preg_match('/MSIE/i',$agent)) $br = 'IE'; 
  else $bs = 'Unknown';

  echo $agent."<br><br>";
  echo "Je Internet browser: $br"."<br>";
  echo "Je besturingssysteem: $os";
  echo "<br><br>";



  $sql = "INSERT INTO ZUCC (browser, os)
  VALUES ('$br','$os')";
  
  if ($conn->query($sql) === TRUE) {

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $sql2 = "SELECT browser, COUNT(browser) as count FROM ZUCC GROUP BY browser";
  $result = $conn->query($sql2);



  if ($result->num_rows > 0) {
      echo "<table> <th>browser</th> <th>bezoeken</th>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['browser']."</td>";
        echo "<td>".$row['count']."</td></tr>";
    }
    echo "<table>";
} else {
    echo "0 results";
}
  
  ?>
