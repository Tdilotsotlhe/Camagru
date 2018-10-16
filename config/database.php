<?php
$DB_DSN = 'mysql:host=localhost';
$DB_USER = "root";
$DB_PASS = "adambogas123";
$DB_NAME = "camagru";
$options = [
    // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
  ];
$dbh = NULL;
session_start();
?>