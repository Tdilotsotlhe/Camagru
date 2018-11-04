

function storePic()
{
var sphoto = document.getElementById("photo");
var ajax = new XMLHttpRequest();
ajax.open("POST",'../functions/upweb.php',false);
ajax.send(sphoto);
/* var data= new FormData();
data.append(photo.name, sphoto.files[0]);

var data=new FormData();
//from inputs
data.append(sphoto.name,sphoto.files[0]);
data.append('name',name);
var xmlhttp=new XMLHttpRequest()
xmlhttp.open("POST", "../functions/upweb.php");
xmlhttp.send(data); */
}

//wrap funciton to avoid global issues
(function(){

    var width = 320;    // We will scale the photo width to this
    var height = 0;     // This will be computed based on the input stream
  
    var streaming = false;
  
    var video = null;
    var canvas = null;
    var photo = null;
    var startbutton = null;

function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photos');
   
    newImg = document.getElementById('myimage');
  
    startbutton = document.getElementById('photo_button');
    save_photo = document.getElementById('save_photo');

//fetch media stream
 navigator.mediaDevices.getUserMedia({ video: true, audio: false })
.then(function(stream) {
    video.srcObject = stream;
    video.play();
})
.catch(function(err) {
    console.log("An error occurred! " + err);
});

//listen forvideo
video.addEventListener('canplay', function(ev){
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width);
    
      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);
      streaming = true;
    }
  }, false);

startbutton.addEventListener('click', function(ev){
    takepicture();
    ev.preventDefault();
  }, false);
  clearphoto();
}

//clear photo

function clearphoto() {
    var context = canvas.getContext('2d');
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);
    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
    //newImg.value =  data;
  
}

function takepicture(){
    var context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      var data = canvas.toDataURL('image/png');
      console.log(data);
      var myImg = document.getElementById("photo").src;
      ////////////////////////try upload script





      ///////////////////////
      photo.setAttribute('src', data);
      fdge = document.getElementById("fudge");
       newImg.setAttribute('src', data);
       alert(newImg.src);
       // console.log(newImg.value);
    } else {
     // clearphoto();
    }
}
window.addEventListener('load', startup, false);
})();