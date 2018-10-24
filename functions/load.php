<?php

function loadGallery2()
{
    include "config/database.php";
    

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
        $stmt = $dbh->prepare("SELECT * FROM gallery WHERE users_id=? ORDER BY commtime DESC");
        if($stmt->execute([$_SESSION['uid']])){
          
          while($row = $stmt->fetch()){ 
             
              //echo $row["img_name"];

              echo "<img id=".$row['img_id']." onclick='imageFoc(this.id)' class='thumbs' src='img/".$row['img_name']."' heighty='100px' width='100px'>";
          }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}


function loadGallery()
{
    include "config/database.php";
    

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
        $stmt = $dbh->prepare("SELECT * FROM gallery WHERE users_id=?");
        if($stmt->execute([$_SESSION['uid']])){
          
          while($row = $stmt->fetch()){ 
             
              //echo $row["img_name"];
              echo "<div><img id=".$row['img_id']." onclick='imageFoc(this.id)' class='thumbs' src='img/".$row['img_name']."' height='50px' width='50px'></div>";
          }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}

function addPic()
{

}

function delPic()
{

}


function loadLogin()
{
    echo "<div class='logindiv' id='logindiv' style='border: solid black; margin:auto; display: block; padding: 5; width:300;'>
    <form id='login' action='functions/login.php' method='post'>
    <p>login>>></p>
    <hr>
        <p>Username</p><input type='text' name='uname' id='uname' placeholder='Enter Username' required>
        <br>
        <p>Password</p><input type='password' name='pwrd' id='pwrd' placeholder='Enter Password' required>
        <br>
        <button type='submit' id='logbut'>Login</button>
       
    </form>
    <hr>
        <button id='butreg' onclick='regtoggle()'>Register</button>
</div>

<div class='logindiv' id='regdiv' style='border: solid black; margin:auto; display: none; padding: 5; width:300;'>
    <form id='register' action='functions/register.php' method='post'>
        <p>Register>>></p>
        <hr>
        <p>Username</p><input type='text' name='uname1' id='uname1' placeholder='Enter Username' required>
        <br>
        <p>Password</p><input type='password' name='pwrd1' id='pwrd1' placeholder='Enter Password' required>
        <br>
        <p>Re-enter Password</p><input type='password2' name='pwrd2' id='pwrd2' placeholder='Enter Password' required>
        <br>
        <p>email</p><input type='email' name='email' id='email' placeholder='Enter email' required>
        <br>
        <button type='submit' id='regbut'>Register</button>
       
    </form>
    <hr>
        <button id='butlog' onclick='regtoggle()'>login</button>
</div>";
}

function loadMenu()
{
    
    echo "<button onclick='editprofile()'>Edit Profile</button><br>";
    echo "<button onclick='loadPrivGal()'>Private Gallery</button><br>";
    echo "<button onclick='loadPubGal()'>Public Gallery</button><br>";
    echo "<button onclick='accdel()'>Delete Account</button><br>";
    echo "<button onclick='logout()'>Logout</button>";
}
?>