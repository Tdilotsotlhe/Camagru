<?php
    require_once "config/database.php";
/*     $data = explode( ',', $_POST["img64"] );
    $emo = $_POST['emoji64']; */

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
    //$ogimg = document.getElementById("img64").value;
    //$newimg = document.getElementById("emoji64").value;


        //change $data back to array
    $test = base64_decode($myArray[1]);

    echo $emo;
    $user_id = $_SESSION['uid'];

    file_put_contents("img/gal/".$user_id."1.png", $test);


    $dest= imagecreatefrompng("img/gal/".$user_id."1.png");
    $src = imagecreatefrompng($myArray[3]);
    $width = ImageSx($src);
    $height = ImageSy($src);
    $x = $width/4; $y = $height/4;
    ImageCopyResampled($dest,$src,0,0,0,0,$x,$y,$width,$height);
    imagepng($dest, "img/gal/".$user_id."244.png");
   
   ?>

