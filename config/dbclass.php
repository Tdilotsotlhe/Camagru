<?php

include "database.php";
$DB_DSN = 'mysql:host=localhost';
$DB_USER = "root";
$DB_PASS = "adambogas123";
$DB_NAME = "camagru;charset=utf8mb4";
$options = [
    // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
  ];
$dbh = NULL;
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

class DB
    {
        private static $_instance = null;
        private $_pdo,
                $_query,
                $_error = false,
                $_results,
                $_count = 0;

        private function __construct()
        {
            $DB_DSN = 'mysql:host=localhost';
            $DB_USER = "root";
            $DB_PASS = "adambogas123";
            $DB_NAME = "camagru;charset=utf8mb4";
           
            try
            {
                $this->_pdo = new PDO($DB_DSN.";dbname:".$DB_NAME, $DB_USER, $DB_PASS);
               
                $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->_pdo;

            }
            catch (PDOException $e)
            {
                die($e->getMessage());
            }
        }

        public static function getInstance()
        {
            if (!isset(self::$_instance)) {
                self::$_instance = new DB();
            }
            return (self::$_instance);
        }

}

?>