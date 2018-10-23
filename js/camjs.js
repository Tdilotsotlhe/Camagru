

function takepic() {
    alert('camjs kjhkjworking');
}

//check if features available
function hasGetUserMedia() {
    return !!(navigator.mediaDevices &&
      navigator.mediaDevices.getUserMedia);
  }
  
  if (hasGetUserMedia()) {
    // Good to go!
  } else {
    alert('getUserMedia() is not supported by your browser');
  }

  var constraints = { video: { width: 300, height: 300 } }; 

  navigator.mediaDevices.getUserMedia(constraints)
  .then(function(mediaStream) {
    var video = document.querySelector('video');
    video.srcObject = mediaStream;
    video.onloadedmetadata = function(e) {
      video.play();
    };
  })
  .catch(function(err) { console.log(err.name + ": " + err.message); }); // always check for errors at the end.
  
  