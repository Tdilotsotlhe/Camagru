<?php
    
pgaltest();
function pgaltest(){
/*     $DB_DSN = 'mysql:host=localhost';
    $DB_USER = "root";
    $DB_PASS = "adambogas123";
    $DB_NAME = "camagru"; */



$xml = file_get_contents('php://input');
//$res = explode('&', $xml);
/* print_r($res); */


        include "config/database.php";
        
        ///put in function
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
            die("db selection failed!");
        } 

        try { 
            $stmt = $dbh->prepare("SELECT * FROM gallery WHERE users_id=? ORDER BY uptime DESC");
            if($stmt->execute([$_SESSION['uid']])){
            
            while($row = $stmt->fetch()){ 
                
                //echo $row["img_name"];

                echo "<img id=".$row['img_id']." onclick='imageFoc(this.id)' class='w3-round' src='img/gal/".$row['img_name']."' heighty='100px' width='100px'>";
            }
            }
        } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        }  
        //echo "<div><img src='||||' height='50px' width='50px'></div>"; 
    }

?>