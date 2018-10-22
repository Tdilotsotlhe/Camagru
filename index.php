<?php
include "config/database.php";
include "functions/load.php";
/* $_SESSION['test'] = "SHIT!";
echo $_SESSION['test']; */
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
            echo "WELCOME BACK MADA EFFER";
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
