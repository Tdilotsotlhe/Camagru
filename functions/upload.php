<?php
$target_dir = "../img/gal/";
$target_file = $target_dir . basename($_FILES["userpic"]["name"]);
$uploadOk = 1;
var_dump($_FILES);
//var_dump($_POST);
exit();
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["userpic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["userpic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["userpic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["userpic"]["name"]). " has been uploaded.";
        //run insert to DB function right here
        
        
        insertUserpic($_FILES["userpic"]["name"], $imageFileType);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

function    renamepic($oldname, $ftype)
{
  //  echo $oldname;
    //echo $ftype;
    $uid = $_SESSION['uid'];
    $newname = $uid."$".$oldname;
    rename("../img/gal/".$oldname, "../img/gal/".$newname);
    return ($newname);
}

function    insertUserpic($filename, $ftype)
{
    include "../config/database.php";

    $upname = renamepic($filename, $ftype);

    $fname =  $filename;
    $theid = $_SESSION['uid'];

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
       // echo "yes";
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
    $fname =  $upname;
    $theid = $_SESSION['uid'];
    echo $fname;
    echo $theid;
    $sql = "INSERT INTO camagru.gallery (img_name, users_id) VALUES (:img_name, :users_id)";
    $stmt= $dbh->prepare($sql);
    $stmt->bindParam(':img_name', $fname);
    $stmt->bindParam(':users_id', $theid);

    $stmt->execute();
    //header("Location: ../index.php?reg=1");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
}


?>



