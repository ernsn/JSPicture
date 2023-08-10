<!doctype html>
<html>
<head>
	<title>Photo Capture Demo</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="style.css" media="all">
  <script src="https://cdn.jsdelivr.net/npm/idb@7/build/umd.js"></script>
  <script src="main.js"></script>
</head>
<body>
<center>
<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="contentarea">
	<h1>
    Photo Capture
	</h1>
	
  <div class="camera">
    <video id="video">Video stream not available.</video>
    <br>
    <button id="startbutton" class="button1">Take photo</button> 
  </div>
  <canvas id="canvas">
  </canvas>
  <div class="output">
    <img id="photo" alt="The screen capture will appear in this box."><br>
    <button id="downloadButton" class="button1" style="display: none;">Download Image</button>
</div>
  <input type="file" name="imageFile" accept="image/*">
  <button type="submit">Upload Image</button>
</div>
</form></center>
</body>
</html>