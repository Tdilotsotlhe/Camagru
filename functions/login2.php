<?php

require_once "../config/database.php";

/* echo $_POST['uname'];
echo $_POST['pwrd']; */

$user = $_POST['uname'];
$pwrd = $_POST['pwrd']; 

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
      if($stmt->execute([$user])){
        
        if($row = $stmt->fetch()){ 
        //  var_dump(simplexml_load_string($unser));
        
       
             if (strcmp($row['username'], $user) == 0 && $row && password_verify($pwrd, $row['passw']))
            {
            
                setlogin($row);
                echo "Welcome ".$row['username']; 
              } 
            else if (strcmp($row['username'], $user) != 0)
            {
              echo "Login failed NIGGER"; 
            }else{
              echo "Login failed NIGGER2"; 
            }
        }else{
          echo "No results sdkjghskdjhgkjdshgkjhds";
        }
      }
   } catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }

?>