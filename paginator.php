<?php
// Make the script run only if there is a page number posted to this script
if(isset($_POST['pn'])){
	$rpp = preg_replace('#[^0-9]#', '', $_POST['rpp']);
	$last = preg_replace('#[^0-9]#', '', $_POST['last']);
	$pn = preg_replace('#[^0-9]#', '', $_POST['pn']);
	// This makes sure the page number isn't below 1, or more than our $last page
	if ($pn < 1) { 
    	$pn = 1; 
	} else if ($pn > $last) { 
    	$pn = $last; 
	}
	// Connect to our database here
    include_once("config/database.php");
    

    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query("USE ".$DB_NAME);
	// This sets the range of rows to query for the chosen $pn
	$limit = 'LIMIT ' .($pn - 1) * $rpp .',' .$rpp;
	// This is your query again, it is for grabbing just one page worth of rows by applying $limit
	$sql = "SELECT img_id, img_name FROM gallery ORDER BY uptime DESC $limit";
	$dataString = '';
	$stmt = $dbh->prepare($sql);
    if($stmt->execute()){
      
      while($row = $stmt->fetch()){ 
		$id = $row["img_id"];
		$imgname = $row["img_name"];
		$dataString .= $id.'|'.$imgname;
	}
	// Close your database connection
   // mysqli_close($db_conx);
	// Echo the results back to Ajax
	echo $dataString;
	exit();
}





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

          echo "<img id=".$row['img_id']." onclick='imageFoc(this.id)' class='thumbs' src='img/gal/".$row['img_name']."' heighty='100px' width='100px'>";
      }
    }
 } catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
 }  
//echo "<div><img src='||||' height='50px' width='50px'></div>";

}
?>