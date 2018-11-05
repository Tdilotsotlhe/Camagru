<?php
include "config/database.php";
include "functions/load.php";
/* $_SESSION['test'] = "SHIT!";
echo $_SESSION['test']; */


///pagination


  
    

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
        $stmt = $dbh->prepare("SELECT COUNT(img_id) FROM gallery");
        if($stmt->execute()){
          
          $row = $stmt->fetch();
          //echo $row[0];
          $total_rows = $row[0];
          $rpp = 2;
          $last = ceil($row[0]/$rpp);
          if($last < 1){
            $last = 1;
           
        }
          
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="new.css" />
    
   <!--  <script src="js/myjs.js"></script> -->
   <!--  <script src="js/newcamjs.js"></script> -->
    <!-- <script src="js/pic.js"></script> -->
    <script src="js/myajax.js"></script>
    <script src="js/thumbs.js"></script>
    <script src="js/myjs.js"></script>
    <style>
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

#infinite-list {
  /* We need to limit the height and show a scrollbar */
  width: 200px;
  height: 300px;
  overflow: auto;

  /* Optional, only to check that it works with margin/padding */
  margin: 30px;
  padding: 20px;
  border: 10px solid black;
}

/* Optional eye candy below: */
li {
  padding: 10px;
  list-style-type: none;
}
li:hover {
  background: #ccc;
}
</style>
</head>
<script>

var rpp = <?php echo $rpp; ?>; // results per page
var last = <?php echo $last; ?>; // last page number

function request_page(pn){
	var results_box = document.getElementById("maincontent");
	var pagination_controls = document.getElementById("controls");
	results_box.innerHTML = "loading results ...";
	var hr = new XMLHttpRequest();
    hr.open("POST", "paginator.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
			var dataArray = hr.responseText.split("||");
			var html_output = "";
		    for(i = 0; i < dataArray.length - 1; i++){
				var itemArray = dataArray[i].split("|");
				html_output += "ID: "+itemArray[0]+" - Testimonial from <b>"+itemArray[1]+"</b><hr>";
			}
			results_box.innerHTML = html_output;
	    }
    }
    hr.send("rpp="+rpp+"&last="+last+"&pn="+pn);
	// Change the pagination controls
	var paginationCtrls = "";
    // Only if there is more than 1 page worth of results give the user pagination controls
    if(last != 1){
		if (pn > 1) {
			paginationCtrls += '<button onclick="request_page('+(pn-1)+')">&lt;</button>';
    	}
		paginationCtrls += ' &nbsp; &nbsp; <b>Page '+pn+' of '+last+'</b> &nbsp; &nbsp; ';
    	if (pn != last) {
        	paginationCtrls += '<button onclick="request_page('+(pn+1)+')">&gt;</button>';
    	}
    }
	pagination_controls.innerHTML = paginationCtrls;
}

</script>
<body>
<div class="wrapper">
<?php
    include "includes/header.php";
?>
  <article  class="main">
    <div id="pagegal" style = "overflow: auto;">
<img id='pic0' name="pik0" onclick="imageComment(this);" class='thumbs' src="img/emojis/poo.png" height="200px" width="200px">
<img id='pic1' name="pik1" onclick="imageComment(this);" class='thumbs' src="img/emojis/poo.png" height="200px" width="200px">
<img id='pic2' name="pik2" onclick="imageComment(this);" class='thumbs' src="img/emojis/poo.png" height="200px" width="200px">
<img id='pic3' name="pik3" onclick="imageComment(this);" class='thumbs' src="img/emojis/poo.png" height="200px" width="200px">
</div>
<br>

<button id="prevset" onclick="prevpage();"><<</button>
<button id="nextset" onclick="nextpage();">>></button>
<div id="controls">

</div>
<br>
<p id='pagecounter'>Browse Gallery</p>

  </article>
  <aside class="aside aside-1" id="thumbnails"></aside>
  <aside id="comment"  class="aside aside-2"><p>Comments<p></aside>
  <footer class="footer">CAMAGRU TDILOTSO</footer>
</div>
</body>

    <!-- <script> request_page(1); </script> -->


</html>