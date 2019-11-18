<?php session_start();
 ?>
<!DOCTYPE html>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   *{
    box-sizing: border-box;
  }

  body {
    margin: 0px;
    font-family: Roboto, sans-serif;
    text-align: center;
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
    border-style: solid;
    border-radius: 5px;
    border-width: thin;
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
  position: relative;; /* Position the background text */
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

  font-family: Roboto, sans-serif;
}

main{
  margin:20px;
}



#myForm2{
  right:325px;
}

#myForm{
  right: 15px;
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
  background-color:#4d75bb;
  border-color:black;
  padding: 10px;
  border-style: solid;
  border-width: thin;
  border-radius: 10px;
  text-align: center;
}

.content2{
  color: white;
}

.form{
  text-align: center;
  margin-left: auto;
  margin-right: auto;
  width:300px;

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
.container{
  display: inline-block;
  cursor: pointer;
}

.heart {
  background-color: black;
  display: inline-block;
  height: 10px;
  margin: 0 10px;
  position: relative;
  top: 0;
  transform: rotate(-45deg);
  width: 10px;
}

.commentary{
  text-align: justify;
  margin-left: 25px;
}

.cont-commentary{
  margin-top: 15px;
}

.heart:before,
.heart:after {
  content: "";
  background-color: black;
  border-radius: 50%;
  height: 10px;
  position: absolute;
  width: 10px;
}

.heart:before {
  top: -5px;
  left: 0;
}

.heart:after {
  left: 5px;
  top: 0;
}
.change .heart{
  background-color: red;
}
.change .heart:after{
  background-color: red;
}
.change .heart:before{
  background-color: red;
}
.heart2 {
  background-color: red;
  display: inline-block;
  height: 10px;
  margin: 0 10px;
  position: relative;
  top: 0;
  transform: rotate(-45deg);
  width: 10px;
}

.heart2:before,
.heart2:after {
  content: "";
  background-color: red;
  border-radius: 50%;
  height: 10px;
  position: absolute;
  width: 10px;
}

.heart2:before {
  top: -5px;
  left: 0;
}

.heart2:after {
  left: 5px;
  top: 0;
}
.change2 .heart{
  background-color: black;
}
.change2 .heart:after{
  background-color: black;
}
.change2 .heart:before{
  background-color: black;
}
  </style>
  </head>
  <body>

  <?php
  include("header.php");


  ?>
  </body>
  <body>
<main>


    <?php
    //If the connected user is a BDE member or a student we add the from for upload a picture.
    if(isset($_SESSION['connected'])){
      if($_SESSION['role']=="bdemember"||$_SESSION['role']=="student"){

        include("Image\gallery\uploadImageGallery.php");
      }
      //if the connected user is an employee we add the donwload link of the gallery.
      elseif ($_SESSION['role']=="employee") {
        echo "<a href='gallery.zip' download='gallery.zip'>Download gallery</a>";
      }
    }
    ?>



  <!-- Header -->
  <h2>gallery</h2>
  <div id="myBtnContainer" class="btn active"></div>

  <!-- Photo Grid -->
  <div class="row">

      <?php
      include("AccerBDD.php");
      $bdd=connexobject("webproject","myparam");
      $query = $bdd->query("CALL select_picture()");
      $resultat = $query->fetchAll();


      //Portfolio gallery Grid with a loop who take the id and the name of the picture  and post it.
      foreach ($resultat as $key => $variable) {


        $src=$resultat[$key]['picture_name'];
        $name=$resultat[$key]['picture_id'];

        $statement = $bdd->prepare("SELECT SUM(`likes`) FROM `commentary` WHERE ?=picture_id ");
        $statement->execute(array($name));
        $ligne = $statement->fetch();
        $like = $ligne[0];


        //Test if the user are connected,so we fetch the user id.

if(isset($_SESSION['connected'])){
        $email=$_SESSION['username'];
        $statement = $bdd->prepare("CALL select_i(?)");
        $statement->execute(array($email));
        $ligne = $statement->fetch();
        $id = $ligne[0];}


        $bdd_comment=connexobject("webproject","myparam");
        $query_comment=$bdd_comment->prepare("CALL select_comment(?)");
        $query_comment->execute(array($name));
        $resultat_comment=$query_comment->fetchAll();


        echo "<div class='column nature'>";
          echo"<div class='content'>";
            echo"<img src='Image/gallery/".$src."' alt='comment' style='width: 100%'>";
            echo"<div class='content2'>";
              echo"<h4>".$resultat[$key]['picture_name']."</h4>";
              echo"<p>".$resultat[$key]['picture_description']."</p>";
              echo "<div class='form'id='myLikes'>";
              echo "<form  action='Image\gallery\upload_heart.php' class='form-container' method='POST' enctype='multipart/form-data'>";
              echo "<input type='hidden' name='src' value='".$src."'>";
              echo "<input type='hidden' name='name' value='".$name."'>";

              //Test if the user are connected,if their are, we show the heart for add like.
if(isset($_SESSION['connected'])){
              $bdd3=connexobject("webproject","myparam");
              $pic=$bdd3->prepare("CALL select_likes2(?,?)");
              $pic ->execute( array($id,$name));
              $ligne3=$pic->fetch();
              $picture_id=$ligne3[0];
              if ($picture_id==NULL){
                echo "<div class='container' onclick='myFunction(this)'>";
                echo "<label class ='heart'></label>";
                echo "<input type='submit'  name='likes' values='Like'>";


              }
              else {
                echo "<div class='container' onclick='myFunction2(this)'>";
                echo "<label class ='heart2'></label>";
                echo "<input type='submit'  name='likes2' values='Like'>";



              }
              echo "</form>";
              echo "</div>";

              echo"</div>";}
              echo "<h4>Comments</h4>";

              //Create a new loop for show the comment of each picture
              foreach ($resultat_comment as $key2 => $value) {


                $comment=$resultat_comment[$key2]['comment'];
                if ($comment==!NULL){
                $first_name=$resultat_comment[$key2]['first_name'];
                $last_name=$resultat_comment[$key2]['last_name'];
                echo "<div class='cont-commentary'>";
                echo "<h5 class='commentary'>".$first_name." ".$last_name."</h5>";
                echo "<p class='commentary'>".$comment."</p>";
                echo "</div>";}
                }


                //Test if the user are connected,if their are, we show the box for add a comment.

          if(isset($_SESSION['connected'])){
                echo "<div class='form' id='myForm3'>
                <form action='Image/gallery/upload_comment.php' class='form-container' method='POST' enctype='multipart/form-data'>
                <input type='hidden' name='name' value='".$name."'>
                        <h2>Add a comment</h2>
                          <input type='text' placeholder='Enter picture description' name='picture_comment' required>
                        <input type='submit' name='btn' value='Upload Comment'>
                        </form>
                      </div>";


}
            echo "</div>";
          echo "</div>";
        echo"</div>";

      }
      ?>
  </div>


  <script>

  filterSelection("all") // Execute the function and show all columns.
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected.
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements.
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

// Hide elements that are not selected.
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

// Add active class to the current button (highlight it).
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
//Function for change the heart color.
function myFunction(x) {
  x.classList.toggle("change");
}
function myFunction2(x) {
  x.classList.toggle("change");
}
  </script>
</main>
  </body>
