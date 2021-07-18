<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="d-sm-flex justify-content-between">
                <div class="ms-auto my-auto mt-lg-4 mt-4 mb-4">
                    <div class="ms-auto my-auto">
                        <a href="<?= URLROOT ?>/medecins/addConsultationNew" class="btn bg-gradient-info btn-sm mb-0">+&nbsp; Nouvelle Consultation</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-search">
                                <thead class="thead-light">
                                    <tr>
                                        <th>NOMS DU PATIENT</th>
                                        <th>DATE DE CONSULTATION</th>
                                        <th>DERNIERE MODIFICATION LE</th>
                                        <th>OPTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['consultations'] as $id => $consult) : ?>
                                        <tr>
                                            <td class="text-xs font-weight-bold">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-xs me-2 bg-gradient-info">
                                                        <span><?= $consult->nomPatient[0] ?></span>
                                                    </div>
                                                    <span><?= $consult->nomPatient . " " . $consult->prenomPatient ?></span>
                                                </div>
                                            </td>
                                            <td class="font-weight-bold">
                                                <span class="my-2 text-xs"><?= $consult->dateConsultation ?></span>
                                            </td>
                                            <td class="font-weight-bold">
                                                <span class="my-2 text-xs"><?= $consult->dateEdition ?></span>
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <div class="d-flex align-items-center">
                                                    <a href="detailConsultation/<?= $consult->numeroConsultation ?>" class="btn bg-gradient-dark btn-sm mb-0">voir</a>
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
    </div>
    <!--   Core JS Files   -->
    <script src="<?= URLROOT ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>

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
                    filename: "list-patients_" + new Date().toLocaleDateString(),
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