<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <a href="addPatient" class="btn btn-icon bg-gradient-info">
                        Nouveau Patient
                    </a>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline">
                        <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                            Filters
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2" data-popper-placement="left-start">
                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Paid</a></li>
                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Refunded</a></li>
                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Canceled</a></li>
                            <li>
                                <hr class="horizontal dark my-2">
                            </li>
                            <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Filter</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-icon btn-outline-dark ms-2 export" data-type="csv" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-archive-2"></i></span>
                        <span class="btn-inner--text">Export CSV</span>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Liste des Patients de l'Hopital</h5>
                            <p class="text-sm mb-0">
                                Veuillez cliquer sur VOIR pour visualiser le profil d'un patient et ses consultations.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-search">
                                <thead class="thead-light">
                                    <tr>
                                        <th>NOMS & PRENOMS</th>
                                        <th>SEXE</th>
                                        <th>ADRESSE</th>
                                        <th>STATUT</th>
                                        <th>OPTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data['patients'] as $id => $patient) : ?>
                                    <tr>
                                        <td class="text-xs font-weight-bold">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xs me-2 bg-gradient-info">
                                                    <span><?= $patient->nomPatient[0] ?></span>
                                                </div>
                                                <span><?= $patient->nomPatient." ".$patient->prenomPatient ?></span>
                                            </div>
                                        </td>
                                        <td class="font-weight-bold">
                                            <span class="my-2 text-xs"><?= $patient->sexePatient ?></span>
                                        </td>
                                        <td class="font-weight-bold">
                                            <span class="my-2 text-xs"><?= $patient->adressePatient ?></span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="badge badge-sm bg-gradient-success">Guéri</span>
                                            </div>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                            <div class="d-flex align-items-center">
                                                <a href="patientProfil" class="btn bg-gradient-dark btn-sm mb-0">voir</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php require APPROOT . '/views/includes/copyright-ui.php'; ?>
        </div>
    </main>
    <?php require APPROOT . '/views/includes/ui-custom.php'; ?>
    </div>
    <!--   Core JS Files   -->
    <script src="../../../assets/js/core/popper.min.js"></script>
    <script src="../../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Kanban scripts -->
    <script src="../../../assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="../../../assets/js/plugins/jkanban/jkanban.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/datatables.js"></script>
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
            searchable: true,
            fixedHeight: true,
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "list-patients_"+ new Date().toLocaleDateString() + type,
                };

                if (type === "csv") {
                    data.columnDelimiter = ";";
                }

                dataTableSearch.export(data);
            });
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= URLROOT ?>/assets/js/soft-ui-dashboard.min2c70.js?v=1.0.3"></script>
</body>


<!-- Mirrored from demos.creative-tim.com/soft-ui-dashboard-pro/pages/applications/wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 01:31:33 GMT -->

</html>