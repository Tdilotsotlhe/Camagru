<?php
    require_once "config/database.php";
    //$xml = file_get_contents('php://input');
 /*    var_dump($_POST);
    exit(); */

    

    $newimgname = rand(1,999);
    $user_id = $_SESSION['uid'];


  ////////////////
  $data = explode( ',', $_POST["img64"] );
    $test = base64_decode($data[1]);
    
    file_put_contents("img/gal/".$user_id."$".$newimgname.".png", $test);
    $dest= imagecreatefrompng("img/gal/".$user_id."$".$newimgname.".png");
echo "OK<img src=";
echo "img/gal/".$user_id."$".$newimgname.".png>";
    if(!empty($_POST["emoji64"]))
    {
        $emo = explode ('camagru/',$_POST["emoji64"]);   
        $src = imagecreatefrompng($emo[1]);
        $width = ImageSx($src);
        $height = ImageSy($src);
        pic_position($emo);
        ImageCopyResampled($dest,$src,$pos2,$pos1,0,0,$x,$y,$width,$height);
    }
    
    if(!empty($_POST["emoji64_2"]))
    {
        $emo2 = explode ('camagru/',$_POST["emoji64_2"]);
        $src = imagecreatefrompng($emo2[1]);
        $width = ImageSx($src);
        $height = ImageSy($src);
        pic_position($emo2);
        ImageCopyResampled($dest,$src,$pos2,$pos1,0,0,$x,$y,$width,$height);
    }
    
    imagepng($dest, "img/gal/".$user_id."$".$newimgname.".png");




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
          $stmt->bindParam(':usid', $user_id);
          $picname = $user_id."$".$newimgname.".png";
          $stmt->bindParam(':pic', $picname);
      
          $stmt->execute();
         
       } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
       }  


       ////picPos switch
       function pic_position($emo)
    {
        global $x, $y, $width, $height, $pos1, $pos2;

        switch ($emo[1])
        {
            case "img/emojis/1.png" :
                $pos1 = 10;
                $pos2 = 10;
                $x = $width/5; $y = $height/5;
                break;
            case "img/emojis/2.png" :
                $pos1 = 10;
                $pos2 = 200;
                $x = $width/5; $y = $height/5;
                break;
            case "img/emojis/3.png" :
                $pos1 = 10;
                $pos2 = 400;
                $x = $width/5; $y = $height/5;
                break;
            case "img/emojis/4.png" :
                $pos1 = 100;
                $pos2 = 10;
                $x = $width/5; $y = $height/5;
                break;
        }
    }
   
   ?>

