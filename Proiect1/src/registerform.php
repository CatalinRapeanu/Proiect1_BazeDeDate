<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Login</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" style="color: white;" href="index.php">Shooters</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" style="color: white;" aria-current="page" href="index.php">Acasa</a></li>
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
                    </ul>
                </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Register</h1>
                   
                    <form method="post" action="register.php" name="form1" onsubmit="return checkCaptcha();">
                            <script>
                                var captcha, cahrs;

                                function getNewCaptcha(){
                                    chars="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                                    captcha = chars[Math.floor(Math.random()*chars.length)];
                                    for(var i=0; i<5; i++){
                                        captcha = captcha + chars[Math.floor(Math.random()*chars.length)];
                                    }
                                    form1.ct.value=captcha;
                                }

                                function checkCaptcha(){
                                    var check=document.getElementById("ci").value;
                                    if(captcha==check){
                                        return true;
                                    }
                                    else{
                                        alert("Invalid captcha");
                                        return false;
                                    }
                                }

                                getNewCaptcha();
                            </script>
                            <input type="text" name="nume" placeholder=" Username" class="form-control mb-3" style="width:78%; margin-left: auto; margin-right: auto;">
                            <input type="password" name="pass" placeholder="Password" class="form-control mb-3" style="width:78%; margin-left: auto; margin-right: auto;">
                            <input class="notlooong" type="text" id="cta" name="ct" value="####" readonly>
                            <input class="notlooong" type="text" id="ci" placeholder="Captcha" style="width:30%;">
                            <input class="rfr" name="refresh" type="button" value="Refresh" id="refreshbtn" onclick="getNewCaptcha();"><br/>
                            <button class="btn btn-success mt-3" name="Register">Register</button>
                    </form>
                    <p>Ai deja cont? Apasa <a href="rememberme.php">aici</a>.</p>
                </div>
            </div>
        </header>
        <div class="bg-dark"><br/><br/><br/></div>

        
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
