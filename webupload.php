<?php
    require_once "config/database.php";
    $data = explode( ',', $_POST["img64"] );
    $emo = $_POST['emoji64'];
    $test = base64_decode($data[1]);

    echo $emo;
    $user_id = $_SESSION['uid'];

    file_put_contents("img/gal/".$user_id."1.png", $test);


    $dest= imagecreatefrompng("img/gal/".$user_id."1.png");
    $src = imagecreatefrompng($emo);
    $width = ImageSx($src);
    $height = ImageSy($src);
    $x = $width/4; $y = $height/4;
    ImageCopyResampled($dest,$src,0,0,0,0,$x,$y,$width,$height);
    imagepng($dest, "img/gal/".$user_id."244.png");
   
   ?>

