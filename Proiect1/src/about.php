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
        <script src="js/.js"></script>
        <script src="js/faraclick.js"></script>
        <script src="js/faraplagiat.js"></script>
    </head>
    <body> 
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v17.0" nonce="PmZsr6qH"></script>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" style="color: white;" href="index.php">Shooters</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" style="color: white;" aria-current="page" href="index.php">Acasa</a></li>
                        <li class="nav-item"><a class="nav-link" style="color: #808080;;" href="about.php">Despre noi</a></li>
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
        <canvas id="myCanvas" width="300" height="70" class="d-flex" style="margin-top: 65px; margin-left: auto; margin-right: auto;"></canvas>
        <script>
          var canvas = document.getElementById("myCanvas");
          var ctx = canvas.getContext('2d');
          ctx.shadowColor = "rgb(190, 190, 190)";
          ctx.shadowOffsetX = 10;
          ctx.shadowOffsetY = 10;
          ctx.shadowBlur = 10;
          ctx.font = "50px arial";
          var gradient = ctx.createLinearGradient(0, 0, 150, 100);
          gradient.addColorStop(0, "rgb(0, 0, 0)");
          gradient.addColorStop(1, "rgb(0, 0, 0)");
          ctx.fillStyle = gradient;
          ctx.fillText("Despre noi", 10, 50);
        </script>
        <br><br>
        <div class="container px-4 px-lg-5 my-5">
        <p class="lead fw-normal text-black-50 mb-0">   Bun venit la shoteria noastră! Suntem o echipă pasionată de savoarea și creativitatea băuturilor, 
            dedicată să-ți ofere o experiență unică și memorabilă. Cu o combinație între arta mixologiei și 
            ingredientele de cea mai înaltă calitate, ne propunem să transformăm fiecare vizită într-o călătorie 
            gustativă captivantă.</p>
        <br/>
        <p class="lead fw-normal text-black-50 mb-0">   La shoteria noastră, ne propunem să oferim o gamă largă de shoturi inovatoare și delicioase, 
            concepute pentru a satisface cele mai variate gusturi și preferințe. Fie că ești în căutarea unei 
            explozii intense de arome sau a unei experiențe subtile și rafinate, vei găsi întotdeauna ceva pe placul 
            tău în meniul nostru diversificat.</p>
        <br/>
        <p class="lead fw-normal text-black-50 mb-0">   Noi credem în calitatea și integritatea ingredientelor pe care le folosim. Ne asigurăm că fiecare shot este 
            pregătit cu grijă și atenție la detalii, folosind doar cele mai proaspete fructe, siropuri și băuturi alcoolice 
            premium.</p>
        <br/>
        <p class="lead fw-normal text-black-50 mb-0">   Așadar, te invităm să ne treci pragul și să descoperi magia shoteriei noastre. Fie că vrei să experimentezi noi 
            arome sau să îți reînnoiești simțurile cu un shot clasic, suntem aici pentru a te surprinde și a-ți oferi o experiență 
            de neuitat. Vino și alătură-te nouă în călătoria noastră gustativă extraordinară!</p>
        </div>
        <div class="container m-auto">
            <iframe style="margin-left: 400px;" width="560" height="315" src="https://www.youtube.com/embed/-JH-A-F80PY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <br/><br/><br/><br/>
        <div class="container px-4 px-lg-5 my-5">
            <div style="margin-left:150px;" class="float-start text-black">
                <p class="lead fw-normal text-black-50 mb-0">Ne puteti urmari si pe:</p>
            </div>
        </div> 
        <div style="margin-left: 100px;" class="fb-like text-center" data-href="https://uaic.ro" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
        <div class="container px-4 px-lg-5 my-5">
            <div style="margin-left:30px;" class="text-center text-black">
                <h4 class="display-4 fw-bolder">Unde ne puteti gasi?</h4>
            </div>
        </div>
        <div class="container m-auto">
            <iframe style="margin-left: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.1317023402635!2d27.569325211691755!3d47.17485791757176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sAlexandru%20Ioan%20Cuza%20University!5e0!3m2!1sen!2sro!4v1684851506872!5m2!1sen!2sro" width="560" height="315" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <br/><br/> 
        <?php
        include 'clase.php';
        $angajat1=new angajati();
        $angajat2=new angajati();
        $angajat1->setNume('Andrei');
        $angajat2->setNume('Costica');
        $angajat1->setFunctie('manager');
        $angajat2->setFunctie('barman');
        ?>
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-black">
                <h4 class="display-4 fw-bolder">Angajatii nostrii</h4>
            </div>
        </div>
        <div class="container" style="margin-left: 120px;">
        <table border="1" style="position: relative;
                            bottom:0;
                            z-index: 2;
                            left: 50%;
                            top: 50%;
                            transform: translate(-50%,-50%);
                            width: 60%; 
                            border-collapse: collapse;
                            border-spacing: 0;
                            box-shadow: 0 2px 15px rgba(64,64,64,.7);
                            border-radius: 12px 12px 0 0;
                            overflow: hidden;">
            <tr>
                <th>Nume</th>
                <th>Functie</th>
            </tr>
            <tr>
                <td><?php $angajat1->afisareNume(); ?></td>
                <td><?php $angajat1->afisareFunctie(); ?></td>
            </tr>
            <tr>
                <td><?php $angajat2->afisareNume(); ?></td>
                <td><?php $angajat2->afisareFunctie(); ?></td>
            </tr>
        </table>
        </div>
        <?php
        
        ?>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
