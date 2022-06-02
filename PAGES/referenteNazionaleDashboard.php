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

    <title>Regione - Dashboard</title>

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
                    <h1 class="h3 mb-0 text-gray-800">Dashboard - <?php
                        echo $_SESSION['tipologgato'];
                        ?></h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            ORDINI TOTALI</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            $ris = $conn->eseguiQuery("SELECT count(*) as conteggio FROM ordini WHERE ordini.confermato;", []);
                                            echo $ris[0]["conteggio"];
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            SOLDI SPESI</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            $ris = $conn->eseguiQuery("SELECT sum(ordini.costo) as spese_totali FROM ordini WHERE ordini.confermato;", []);
                                            if(empty($ris[0]['spese_totali'])){
                                                echo "0€";
                                            }
                                            else{
                                                echo $ris[0]["spese_totali"] . "€";
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> PEZZI TOTALI ACQUISTATI</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            $ris = $conn->eseguiQuery("SELECT sum(ordini.quantita) as pezzi_totali FROM ordini  WHERE ordini.confermato;", []);
                                            if(empty($ris[0]["pezzi_totali"])){
                                                echo "0";
                                            }
                                            else{
                                                echo $ris[0]["pezzi_totali"];
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            PRODOTTO PIÙ COMPRATO
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            $ris = $conn->eseguiQuery("SELECT ordini.prodotto FROM ordini WHERE ordini.confermato GROUP BY ordini.prodotto HAVING SUM(ordini.quantita) = (SELECT MAX(tab1.cont) FROM (SELECT SUM(ordini.quantita) AS cont FROM ordini WHERE ordini.confermato GROUP BY ordini.prodotto) as tab1);", []);
                                            if (empty($ris[0]['prodotto'])){
                                                echo "X";
                                            }
                                            else{
                                                echo $ris[0]['prodotto'];
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Content Row -->




                <div class="row">


                    <div class="col-xl-8 col-lg-6">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">TABELLA ORDINI</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ID_ORDINE</th>
                                            <th>REGIONE</th>
                                            <th>PRODOTTO</th>
                                            <th>QUANTITA'</th>
                                            <th>DATA</th>
                                            <th>COSTO</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <!--
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                        </tr>
                                        -->

                                        <?php
                                        $ris = $conn->eseguiQuery("SELECT ordini.utente, ordini.id_ordine, ordini.prodotto, ordini.quantita, ordini.data, ordini.costo FROM ordini  WHERE ordini.confermato;", []);
                                        foreach ($ris as $i) {
                                            echo "<tr>"."<td>".$i["id_ordine"]."</td>"."<td>".$i["utente"]."</td>"."<td>".$i["prodotto"]."</td>"."<td>".$i["quantita"]."</td>"."<td>".$i["data"]."</td>"."<td>".$i["costo"]."€"."</td>"."</tr>";
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-6">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">PERCENTUALE DEGLI ORDINI DELLE REGIONI</h6>

                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>



        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Agenzia di Pippo - riky86 - SprTeo21</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

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





<!-- CreaOrdine Modal-->
<div class="modal fade" id="creaOrdineModal" tabindex="-1" role="dialog" aria-labelledby="Crea Ordine"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crea un nuovo ordine</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>

            </div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="index.php?logout=true">Crea</a>

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
<script src="capoRegioneDashboard.php"></script>










<?php

$val = $conn->eseguiQuery("SELECT ordini.utente, COUNT(*)as conteggio FROM ordini WHERE ordini.confermato GROUP BY ordini.utente;", []);
$tot = $conn->eseguiQuery("SELECT count(*) as conteggio FROM ordini WHERE ordini.confermato;", [])[0]['conteggio'];

$regioniString = "";
$percRegioni = "";

foreach ($val as $i) {
    $regioniString = $regioniString . '"' . $i['utente'] . '",';
    $percRegioni = $percRegioni . (($i['conteggio'])/$tot)*100 . ',';
}

echo '<script>

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: [' . $regioniString . '],
    datasets: [{
      data: ['. $percRegioni .'],
      backgroundColor: ["#00F597","#07EE9C","#0EE6A0","#15DFA5","#1CD7A9","#23D0AE","#2AC9B2","#31C1B7","#38BABB","#3FB2C0","#47ABC5","#4EA4C9","#559CCE","#5C95D2","#638DD7","#6A86DB","#717FE0","#7877E4","#7F70E9","#8668ED","#8D61F2"],
      hoverBackgroundColor: [],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: "#dddfeb",
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


</script>';

?>



</body>

</html>