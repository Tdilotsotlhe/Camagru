<?php
    require_once "config/database.php";
    $xml = file_get_contents('php://input');


    
    $res = explode('%', $xml);
    $data = explode( ',', $res[0]);
    $test = base64_decode($data[1]);
    $newimgname = rand(1,999);
    $user_id = $_SESSION['uid'];
    file_put_contents("img/gal/".$user_id."%".$newimgname.".png", $test);
    $dest= imagecreatefrompng("img/gal/".$user_id."%".$newimgname.".png");
    $src = imagecreatefrompng($res[1]);
    $width = ImageSx($src);
    $height = ImageSy($src);
    $x = $width/4; $y = $height/4;
    ImageCopyResampled($dest,$src,0,0,0,0,$x,$y,$width,$height); 
    imagepng($dest, "img/gal/".$user_id."%".$newimgname.".png");

    ////upload to DB
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
         die("db creation failed!");
      } 
      
        try { 
      
          $sql = "INSERT INTO gallery (img_name, users_id) VALUES (:pic, :usid)";
          $stmt= $dbh->prepare($sql);
          $stmt->bindParam(':username', $user);
          $stmt->bindParam(':passw', $pass);
      
          $stmt->execute();
          sendVerify($email, $acthash);
      
         
       } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
       }  

   
   ?>

