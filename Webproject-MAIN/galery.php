
<!DOCTYPE html>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   *{
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .header {
    text-align: center;
    padding: 32px;
  }

  .row {
    display: -ms-flexbox; /* IE 10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE 10 */
    flex-wrap: wrap;
    padding: 0 4px;
  }

  /* Create two equal columns that sits next to each other */
  .column {
    -ms-flex: 50%; /* IE 10 */
    flex: 50%;
    padding: 0 4px;
  }

  .column img {
    margin-top: 8px;
    vertical-align: middle;
  }

  /* Style the buttons */
  .btn {
    border: none;
    outline: none;
    padding: 10px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
    font-size: 18px;
  }

  .btn:hover {
    background-color: #ddd;
  }

  .btn.active {
    background-color: #666;
    color: white;
  }
  .container {
  position: relative;
  max-width: 800px; /* Maximum width */
  margin: 0 auto; /* Center it */
}

.container .content {
  position: absolute; /* Position the background text */
  bottom: 0; /* At the bottom. Use top:0 to append it to the top */
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1; /* Grey text */
  width: 100%; /* Full width */
  padding: 20px; /* Some padding */
}
 {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  padding: 20px;
  font-family: Arial;
}

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 8px -16px;
}

/* Add padding BETWEEN each column (if you want) */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  display: none; /* Hide columns by default */
}

/* Clear floats after rows */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  background-color: white;
  padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

/* Add a grey background color on mouse-over */
.btn:hover {
  background-color: #ddd;
}

/* Add a dark background color to the active button */
.btn.active {
  background-color: #666;
   color: white;
}
}
/* width */
::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: red;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000;
}
  </style>
  </head>
  <body>

  <?php
  include("header.php");


  ?>
  </body>
  <body>

    <?php
    if(isset($_SESSION['connected'])){
      if($_SESSION['role']=="bdemember"||$_SESSION['role']=="student"){

        include("uploadImageGallery.php");
      }
    }
    ?>

      <h2>Upload Image Form</h2>
      <p>Click on the button at the bottom of this page to upload an image.</p>
      <p>This button will appear only for connected users</p><br />

      <button class="open-button" onclick="openForm()">Upload Picture</button>

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


  <!-- Header -->
  <h2>gallery</h2>
  <div id="myBtnContainer">
    <button class="btn active" onclick="filterSelection('all')"> Show all</button>
    <button class="btn" onclick="filterSelection('nature')"> Nature</button>
    <button class="btn" onclick="filterSelection('cars')"> Cars</button>
    <button class="btn" onclick="filterSelection('people')"> People</button>
  </div>

  <!-- Photo Grid -->
  <div class="row">

      <?php
      include("AccerBDD.php");
      $bdd=connexobject("webproject","myparam");
      $query = $bdd->query("CALL select_picture");
      $resultat = $query->fetchAll();



      foreach ($resultat as $key => $variable) {
        $src=$resultat[$key]['picture_name'];
        $name=$resultat[$key]['picture_id'];


        $bdd_comment=connexobject("webproject","myparam");
        $query_comment=$bdd_comment->query("CALL select_comment($name)");
        $resultat_comment=$query_comment->fetchAll();

        echo "<div class='column nature'>";
          echo"<div class='content'>";
            echo"<img src='Image/gallery/".$src."' alt='comment' style='width: 100%'>";
            echo"<div class='content'>";
              echo"<h4>".$resultat[$key]['picture_name']."</h4>";
              echo"<p>".$resultat[$key]['picture_description']."</p>";
              echo "<h4>Comment</h4>";
              foreach ($resultat_comment as $key => $value) {

                $comment=$resultat_comment[$key]['comment'];
                $first_name=$resultat_comment[$key]['first_name'];
                $last_name=$resultat_comment[$key]['last_name'];
                echo "<h5>".$first_name." ".$last_name."</h5>";
                echo "<p>".$comment."</p>";
                }
            echo "</div>";
          echo "</div>";
        echo"</div>";
      }
      ?>
  </div>


  <script>

  filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
  </script>
  <footer>
  <?php

  include("footer.php");

  ?>
  </footer>
  </body>
