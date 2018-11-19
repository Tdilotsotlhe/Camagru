<?php


require_once "config/database.php";

if(isset($_GET['act']))
{
    global $dbh, $DB_DSN, $DB_NAME, $DB_PASS, $DB_USER; 
    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
    $stmt = $dbh->prepare("UPDATE users SET active = 1 WHERE `acthash` = :acthash");
    $stmt->bindParam(':acthash',$_GET['act']);
    //$stmt->bindParam(':chngname',$_POST['newname']);
    if($stmt->execute()){
        header("Location: index.php?as=1");
    }else{
        header("Location: index.php?as=0");
    }
    } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
    }


}

?>