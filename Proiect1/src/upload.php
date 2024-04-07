<?php
require_once 'connection.php';

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
        <link href="css/style.css" rel="stylesheet" />
        <script src="js/.js"></script>
        <script src="js/faraclick.js"></script>
        <script src="js/faraplagiat.js"></script>
    </head>
    <body>
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
        <header class="bg-dark py-5">
            <div id="content">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white">
                        <h1 class="display-4 fw-bolder">Incarcati o intrare</h1>
                        <form method="post" action="save.php" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="1000000">
                            <div>
                                Nume bautura:<textarea class="form-control" style="width: 40%; height:20px; margin-left: auto; margin-right: auto;" name="nume"></textarea> 
                            </div>
                            <br/>
                            <div>
                                Imagine:<input class="form-control" style="width: 40%; margin-left: auto; margin-right: auto;" type="file" name="image"> 
                            </div>
                            <br/>
                            <div>
                                Ingrediente:<textarea class="form-control" style="width: 40%; height:20px; margin-left: auto; margin-right: auto;" name="ingrediente"></textarea> 
                            </div>
                            <br/>
                            <div>
                                Tipul bauturii:<textarea class="form-control" style="width: 40%; height:20px; margin-left: auto; margin-right: auto;" name="tipbautura"></textarea> 
                            </div>
                            <br/>
                            <div>
                                Pret:<textarea class="form-control" style="width: 40%; height:20px; margin-left: auto; margin-right: auto;" name="pret"></textarea> 
                            </div>
                            <br/>
                            <div>
                                <input class="btn btn-primary btn-outline" type="submit" name="upload" value="Incarcati">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="bg-dark"><br/></div>
        
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        
    </body>
</html>