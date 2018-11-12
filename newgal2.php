<?php
 include "config/database.php";
include "functions/load.php";


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

#overlay {
    position: absolute;
    display: none;
    width: 500px;
    height: 375px;
    top: 50;
    left: 50;
    right: 70; 
    bottom: 30;
    z-index: 2;
   
    
    cursor: pointer;
}
#text{
    position: absolute; 
    top: 50%;
    left: 50%;
    font-size: 20px;
    color: white;
    /* transform: translate(-50%,-50%); */
    /* -ms-transform: translate(-50%,-50%); */
}
        </style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="new.css" />
    <script src="js/myajax.js"></script>
    <script src="js/thumbs.js"></script>
    <script src="js/myjs.js"></script>
</head>
<body background="img/bg/15.jpg">
<?php
  //  include "includes/header.php";
?>
<div class="row">

<div id="thumbnails" class="col-2" style="overflow:auto; height:400px;">
IMAGES
</div>
  <div class="col-5" style="margin: auto;">
  
  <div id="pagegal" >
</div>
<br>

<button id="prevset" onclick="prevpage();"><<</button>
<button id="nextset" onclick="nextpage();">>></button>
<div id="controls">

</div>
<br>
<p id='pagecounter'>1/?</p>

  
  
    </div>
  <div id="comment" class="col-2 menu">
COMMENT
</div>
  <footer class="footer"><div id="foot"></div>CAMAGRU TDILOTSO</footer>
</div>


</body>

</html>
