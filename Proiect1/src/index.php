<?php
require_once 'connection.php';
require_once 'clase.php';

session_start();

if(isset($_COOKIE['username']) && !isset($_SESSION['username']))
{
	$_SESSION['username'] = $_COOKIE['username'];
}
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $sql="SELECT * FROM conturi WHERE username=:username";
    
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    $pos = $record['user_type'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Acasa</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/.js"></script>
        <script src="js/faraclick.js"></script>
        <script src="js/faraplagiat.js"></script>
    </head>
    <body>
        <audio autoplay loop hidden>
        <source src="multimedia/muzik.mp3" type="audio/mpeg">
        </audio>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" style="color: white;" href="index.php">Shooters</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" style="color: #808080;" aria-current="page" href="index.php">Acasa</a></li>
                        <li class="nav-item"><a class="nav-link" style="color: white;" href="about.php">Despre noi</a></li>
                        <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Bauturi</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="produse.php">Toate bauturile</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="populare.php">Shot-uri</a></li>
                                <li><a class="dropdown-item" href="noi.php">Cocktail-uri</a></li>
                            </ul>
                        </li>
                        <?php 
                        if(isset($_SESSION['username'])){
                        echo '<li class="nav-item dropdown">';
                            echo '<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">'.$_SESSION["username"].'</a>';
                            echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                
                                if(isset($_SESSION['username'])){
                                    if($pos == 'admin' ){
                                       echo '<li><a class="dropdown-item" href="administrareconturi.php">Administrare conturi</a></li>';
                                       echo '<li><a class="dropdown-item" href="administrarebaza.php" style="color: black;">Administrare baza de date</a></li>';
                                       echo '<li><hr class="dropdown-divider" /></li>';
                                         }
                                }
                                
                                //echo '<li><hr class="dropdown-divider" /></li>';
                                echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                            echo '</ul>';
                        echo '</li>';
                        }
                        else{
                            echo '<a class="nav-link" href="rememberme.php" style="color: white;">Login</a>';
                        }
                        ?>
                    </ul>
                </div>
                </div>
        </nav>
        <br/><br/>
        
        <div class="container text-center">
        <br/><br/>
        <svg height="130" width="500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
              <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%"
                style="stop-color:rgb(0,0,0);stop-opacity:0.5" />
                <stop offset="100%"
                style="stop-color:rgb(0,0,0);stop-opacity:0.5" />
              </linearGradient>
            </defs>
            <text x='130' y='50' style='stroke: #808080; stroke-width: 3; fill: #000000; font-size: 48px;'>
            SHOOTERS</text>
        </svg>
        </div>
            <video autoplay loop muted plays-inline id="background-video">
                <source src="multimedia/Shooters.m4v" type="video/mp4">
            </video>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        
    </body>
</html>
