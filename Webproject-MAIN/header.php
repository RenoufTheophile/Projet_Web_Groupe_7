<link rel="stylesheet" type="text/css" href="header.css"/>

<nav class="navbar navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item navactive active">
                    <a class="nav-link" href="main.php">
                        <img class="imgnav" src="Image/cesi_logo.jpg">
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item navitem">
                    <a class="nav-link" href="Events.php">Events</a>
                </li>
                <li class="nav-item navitem dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Autres services
</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">BDE</a>
                        <a class="dropdown-item" href="#">Clubs</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Boutique.php">Boutique</a>
                        <a class="dropdown-item" href="#">Galerie</a>
                    </div>
                   
              </li>
          </div>
        </div>

        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>
-->


        </div>
    <div class="nav-item-end my-2 my-lg-0">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

            <?php
            if(isset($_SESSION['connected'])){
              echo"<li>
              <a class=\"nav-link\" href=\"/webproject/Webproject-MAIN/deco.php\">LOGOUT</a>
              </li>
              <li>
              <a class=\"nav-link\" href=\"/webproject/Webproject-MAIN/page_admin/admin.php\">ADMINISTRATE</a>
              </li>";
              
            }
            else{
              echo"
                <li>
                <a class=\"nav-link\" href=\"/webproject/Webproject-MAIN/connexion.php\">Log in</a>
                  </li>
                  <li>
                  <a class=\"nav-link\" href=\"/webproject/Webproject-MAIN/register.php\">Register</a>
                  </li>";
            }
            ?>
        </div>
    </ul>
    </div>
    </nav>