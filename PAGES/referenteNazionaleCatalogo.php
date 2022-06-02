<?php
session_start();
if(!isset($_SESSION['loginstate'])){
    header('Location: index.php');
}
else if($_SESSION['pagina'] != 'referenteNazionaleDashboard'){
    header('Location: index.php');
}
else{
require '../DB/db_conn.php';
$conn = new Essecuelle();
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

    <title>Regione - Catalogo</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="referenteNazionaleDashboard.php">
            <div class="sidebar-brand-text mx-3">
                <img src="img/RMFcommerce.png" style="width: 55%; height: 55%;">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="referenteNazionaleDashboard.php">
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider my-0">

        <!-- Nav Item - CreaOrdine
        <li class="nav-item active">
            <button type="button" class="nav-link" data-toggle="modal" data-target="#creaOrdineModal" style="background-color: transparent; border: 0px;">
                <span>Crea Ordine</span></button>
        </li>

        <hr class="sidebar-divider my-0">

        -->

        <!-- Nav Item - Catalogo -->
        <li class="nav-item active">
            <a class="nav-link" href="referenteNazionaleCatalogo.php">
                <span>Catalogo</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <!-- Nav Item - Catalogo -->
        <li class="nav-item active">
            <a class="nav-link" href="puntiVenditaRefNaz.php">
                <span>Punti Vendita</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    echo $_SESSION['tipologgato'];
                                    ?>
                                </span>
                            <img class="img-profile rounded-circle"
                                 src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="row">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Catalogo</h1>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin: 0 1% 0 auto;">
                        <button data-toggle="modal" data-target="#addProdotto" style="float: right;" class="btn btn-primary">Aggiungi prodotto</button>
                    </div>

                </div>




                <!-- CARDS START -->

                <div class="row row-cols-1 row-cols-md-5 g-4">

                    <!--
                    <div class="col" style="padding-bottom: 40px;">
                        <div class="card h-100">
                            <img src="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <p>500$</p>
                                <button class="btn btn-primary">Acquista</button>
                            </div>
                        </div>
                    </div>
                    -->


                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                    <?php
                    $ris = $conn->eseguiQuery("SELECT * FROM prodotti LEFT JOIN catalogo ON prodotti.nome = catalogo.prodotto", []);
                    foreach ($ris as $i) {
                        if (empty($i["quantita"])){
                            $i["quantita"] = 0;
                        }
                        echo '<div class="col" style="padding-bottom: 40px;">
                                    <div class="card h-100">
                                        <div style="height: 230px; width: auto; background-size: contain;background-repeat: no-repeat;background-position: center; no-repeat; background-image: url('.$i["url"].')">
                                        <!--<img src="'.$i["url"] . '" class="card-img-top">-->
                                        </div>
                                        <hr class="sidebar-divider my-0">
                                         <div class="card-body">
                                            <h5 class="card-title">'.$i["nome"].'</h5>
                                             <p class="card-text">'.$i["descrizione"].'</p>
                                              <p style=" font-size: large; padding-top: 5%"> Quantità: '.$i["quantita"].'</p><br>
                                              <p style=" font-weight: bold; font-size: large; padding-top: 5%">'.$i["prezzo"].'€</p>
                                         </div> 
                                        <div class="card-footer">
                                            <form method="post">
                                                <button name="c" type="submit" style="float: center;" class="btn btn-primary" value="'.$i["nome"].'">Aggiungi quantità</button>
                                            </form>
                                        </div>
                                    </div> 
                                 </div>';
                    }

                    if (isset($_POST['c'])){
                        $prodotto = $_POST['c'];
                        $_SESSION['prodotto'] = $prodotto;
                        echo '<script type="text/javascript">
                                    $(document).ready(function(){
                                           $("#OrdineModal").modal("show");
                                    });
                                </script>';

                    }
                    ?>



                </div>

                <!-- CARDS END -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Agenzia di Pippo - riky86 - SprTeo21</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <?php
                function Logout() {
                    session_destroy();
                }
                if (isset($_GET['logout'])) {
                    Logout();
                }
                ?>
                <a class="btn btn-primary" href="index.php?logout=true">Logout</a>
            </div>
        </div>
    </div>
</div>



<!-- AddProdotto Modal-->
<div class="modal fade" id="addProdotto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aggiunta Prodotto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                    if (isset($_POST['aggiungi'])){
                        if (empty($_POST['nome']) || empty($_POST['url']) || empty($_POST['descrizione']) || empty($_POST['prezzo'])){
                            echo "<script>alert('COMPILARE TUTTI I CAMPI');</script>";
                        }
                        else{
                            if ($_POST['prezzo'] < 0){
                                echo "<script>alert('PREZZO NON VALIDO');</script>";
                            }
                            else{
                                $conn->eseguiQueryNoRis("INSERT INTO prodotti (nome, prezzo, url, descrizione) VALUES (:n, :p, :u, :d);", ['n'=>$_POST['nome'], 'p'=>$_POST['prezzo'], 'u'=>$_POST['url'], 'd'=>$_POST['descrizione']]);
                                echo "<script>alert('PRODOTTO INSERITO');</script>";
                                echo '<meta http-equiv="refresh" content="1">';
                            }
                        }
                    }
                ?>

                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Nome" name ="nome">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Url Immagine" name ="url">
                    </div>

                    <div class="form-group">
                         <textarea rows = "5" cols = "60" class="form-control form-control-user"
                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                   placeholder="Descrizione" name ="descrizione"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control form-control-user"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Prezzo" name ="prezzo" step="0.01">
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="aggiungi" class="btn btn-primary" href="index.php?logout=true">Aggiungi</button>
                    </div>

                </form>



            </div>

        </div>
    </div>
