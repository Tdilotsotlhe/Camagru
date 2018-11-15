<?php
   include "../config/database.php";
   

if (isset($_POST['newname']))
{
    changename();
}
if (isset($_POST['getuser']))
{
    getuserprofile();
}
if (isset($_POST['thumby']))
{
    loadthumbs();
}
if (isset($_POST['homegal']))
{
    loadGal();
}
if (isset($_POST['imgid']))
{
    comment();
}
if (isset($_POST['delpicid']))
{
    delpic();
}
if (isset($_POST['allpics']))
{
    allPics();
}
if (isset($_POST['page']))
{
    newPager();
}
if (isset($_POST['countpics']))
{
    picCount();
}
if (isset($_POST['insertCom']))
{
    addComment();
}

if (isset($_POST['theid']))
{
    likeimage();
}

function likeimage()
{
    $userid1 = $_POST['theid'];
    $pictureid = $_POST['picid'];
    //$sql = "INSERT INTO likes (theimg_id,likers_id,likestatus) VALUES (:img,:lid,:lst) ON DUPLICATE KEY UPDATE likestatus=IF(likestatus=1, 0, 1)";

    include "../config/database.php";
    

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
        $l = 1;
        $stmt = $dbh->prepare("INSERT INTO likes (theimg_id,likers_id,likestatus) VALUES (:img,:lid, :lst) ON DUPLICATE KEY UPDATE likestatus=IF(likestatus=1, 0, 1)");
        $stmt->bindParam(':img', $pictureid);
        $stmt->bindParam(':lid', $_SESSION['uid']);
        $stmt->bindParam(':lst', $l);
        // $stmt->bindParam(':lst', $_SESSION['uid']);
        if($stmt->execute()){
            echo "IN";
          }
          else{
              echo "OUT";
          }
        
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}

function loadGal()
{
    include "../config/database.php";
    

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

              echo "<img id=".$row['img_id']." onclick='imageFoc(this)' class='w3-image w3-rounded' src='img/gal/".$row['img_name']."' height='100px' width='100px'>";
          }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}




function loadthumbs()
{
    include "../config/database.php";
    

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

              echo "<div><img data-id=".$row['img_id']." id=".$row['img_id']." onclick='privImageFoc(this)' class='thumbs w3-image' src='img/gal/".$row['img_name']."' heighty='100px' width='100px'></div>";
          }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}

