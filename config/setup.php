<?php

echo "TF";

require_once "database.php";

//echo $DB_NAME;
try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

///////////

///////////

//create DB
try {
    $dbh->query("CREATE DATABASE IF NOT EXISTS ".$DB_NAME);
 } catch (Exception $e) {
     die("db creation failed!");
 }

 //select DB
 try {
    $dbh->query("USE ".$DB_NAME);
 } catch (Exception $e) {
     die("db creation failed!");
 } 
 
 //create user table
 try {
    $dbh->query("CREATE TABLE `users` (
        `user_id` int(255) NOT NULL,
        `username` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `email` int(255) NOT NULL,
        `active` int(255) DEFAULT '0',
        `ugroup` int(255) NOT NULL DEFAULT '0'
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
 } catch (Exception $e) {
     die("db creation failed!");
 } 
//create gallery table
 try {
    $dbh->query("CREATE TABLE `camagru`.`gallery` ( `img_id` INT(255) NOT NULL AUTO_INCREMENT , `img_name` VARCHAR(255) NOT NULL , `img_blob` LONGBLOB NOT NULL , `users_id` INT(255) NOT NULL , `com_uid` INT(255) NOT NULL , `commtime` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) , PRIMARY KEY (`img_id`), INDEX (`users_id`), INDEX (`com_uid`)) ENGINE = InnoDB;");
 } catch (Exception $e) {
     die("db creation failed!");
 }

 //create comments table
 try {
    $dbh->query("CREATE TABLE `camagru`.`comments` ( `comms_id` INT(255) NOT NULL AUTO_INCREMENT , `owners_id` INT(255) NOT NULL , `friend_id` INT(255) NOT NULL , `comment` VARCHAR(255) NOT NULL , `comtstamp` TIMESTAMP(6) NOT NULL , `img_id` INT(255) NOT NULL , PRIMARY KEY (`comms_id`), INDEX (`owners_id`), INDEX (`friend_id`), INDEX (`img_id`)) ENGINE = InnoDB;");
 } catch (Exception $e) {
     die("db creation failed!");
 }

?>