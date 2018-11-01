<?php

require_once "../config/database.php";

$xml = file_get_contents('php://input');
$res = explode('&', $xml);
print_r($res);
echo "<br>";

$myArray;
foreach ($res as $key => $val)
{
   // echo "<br>";
    $g = explode('=',$val);
   // echo $g[1];
    $myArray[] = $g[1];
    echo "<br>"; 
}
print_r($myArray);

function setlogin($row)
{
  $_SESSION['uid'] = $row['user_id'];
  $_SESSION['username'] = $row['username'];
}

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }
  
   try {
    $dbh->query("USE ".$DB_NAME);
  } catch (Exception $e) {
     die("db creation failed!");
  } 
  
    try { 
      $stmt = $dbh->prepare("SELECT * FROM users WHERE username=?");
      if($stmt->execute([$myArray[0]])){
        
        while($row = $stmt->fetch()){ 
           
         
             if (strcmp($row['username'], $myArray[0]) == 0 && $row && password_verify($myArray[1], $row['passw']))
            {
            
                setlogin($row);
                header("Location: ../index.php?welcome=1");
            } 
            else 
            {
              echo header("Location: ../index.php?la=0");
            }
        }
      }
   } catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }  

?>