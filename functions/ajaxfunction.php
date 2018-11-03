<?php

if (isset($_POST['thumby']))
{
    loadthumbs();
}
if (isset($_POST['homegal']))
{
    loadGal();
}
if (isset($_POST['imgid']))
{
    comment();
}


function loadGal()
{
    include "../config/database.php";
    

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "yes";
      } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
      }
      
     
       //select DB
       try {
        $dbh->query("USE ".$DB_NAME);
      } catch (Exception $e) {
         die("db selection failed!");
      } 

    try { 
        $stmt = $dbh->prepare("SELECT * FROM gallery WHERE users_id=? ORDER BY uptime DESC");
        if($stmt->execute([$_SESSION['uid']])){
          
          while($row = $stmt->fetch()){ 
             
              //echo $row["img_name"];

              echo "<img id=".$row['img_id']." onclick='imageFoc(this)' class='thumbs' src='img/gal/".$row['img_name']."' heighty='100px' width='100px'>";
          }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}




function loadthumbs()
{
    include "../config/database.php";
    

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "yes";
      } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
      }
      
     
       //select DB
       try {
        $dbh->query("USE ".$DB_NAME);
      } catch (Exception $e) {
         die("db selection failed!");
      } 

    try { 
        $stmt = $dbh->prepare("SELECT * FROM gallery WHERE users_id=? ORDER BY uptime DESC");
        if($stmt->execute([$_SESSION['uid']])){
          
          while($row = $stmt->fetch()){ 
             
              //echo $row["img_name"];

              echo "<div><img id=".$row['img_id']." onclick='imageFoc(this)' class='thumbs' src='img/gal/".$row['img_name']."' heighty='100px' width='100px'></div>";
          }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}

function comment()
{
    include "../config/database.php";
    

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "yes";
      } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
      }
      
     
       //select DB
       try {
        $dbh->query("USE ".$DB_NAME);
      } catch (Exception $e) {
         die("db selection failed!");
      } 

    try { 
        $imgid = $_POST['imgid'];
        $stmt = $dbh->prepare("SELECT
        *
    FROM
        gallery
    LEFT OUTER JOIN comments ON img_id = comimg_id
    WHERE
        img_id =?");
        if($stmt->execute([$imgid])){
          
          $row = $stmt->fetchAll();
             
          $retstring = $row[1]["comment"];
        

              echo "<div id='commdiv'>
              <img id=".$row[0]['img_id']." class='thumbs' src='img/gal/".$row[0]['img_name']."' heighty='100px' width='100px'>
              <br >
              <input type='text' id='comtxt'>
              <br >
             
             "; 
                           
              foreach ($row as $key => $value) {
                  if ($value["comment"] == NULL)
                  {
                      break;
                  }
                  else
                  {
                    echo "<p>".$value["comment"]."</p>";
                  }
            }
            echo  " <button onclick='newCom(".$_SESSION['uid'].",".$row[0]['img_id'].")'>Comment</button> </div>";
          
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}




/* function loadthumbs()
{
    include "../config/database.php";
    

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "yes";
      } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
      }
      
     
       //select DB
       try {
        $dbh->query("USE ".$DB_NAME);
      } catch (Exception $e) {
         die("db selection failed!");
      } 

    try { 
        $stmt = $dbh->prepare("SELECT * FROM gallery WHERE imag_id=?");
        if($stmt->execute([$_SESSION['uid']])){
          
          while($row = $stmt->fetch()){ 
              echo "<div><img id=".$row['img_id']." onclick='imageFoc(this)' class='thumbs' src='img/gal/".$row['img_name']."' heighty='100px' width='100px'></div>";
          }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}
 */


?>