<?php

include "config/database.php";


/* $myfile = fopen("mydbsql", "r") or die("Unable to open file!");
echo fread($myfile,filesize("mydbsql"));
fclose($myfile); */
$newfile = file_get_contents("mydbsql");
//echo $newfile;
try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
try {
    $dbh->query($newfile);
 } catch (Exception $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
     die("db creation failed!");
 }



?>