//modify back to comment
function comment()
{
    include "../config/database.php";

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
        $imgid = $_POST['imgid'];
        $stmt = $dbh->prepare("SELECT
        *
    FROM
        gallery
    LEFT OUTER JOIN comments ON img_id = comimg_id
    WHERE
        img_id =?");
        if($stmt->execute([$imgid])){
          
          $row = $stmt->fetchAll();
             
         // $retstring = $row[0]['comment'];
          //var_dump($row);
          //exit();
        

              echo "<div id='commdiv' class='w3-animate-opacity w3-mobile w3-padding-3 w3-card w3-center w3-theme-l3'>
              <img id=".$row[0]['img_id']." class='thumbs w3-image' src='img/gal/".$row[0]['img_name']."' height='100px' width='100px' data-commid=".$_SESSION['uid'].">
          
             
             "; 
                           
              foreach ($row as $key => $value) {
                  if ($value["comment"] == NULL)
                  {
                      break;
                  }
                  else
                  {
                    echo "<p style='font-size:2vw;' class='w3-animate-right w3-mobile w3-padding-2  w3-theme-l4 w3-hover-opacity'>".$value["comment"]."</p>";
                    
                  }
            }
            echo "<p id='latest'></p>";
           
            if(isset($_SESSION['uid'])){
                echo "<p>
                <input class='w3-input'  type='text' id='comtxt'>
                </p>
                <br >";
            echo  "<button class='w3-button w3-ripple w3-dark-gray' id='editbtn' onclick='setedit(".$row[0]['img_id'].")'>Edit</button>";
            echo  "<button class='w3-button w3-ripple w3-light-gray' id='delbtn' onclick='delpic(".$_SESSION['uid'].",".$row[0]['img_id'].")'>Delete</button>";
            echo  "<button class='w3-button w3-ripple w3-dark-gray' id='delbtn' onclick='newCom(".$_SESSION['uid'].",".$row[0]['img_id'].")'>Comment</button></div>";
            }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}


function checkLike($picid)
{
    $user = $_SESSION['uid'];

    include "../config/database.php";
    

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
        $stmt = $dbh->prepare("SELECT * FROM likes WHERE likers_id=:lid AND theimg_id=:picid");
        $stmt->bindParam(':lid', $_SESSION['uid']);
        $stmt->bindParam(':picid', $picid);
        if($stmt->execute()){
          
          while($row = $stmt->fetch()){ 
              if ($row['likestatus'] == 0)
              {
                  return (0);
                  
              }else{
                  return (1);
                 // echo "<script>imgComment(".$row['theimg_id'].");</script>";
              }
              //echo "<div><img id=".$row['img_id']." onclick='imageFoc(this)' class='thumbs' src='img/gal/".$row['img_name']."' heighty='100px' width='100px'></div>";
          }
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }

}



function allPics()
{
    include "../config/database.php";
    

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
        $stmt = $dbh->prepare("SELECT * FROM gallery ORDER BY uptime DESC");
        if($stmt->execute([$_SESSION['uid']])){
          
          $row = $stmt->fetchAll();
          //echo json encode

          echo json_encode($row);
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}


function newPager()
{
    include "../config/database.php";
    
    $pagenumber = $_POST['page'];
    $off = $_POST['offset'];
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
        $stmt = $dbh->prepare("SELECT * FROM gallery WHERE users_id = ".$_SESSION['uid']." ORDER BY uptime LIMIT 5 OFFSET $off");
        if($stmt->execute()){
          
          $row = $stmt->fetchAll();
          //echo json encode

          echo json_encode($row);
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
    //echo "<div><img src='||||' height='50px' width='50px'></div>";

}



function picCount()
{
    include "../config/database.php";
    
    
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
        $stmt = $dbh->prepare("SELECT COUNT(img_id) AS county FROM gallery");
        if($stmt->execute()){
          
          $row = $stmt->fetch();

          echo intval($row['county']);
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }  
  

}

function addComment(){
    include "../config/database.php";
    
    $comment = $_POST['insertCom'];
    $picid = $_POST['picid'];
    //echo $picid;
   // echo $comment;
   // exit();
    
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
        $stmt = $dbh->prepare("INSERT INTO comments (friend_id, comment, comimg_id) VALUES (:fid, :comm, :comid)");
        $stmt->bindParam(':fid', $_SESSION['uid']);
        $stmt->bindParam(':comm', $comment);
        $stmt->bindParam(':comid', $picid);
        if($stmt->execute()){

          echo "Comment added Successfully!";
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     } 

}

function delpic()
{
    include "../config/database.php";
    $picid = $_POST['delpicid'];
    
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
        $stmt = $dbh->prepare("DELETE FROM gallery WHERE img_id = :imgid");
        $stmt->bindParam(':imgid',$picid);
        if($stmt->execute()){

          echo "Image deleted successfully!";
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }
}

function getuserprofile(){
    include "../config/database.php";
    
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
        $stmt = $dbh->prepare("SELECT * FROM users WHERE `user_id` = :imgid");
        $stmt->bindParam(':imgid',$_SESSION['uid']);
        if($stmt->execute()){
            $row = $stmt->fetch();
          echo json_encode($row);
        }else{
            echo "unable to retrieve user details.";
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }

}


function changename(){
    include "../config/database.php";
    
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
        $stmt = $dbh->prepare("UPDATE * FROM users WHERE `user_id` = :imgid");
        $stmt->bindParam(':imgid',$_SESSION['uid']);
        if($stmt->execute()){
            $row = $stmt->fetch();
          echo json_encode($row);
        }else{
            echo "unable to retrieve user details.";
        }
     } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
     }
}
?>