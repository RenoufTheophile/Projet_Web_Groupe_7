<!-- upload -->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: relative;
  bottom: 23px;
  right: 28px;
  width: 280px;
}



/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: auto;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>
  <div class="form-popup" id="myForm2">
  <form action="mail.php" class="form-container"method="POST" enctype="multipart/form-data" style="border:1px solid #ccc">
<
          <h1>BAD Picture</h1>
          <p>Please fill in this form to report an picture</p>

          <label for="description"><b>Put why you report this picture</b></label>
            <input type="text" placeholder="Enter picture description" name="picture_description" required>


          <label for="picture"><b>Put the name of the picture</b></label>
            <input type="text" place holder="Enter picture name" name="picture_name" id="picture_name" >


          <button type="button" onclick="closeForm()" class="btn cancel">Cancel</button>
          <input type="submit" name="btn" value="Upload Mail">
          </form>
        </div>

<h2>Upload Image Form</h2>
<p>Click on the button at the bottom of this page to upload an image.</p>
<p>This button will appear only for connected users</p><br />

<button class="open-button" onclick="openForm1()">Upload Picture</button>
<button class="open-button" onclick="openForm2()">Delete Picture</button>

<div class="form-popup" id="myForm">
<form action="Image/gallery/upload_picture.php" class="form-container"method="POST" enctype="multipart/form-data" style="border:1px solid #ccc">

        <h1>Add Picture</h1>
        <p>Please fill in this form to add a picture</p>

        <label for="description"><b>Put the name/comment you want for this picture</b></label>
          <input type="text" placeholder="Enter picture description" name="picture_description" required>


        <label for="photo"><b>Select picture to upload</b></label>
          <input type="file" name="fileToUpload" id="fileToUpload" accept="image">


        <button type="button" onclick="closeForm()" class="btn cancel">Cancel</button>
        <input type="submit" name="btn" value="Upload Image">
        </form>
      </div>
      <script>
var action = 1;
var action2 = 1;

function openForm1() {
  if ( action == 1 ) {
  document.getElementById("myForm").style.display = "block";
  action=2;
}else{
  document.getElementById("myForm").style.display = "none";
  action=1;
}
}

function openForm2() {
  if ( action2 == 1 ) {
  document.getElementById("myForm2").style.display = "block";
  action2=2;
}else{
  document.getElementById("myForm2").style.display = "none";
  action2=1;
}
}
</script>

</body>
