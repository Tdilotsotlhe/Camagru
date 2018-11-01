<?php
 
include "functions/load.php";

if(isset($_GET['welcome']))
{
    echo "<script>alert('login successful')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="new.css" />
    <script src="js/myjs.js"></script>
<!--     <script src="js/myajax.js"></script> -->
</head>
<body background="img/bg/15.jpg" onload="changeActive();">
<div class="wrapper">
<?php
    include "includes/header.php";
?>
  <article class="main">
    <?php
        if(isset($_SESSION['uid']))
        {
            //echo "WELCOME BACK MADA EFFER";
            include "functions/afuncs.php";
           // pgaltest();
            // loadGallery2();
            echo "<script>privategal();</script>";
        }
        else{
            loadLogin();
        }

    ?>
  
  
  </article>
  <aside class="aside aside-1"><?php if(isset($_SESSION['uid'])){ loadMenu();}    ?></aside>
  <aside class="aside aside-2"> </aside>
  <footer class="footer">CAMAGRU TDILOTSO</footer>
</div>


</body>
</html>
