<?php
session_start();
require '../DB/db_conn.php';
$conn = new Essecuelle();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Regione - PuntiVendita</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Punti vendita</h1>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin: 0 1% 0 auto;">
                        <button data-toggle="modal" data-target="#addPunto" style="float: right;" class="btn btn-primary">Aggiungi punto vendita</button>
                    </div>

                </div>


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">PUNTI VENDITA</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>REGIONE</th>
                                    <th>NOME</th>
                                    <th>INDIRIZZO</th>
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
                                $ris = $conn->eseguiQuery("SELECT punti_vendita.regione,punti_vendita.nome_punto,punti_vendita.indirizzo FROM punti_vendita;", []);
                                foreach ($ris as $i) {
                                    echo "<tr>"."<td>".$i["regione"]."</td>"."<td>".$i["nome_punto"]."</td>"."<td>".$i["indirizzo"]."</td></tr>";
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
<div class="modal fade" id="addPunto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aggiunta punto vendita</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                if (isset($_POST['aggiungi'])){
                    if (empty($_POST['regione']) || empty($_POST['nome']) || empty($_POST['indirizzo']) || $_POST['lat'] == "" || $_POST['long'] == ""){
                        echo "<script>alert('COMPILARE TUTTI I CAMPI');</script>";
                    }
                    else{
                        $conn->eseguiQueryNoRis("INSERT INTO punti_vendita (regione, nome_punto, indirizzo, latitudine, longitudine) VALUES (:r, :n, :i, :lat, :long);", ['r'=>$_POST['regione'], 'n'=>$_POST['nome'], 'i'=>$_POST['indirizzo'], 'lat'=>$_POST['lat'], 'long'=>$_POST['long']]);
                        echo "<script>alert('PUNTO VENDITA INSERITO');</script>";
                        echo '<meta http-equiv="refresh" content="1">';
                    }
                }
                ?>

                <form method="post">
                    <div class="form-group">
                        <select class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Regione" name ="regione">
                            <option value="abruzzo">Abruzzo</option>
                            <option value="basilicata">Basilicata</option>
                            <option value="calabria">Calabria</option>
                            <option value="campania">Campania</option>
                            <option value="emilia">Emilia Romagna</option>
                            <option value="friuli">Friuli Venezia Giulia</option>
                            <option value="lazio">Lazio</option>
                            <option value="liguria">Liguria</option>
                            <option value="lombardia">Lombardia</option>
                            <option value="marche">Marche</option>
                            <option value="molise">Molise</option>
                            <option value="piemonte">Piemonte</option>
                            <option value="puglia">Puglia</option>
                            <option value="sardegna">Sardegna</option>
                            <option value="sicilia">Sicilia</option>
                            <option value="toscana">Toscana</option>
                            <option value="trentino">Trentino Alto Adige</option>
                            <option value="umbria">Umbria</option>
                            <option value="valledaosta">Valle D'Aosta</option>
                            <option value="veneto">Veneto</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Nome" name ="nome" >
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Indirizzo" name ="indirizzo">
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control form-control-user"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Latitudine" name ="lat" step="0.00001">
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control form-control-user"
                               id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Longitudine" name ="long" step="0.00001">
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
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>