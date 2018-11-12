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
/* Style the header with a grey background and some padding */
.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

/* Style the header links */
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active/current link*/
.header a.active {
  background-color: dodgerblue;
  color: white;
}

/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */ 
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
</style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <link rel="stylesheet" type="text/css" media="screen" href="new.css" /> -->
<link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
    <script src="js/myjs.js"></script>
<!--     <script src="js/myajax.js"></script> -->
</head>
<body background="img/bg/15.jpg" onload="changeActive();">
<div class="w3-row">

<?php

    include "includes/header.php";
?>

</div>
<!-- test-->
<div class="w3-container">
<div class="w3-row">
<div class="w3-third">
<?php if(isset($_SESSION['uid'])){ loadMenu();}    ?>
</div>
<div class="w3-rest">
</div>
</div>
</div>
<!-- left div-->
<div class="col-3 menu">
<?php //if(isset($_SESSION['uid'])){ loadMenu();}    ?>
</div>

<!-- central div -->
 <!--  <article class="main"> -->
 <div class="col-7">
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
  
  </div>
<!--   </article> -->

  <!-- right div-->

  <div class="col-3">
<!--   <aside class="aside aside-1"><?php if(isset($_SESSION['uid'])){ loadMenu();}    ?>
  <form action="functions/ajtest.php" method="post">
  <input type="text" id="ajtext">
  <button onclick="ajtest1;" id="ajbut">AJTEST</button>
  </form> -->
  </div>
  <aside class="aside aside-2"> </aside>
  <footer class="footer"><div id="foot"></div>CAMAGRU TDILOTSO</footer>
  <!-- wrapper div close -->
<!-- </div> -->


</body>

</html>
