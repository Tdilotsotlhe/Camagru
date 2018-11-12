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
    <style>
        * {
    box-sizing: border-box;
}
.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 15px;
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
html {
    font-family: "Lucida Sans", sans-serif;
}
.header {
    background-color: #9933cc;
    color: #ffffff;
    padding: 15px;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 7px;
    background-color: #33b5e5;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.menu li:hover {
    background-color: #0099cc;
}
        </style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="new.css" /> -->
    <script src="js/myjs.js"></script>
<!--     <script src="js/myajax.js"></script> -->
</head>
<body background="img/bg/15.jpg">
<div class="wrapper">
<?php
    include "includes/header.php";
?>
<div class="col-3 menu">
  <ul>
    <li>The Flight</li>
    <li>The City</li>
    <li>The Island</li>
    <li>The Food</li>
  </ul>
</div>
  <article class="col-7">
  <div id="mygal"></div>
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
  <div id="comment" class="col-2 menu">
  <ul>
    <li>The Flight</li>
    <li>The City</li>
    <li>The Island</li>
    <li>The Food</li>
  </ul>
</div>
  <!-- <aside class="aside aside-1"><?php //if(isset($_SESSION['uid'])){ loadMenu();}    ?>
  <form action="functions/ajtest.php" method="post">
  <input type="text" id="ajtext">
  <button onclick="ajtest1;" id="ajbut">AJTEST</button>
  </form>
  </aside>
  <aside class="aside aside-2"> </aside> -->
  <footer class="footer"><div id="foot"></div>CAMAGRU TDILOTSO</footer>
</div>


</body>

</html>
