<script src="https://code.jquery.com/jquery-3.0.0-alpha1.js"></script><html>
<style>
h2{
  color: red;
  text-decoration: underline;
}

body{
  font-family: sans-serif;
}

form{
  margin-top: 10px;
  margin-bottom: 10px;
}

button{
  margin-top: 10px;
  background: green;
  color: white;
  border: 1px solid green;
  border-radius: 5px;
  font-size: 20px;
}
</style>
<body>
  <h1>Vanilla JS AJAX Form with File Upload Example</h1>
  <h2>Note: The file submitted will be publicly accessible. Cat GIFs only!</h2>
  
<form id="ajax-upload" action="../post.php?dir=example" method="post" enctype="multipart/form-data">
File: <input type="file" name="submitted">
<input type="hidden" name="someParam" value="someValue"/>
  <button type="submit">Send via AJAX!</button>
</form>
  <div>
    Copy/Paste the URL below to see the uploaded file 
    <div id="result"></div>
  </div>  
</body>
<script>
document.addEventListener("DOMContentLoaded", function(){
      document.getElementById('ajax-upload').addEventListener("submit", function(e){
        e.preventDefault()
        var form = e.target
        var data = new FormData(form)
        
        var request = new XMLHttpRequest()
        
        request.onreadystatechange = function(){
          document.getElementById("result").innerText = request.responseText
        }
        
        request.open(form.method, form.action)
        request.send(data)
      })
    })
</script>
</html>