</div>




<!-- Ordine Modal-->
<div class="modal fade" id="OrdineModal" tabindex="-1" role="dialog" aria-labelledby="Crea Ordine"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aggiungi quantità</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                echo "PRODOTTO : " . $prodotto;

                if (isset($_POST['ordina'])){
                    //echo "<script>alert('" .$_POST['quantita']."')</script>";

                    if (!empty($_POST['quantita'])){
                        if ($_POST['quantita']<1){
                            echo "<script>alert('INSERIRE UNA QUANTITÀ MAGGIORE DI 0')</script>";
                        }
                        else{
                            $quantitadisp = $conn->eseguiQuery("SELECT quantita FROM catalogo WHERE catalogo.prodotto = :prodotto;", ['prodotto' => $_SESSION['prodotto']]);
                            if (empty($quantitadisp[0]['quantita'])){
                                $conn->eseguiQueryNoRis("INSERT INTO catalogo (prodotto, quantita) VALUES (:p, :q)", ['p'=>$_SESSION['prodotto'], 'q'=>$_POST['quantita']]);
                                echo "<script>alert('QUANTITA AGGIUNTA');</script>";
                                echo '<meta http-equiv="refresh" content="1">';
                            }
                            else{
                                $nuovaq = $quantitadisp[0]['quantita'] + $_POST['quantita'];
                                $conn->eseguiQueryNoRis("UPDATE catalogo SET quantita =:q WHERE prodotto = :p;", ['p'=>$_SESSION['prodotto'], 'q'=>$nuovaq]);
                                echo "<script>alert('QUANTITA AGGIUNTA');</script>";
                                echo '<meta http-equiv="refresh" content="1">';
                            }
                        }
                    }
                    else{
                        echo "<script>alert('QUANTITÀ NON INSERITA')</script>";
                    }
                }

                ?>

                <form method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Quantità:</label>
                        <input placeholder="0" type="number" class="form-control" id="recipient-name" name="quantita">
                    </div>


            </div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary" name="ordina">Aggiungi quantità</button>

            </div>
            </form>
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

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>