<?php
session_start();
if(!isset($_SESSION['loginstate'])){
    header('Location: index.php');
}
else if($_SESSION['pagina'] != 'dashboardRegione'){
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

    <title>Regione - Carrello</title>

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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboardRegione.php">
            <div class="sidebar-brand-text mx-3">
                <img src="img/RMFcommerce.png" style="width: 55%; height: 55%;">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="dashboardRegione.php">
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
            <a class="nav-link" href="catalogoRegione.php">
                <span>Catalogo</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Catalogo -->
        <li class="nav-item active">
            <a class="nav-link" href="carrelloRegione.php">
                <span>Carrello</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Catalogo -->
        <li class="nav-item active">
            <a class="nav-link" href="puntiVenditaRegione.php">
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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Carrello</h1>
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
                    $ris = $conn->eseguiQuery("SELECT ordini.id_ordine, prodotti.nome, prodotti.url, prodotti.descrizione, ordini.quantita, ordini.data, ordini.costo FROM ordini INNER JOIN prodotti ON ordini.prodotto=prodotti.nome WHERE NOT ordini.confermato AND ordini.utente=:user", ['user' => $_SESSION['tipologgato']]);
                    foreach ($ris as $i) {
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
                                              <p style=" font-weight: bold; font-size: large; padding-top: 5%">'.$i["costo"].'€</p>
                                         </div> 
                                        <div class="card-footer">
                                            <form method="post">
                                                <button name="c" type="submit" style="float: center;" value="'.$i["id_ordine"].'" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Rimuovi</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div> 
                                 </div>';
                    }

                    if (isset($_POST['c'])){
                        $ordine = $_POST['c'];
                        $conn->eseguiQueryNoRis("DELETE FROM `ordini` WHERE `ordini`.`id_ordine` = :ordine;", ['ordine'=>$ordine]);
                        echo "<script>alert('PRODOTTO RIMOSSO DAL CARRELLO');</script>";
                        echo '<meta http-equiv="refresh" content="0">';
                    }
                    ?>



                </div>

                <!-- CARDS END -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <footer class="sticky-footer bg-gray-200">
            <div class="container my-auto">
                <div class="copyright text-right my-auto">
                    <p style="font-size: x-large; float: left;">Costo Totale : <?php
                        $ris = $conn->eseguiQuery("SELECT SUM(ordini.costo) as totale FROM ordini WHERE NOT ordini.confermato AND ordini.utente=:user;", ['user' => $_SESSION['tipologgato']]);
                        if (empty($ris[0]['totale'])){
                            echo "0€";
                        }
                        else{
                            echo $ris[0]['totale'] . "€";
                        }
                        ?></p>



                    <?php
                        if (isset($_POST['ordina'])){
                            $numprodotti = $conn->eseguiQuery("SELECT count(*) as numero FROM ordini WHERE NOT ordini.confermato AND ordini.utente=:user ;", ['user' => $_SESSION['tipologgato']]);
                            if ($numprodotti[0]['numero'] == 0){
                                echo "<script>alert('NESSUN PRODOTTO NEL CARRELLO');</script>";
                            }
                            else{
                                $p = $conn->eseguiQuery("SELECT ordini.id_ordine,ordini.prodotto,ordini.quantita as quantita_dellordine,catalogo.quantita as quantitadisponibile,tab1.quantita as quantitarichiestadisponibile FROM (ordini LEFT JOIN catalogo on ordini.prodotto=catalogo.prodotto) INNER JOIN ((SELECT ordini.prodotto as prod, SUM(ordini.quantita) as quantita FROM ordini LEFT JOIN catalogo on ordini.prodotto=catalogo.prodotto WHERE NOT ordini.confermato AND ordini.utente=:user GROUP BY ordini.prodotto, catalogo.quantita)as tab1) on tab1.prod = ordini.prodotto WHERE NOT ordini.confermato AND ordini.utente=:user;", ['user' => $_SESSION['tipologgato']]);
                                $ok = 1;
                                foreach ($p as $i) {
                                    if (empty($i['quantitadisponibile']) || $i['quantitarichiestadisponibile'] > $i['quantitadisponibile']){
                                        echo "<script>alert('IL PRODOTTO " . $i['prodotto'] . " NON É PIÚ DISPONIBILE');</script>";
                                        $conn->eseguiQueryNoRis("DELETE FROM ordini WHERE ordini.id_ordine=:id;", ['id'=>$i['id_ordine']]);
                                        $ok = 0;
                                    }
                                    else{
                                        $nuovaquantita = $i['quantitadisponibile'] - $i['quantitarichiestadisponibile'];
                                        $conn->eseguiQueryNoRis("UPDATE catalogo SET quantita = :nq WHERE prodotto = :prodotto;", ['nq' => $nuovaquantita, 'prodotto' => $i['prodotto']]);
                                        $conn->eseguiQueryNoRis("UPDATE ordini SET ordini.confermato=true WHERE ordini.id_ordine=:ordine", ['ordine'=>$i['id_ordine']]);
                                        if ($nuovaquantita == 0){
                                            $conn->eseguiQueryNoRis("DELETE FROM catalogo WHERE catalogo.quantita = 0", []);
                                        }
                                    }
                                }
                                if($ok == 1){
                                    echo '<meta http-equiv="refresh" content="1">';
                                    echo "<script>alert('ORDINE EFFETTUATO CON SUCCESSO');</script>";
                                }
                            }
                        }
                    ?>
                    <form method="post">
                        <button  type="submit" class="btn btn-primary" name="ordina">Conferma l'ordinazione</button>
                    </form>
                </div>
            </div>
        </footer>
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