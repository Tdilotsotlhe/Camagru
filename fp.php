
<?php
/* 

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
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/prof.js"></script>
    <title>Camagru: Forgot Password</title>
</head>
<body>
<div class="w3-container">

<label>New Password</label>
<input class="w3-input" type="password" id="newpass11" required>
<br>
<label>Re-type Password</label>
<input class="w3-input" type="password" id="newpass22" required>
<p><button id="cpass" type="button" class="w3-btn w3-padding w3-theme" style="width:120px">Send &nbsp; ❯</button></p>
<br>

</div>
    
</body>
<script>

window.onload = function(){
    
    document.getElementById("cpass").addEventListener("click", function(){
        var p1 = document.getElementById("newpass11").value;
        var p2 = document.getElementById("newpass22").value;
        forgotpassword(p1,p2);
    });
}
function forgotpassword(pass1, pass2){


   if (pass1.localeCompare(pass2,'en', {sensitivity: 'variant'}) == 1){
        alert("1");
   }else{
       alert("0!");
   }
  // pass1.localeCompare(pass2, 'en', {sensitivity: 'variant'})

}
</script>

</html>