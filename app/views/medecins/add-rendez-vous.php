<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="row">

                <div class="col-12 text-center">
                    <h3 class="mt-5">Prendre un Rendez-vous</h3>
                    <h5 class="text-secondary font-weight-normal">Suivez les etapes.</h5>
                    <div class="multisteps-form mb-5">
                        <!--progress bar-->
                        <div class="row">
                            <div class="col-12 col-lg-8 mx-auto my-5">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                                        <span>1.Besoin</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn <?= isset($_GET['serv']) ? 'js-active' : '' ?>" type="button" title="Address">
                                        <span>2.Medecin</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn" <?= isset($_GET['med']) ? 'js-active' : '' ?> type="button" title="Order Info">
                                        <span>3.Date</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn" <?= isset($_GET['date']) ? 'js-active' : '' ?> type="button" title="Order Info">
                                        <span>3.Heure</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Order Info">
                                        <span>Terminer</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--form panels-->
                        <div class="row">
                            <div class="col-12 col-lg-8 m-auto">
                                <form class="multisteps-form__form">
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-10 mx-auto">
                                                <h5 class="font-weight-normal">Quel est votre probleme?</h5>
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start mx-auto">
                                                    <input id="serv" value="14" hidden>
                                                    <label for="projectName" class="form-label">Service</label>
                                                    <select class="form-control" name="service" id="service" onchange=" javascript: var serv = this.value;">
                                                        <option value="all" selected>Tous les Services</option>
                                                        <?php
                                                        foreach ($data['services'] as $id => $service) {
                                                            if (isset($_GET['serv'])) {
                                                                if ($service->codeService == $_GET['serv']) {
                                                                    echo '<option value="' . $service->codeService . '" selected>' . $service->nomService . '</option>';
                                                                } else {
                                                                    echo '<option value="' . $service->codeService . '">' . $service->nomService . '</option>';
                                                                }
                                                            } else {
                                                                echo '<option value="' . $service->codeService . '">' . $service->nomService . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <a onclick="this.href = '<?= URLROOT ?>/medecins/addRdv/?serv='+document.getElementById('service').value" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white <?= isset($_GET['serv']) ? 'js-active' : '' ?>" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-10 mx-auto">
                                                <h5 class="font-weight-normal">Voici le medecins diponible pour votre besoin</h5>
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-4">
                                                <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start mx-auto">
                                                    <label for="projectName" class="form-label">Medecin</label>
                                                    <select class="form-control" name="medecin" id="medecin">
                                                        <?php
                                                        if (isset($_GET['serv'])) {
                                                            $serv = $_GET['serv'];
                                                            if ($serv == 'all') {
                                                                foreach ($data['medecins'] as $id => $medecin) {
                                                                    echo '<option value="' . $medecin->codeMedecin . '" >' . $medecin->nomMedecin . ' ' . $medecin->prenomMedecin . '</option>';
                                                                }
                                                            } else {
                                                                foreach ($data['medecins'] as $id => $medecin) {
                                                                    if ($medecin->codeService == $_GET['serv']) {
                                                                        echo '<option value="' . $medecin->codeMedecin . '" >' . $medecin->nomMedecin . ' ' . $medecin->prenomMedecin . '</option>';
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            foreach ($data['medecins'] as $id => $medecin) {
                                                                echo '<option value="' . $medecin->codeMedecin . '">' . $medecin->nomMedecin . ' ' . $medecin->prenomMedecin . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <a onclick="this.href = '<?= URLROOT ?>/medecins/addRdv/?serv='+document.getElementById('service').value+'&med='+document.getElementById('medecin').value" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white <?= isset($_GET['med']) ? 'js-active' : '' ?>" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-10 mx-auto">
                                                <h5 class="font-weight-normal">Le Medecin est actuellement disponible les jours suivants:</h5>
                                                <p>Lundi, Mardi, Jeudi, Vendredi</p>
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-4">
                                                <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start mx-auto">
                                                    <label for="projectName" class="form-label">Jour</label>
                                                    <input class="form-control datetimepicker" name="date" type="text" placeholder="Veuillez choisir une date correspondant" data-input>
                                                    <!--
                                                    <select class="form-control" name="date" id="date">
                                                        <?php /*
                                                        foreach ($data['plannings'] as $id => $planning) {
                                                            if (isset($_GET['med'])) {
                                                                if ($planning->codeMedecin == $_GET['med']) {
                                                                    echo '<option value="' . $planning->codeJour . '" selected>' . $planning->valeur . '</option>';
                                                                }
                                                            } else {
                                                                echo '<option value="' . $service->codeJour . '">' . $planning->valeur . '</option>';
                                                            }
                                                        }
                                                        */
                                                        ?>
                                                    </select>
                                                    -->
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white <?= isset($_GET['date']) ? 'js-active' : '' ?>" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-10 mx-auto">
                                                <h5 class="font-weight-normal">Voici le medecins diponible pour ce service</h5>
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-4">
                                                <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start mx-auto">
                                                    <?php // echo '<script> document.writeln(document.getElementById("serv").value)</script>' 
                                                    ?>
                                                    <label for="projectName" class="form-label">Medecin</label>
                                                    <select class="form-control" name="medecin" id="medecin">
                                                        <?php
                                                        if (isset($_GET['serv'])) {
                                                            $serv = $_GET['serv'];
                                                            if ($serv == 'all') {
                                                                foreach ($data['medecins'] as $id => $medecin) {
                                                                    echo '<option value="' . $medecin->codeMedecin . '" >' . $medecin->nomMedecin . ' ' . $medecin->prenomMedecin . '</option>';
                                                                }
                                                            } else {
                                                                foreach ($data['medecins'] as $id => $medecin) {
                                                                    if ($medecin->codeService == $_GET['serv']) {
                                                                        echo '<option value="' . $medecin->codeMedecin . '" >' . $medecin->nomMedecin . ' ' . $medecin->prenomMedecin . '</option>';
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            foreach ($data['medecins'] as $id => $medecin) {
                                                                echo '<option value="' . $medecin->codeMedecin . '">' . $medecin->nomMedecin . ' ' . $medecin->prenomMedecin . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
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
                -->
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
    <script src="<?= URLROOT ?>/assets/js/plugins/multistep-form.js"></script>
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
                allowInput: true,
                "enable": [
                    function(date) {
                        // return true to disable
                        return (date.getDay() === 0 || date.getDay() === 6);

                    }
                ]
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