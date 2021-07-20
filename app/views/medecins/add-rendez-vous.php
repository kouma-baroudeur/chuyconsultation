<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto mb-5">
                    <form action="<?= URLROOT ?>/medecins/ajouterRendezvous" method="post" onsubmit="return getContenu();">
                        <div class="card card-body mt-4">
                            <div class="text-center">
                                <h6 class="mb-0">Demander un rendez vous</h6>
                                <p class="text-sm mb-0">Veuillez remplir les champs</p>
                                <hr class="horizontal dark my-3">

                                <input type="text" class="form-control" name="patient" value="<?= $data['patient']->IP ?>" hidden>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-3">
                                    <label for="projectName" class="form-label">Service</label>
                                    <select class="form-control" name="service">
                                        <option value="all" selected>Tous les Services</option>
                                        <?php
                                        foreach ($data['services'] as $id => $service) {
                                            echo '<option value="' . $service->codeService . '">' . $service->nomService . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="projectName" class="form-label">Medecin</label>
                                    <select class="form-control" name="medecin">
                                        <?php
                                        foreach ($data['medecins'] as $id => $medecin) {
                                            echo '<option value="' . $medecin->codeMedecin . '">' . $medecin->nomMedecin . ' ' . $medecin->prenomMedecin . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="projectName" class="form-label">Objet du Rendez-vous</label>
                                    <select class="form-control" name="objet">
                                        <option value="all" selected>Choisissez l'objet</option>
                                        <?php
                                        foreach ($data['objets'] as $id => $objet) {
                                            echo '<option value="' . $objet . '">' . $objet . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="projectName" class="form-label">Date disponible du medecin</label>
                                    <select class="form-control" name="objet">
                                        <option value="all" selected>Choisissez la date de disponibilite</option>
                                        <?php
                                        foreach ($data['joursMedecin'] as $id => $jour) {
                                            echo '<option value="' . $jour . '">' . $jour . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="projectName" class="form-label">Heure disponible du medecin</label>
                                    <select class="form-control" name="objet">
                                        <option value="all" selected>Choisissez l'heure de disponibilite</option>
                                        <?php
                                        foreach ($data['horairesMedecin'] as $id => $horaire) {
                                            echo '<option value="' . $horaire . '">' . $horaire . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="button-row d-flex mt-4">
                                    <button class="btn bg-gradient-info ms-auto mb-0 js-btn">
                                        Ajouter Consultation
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <?php require APPROOT . '/views/includes/copyright-ui.php'; ?>
        </div>
    </main>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= URLROOT ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/choices.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/quill.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/flatpickr.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/dropzone.min.js"></script>
    <script>
        function getContenu() {
            var contenu = document.getElementById('contenuText').innerHTML;
            document.getElementById('contenu').value = contenu;

            return true;
        }

        if (document.getElementById('contenuText')) {
            var quill = new Quill('#contenuText', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        if (document.getElementById('choices-multiple-remove-button')) {
            var element = document.getElementById('choices-multiple-remove-button');
            const example = new Choices(element, {
                removeItemButton: true
            });
        }


        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true
            }); // flatpickr
        }

        Dropzone.autoDiscover = false;
        var drop = document.getElementById('dropzone')
        var myDropzone = new Dropzone(drop, {
            url: "/file/post",
            addRemoveLinks: true

        });
    </script>
    <!-- Kanban scripts -->
    <script src="<?= URLROOT ?>/assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/jkanban/jkanban.js"></script>

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