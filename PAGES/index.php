<?php

require '../DB/db_conn.php';
$conn = new Essecuelle();
if(!isset($_SESSION['loginstate'])){
    session_start();
    $_SESSION['loginstate'] = 0;
}
if(isset($_POST['login'])){
    if((isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))){
        $risultato = $conn->eseguiQuery("SELECT ruolo FROM utenti WHERE username = :user AND password = :pass;", ['user' => $_POST['username'], 'pass' => $_POST['password']]);
        if($risultato != 0){
            $_SESSION['loginstate'] = 1;
            $pagina = "";
            switch ($risultato) {
                case 1:
                    $pagina = "rappresentante";
                    break;
                case 2:
                    $pagina = "capoarea";
                    break;
                case 3:
                    $pagina = "nazionale";
                    break;
                default:
                    break;
            }
            $_SESSION['tipologgato'] = $pagina;
            header('Location: ../' . $pagina .'/' . $pagina . '.php');
        }
        else{
            $_SESSION['loginstate'] = -1;
            echo "non valido";
        }
    }
    else{
        if($_SESSION['loginstate'] == 1){
            if($_SESSION['tipologgato'] != "")
                header('Location: ../' . $_SESSION['tipologgato'] .'/' . $_SESSION['tipologgato'] . '.php');
        }
        else if($_SESSION['loginstate'] != -1){
            $message = "assicurarsi di aver riempito tutti i campi correttamente";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}
?>




















<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>e-commerce Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" name ="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name ="password">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="Login" text="Login">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
