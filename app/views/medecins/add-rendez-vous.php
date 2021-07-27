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
                            <div class="col-12 col-lg-8 mx-auto my-3">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" title="User Info" disabled>
                                        <span>1.Besoin</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn <?= isset($_GET['serv']) ? 'js-active' : '' ?>" type="" title="Address" disabled>
                                        <span>2.Medecin</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn  <?= isset($_GET['med']) ? 'js-active' : '' ?>" type="" title="Order Info" disabled>
                                        <span>3.Date</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn <?= isset($_GET['date']) ? 'js-active' : '' ?>" type="" title="Order Info" disabled>
                                        <span>3.Heure</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn <?= isset($_GET['h']) ? 'js-active' : '' ?>" title="Order Info">
                                        <span>Terminer</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--form panels-->
                        <div class="row">
                            <div class="col-12 col-lg-8 m-auto">
                                <form class="multisteps-form__form" action="<?= URLROOT ?>/medecins/addRendezvous" method="post">
                                    
                                    <input name="patient" value="" hidden/>
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
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white <?= isset($_GET['serv']) && !isset($_GET['med']) ? 'js-active' : '' ?>" data-animation="FadeIn">
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
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white <?= isset($_GET['med']) && !isset($_GET['date']) ? 'js-active' : '' ?>" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-10 mx-auto">
                                                <h5 class="font-weight-normal">Le Medecin est actuellement disponible les jours suivants:</h5>
                                                <p> <?php foreach ($data['plannings'] as $id => $planning) {
                                                        if (isset($_GET['med'])) {
                                                            if ($planning->codeMedecin == $_GET['med']) {
                                                                echo $planning->valeur . ', ';
                                                            }
                                                        }
                                                    } ?></p>
                                                <input id="joursMed" type="text" value="<?php foreach ($data['plannings'] as $id => $planning) {
                                                                                            if (isset($_GET['med'])) {
                                                                                                if ($planning->codeMedecin == $_GET['med']) {
                                                                                                    echo $planning->numero . ',';
                                                                                                }
                                                                                            }
                                                                                        } ?>-1" hidden />
                                                <input id="n" value="" hidden>
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-4">
                                                <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start mx-auto">
                                                    <label for="projectName" class="form-label">Jour</label>
                                                    <input class="form-control datetimepicker" id="date" name="date" value="<?= isset($_GET['date']) ? $_GET['date'] : '' ?>" onchange="getCodeJour()" type="text" placeholder="Veuillez choisir une date correspondant" data-input required>
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <a onclick="this.href = '<?= URLROOT ?>/medecins/addRdv/?serv='+document.getElementById('service').value+'&med='+document.getElementById('medecin').value+'&date='+document.getElementById('date').value+'&n='+document.getElementById('n').value" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white <?= isset($_GET['date']) && !isset($_GET['h']) ? 'js-active' : '' ?>" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-10 mx-auto">
                                                <h5 class="font-weight-normal">Le Medecin sera disponible durant la periode suivante:</h5>
                                                <p> <?php foreach ($data['plannings'] as $id => $planning) {
                                                        if (isset($_GET['med'])) {
                                                            if (isset($_GET['n'])) {
                                                                if ($planning->codeMedecin == $_GET['med']) {
                                                                    if ($planning->numero == $_GET['n']) {
                                                                        echo $planning->heureDebut . ' - ' . $planning->heureFin;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    } ?></p>
                                                <input id="minH" type="text" value="<?php foreach ($data['plannings'] as $id => $planning) {
                                                                                        if (isset($_GET['med'])) {
                                                                                            if (isset($_GET['n'])) {
                                                                                                if ($planning->codeMedecin == $_GET['med']) {
                                                                                                    if ($planning->numero == $_GET['n']) {
                                                                                                        echo $planning->heureDebut;
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    } ?>" hidden />
                                                <input id="maxH" type="text" value="<?php foreach ($data['plannings'] as $id => $planning) {
                                                                                        if (isset($_GET['med'])) {
                                                                                            if (isset($_GET['n'])) {
                                                                                                if ($planning->codeMedecin == $_GET['med']) {
                                                                                                    if ($planning->numero == $_GET['n']) {
                                                                                                        echo $planning->heureFin;
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    } ?>" hidden />
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-4">
                                                <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start mx-auto">
                                                    <label for="projectName" class="form-label">Heure</label>
                                                    <input class="form-control timepicker" id="heure" value="<?= isset($_GET['h']) ? $_GET['h'] : '' ?>" name="heure" type="text" placeholder="Veuillez choisir une heure" data-input required>

                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <a onclick="this.href = '<?= URLROOT ?>/medecins/addRdv/?serv='+document.getElementById('service').value+
                                                '&med='+document.getElementById('medecin').value+
                                                '&date='+document.getElementById('date').value+
                                                '&n='+document.getElementById('n').value+
                                                '&h='+document.getElementById('heure').value" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white <?= isset($_GET['h']) ? 'js-active' : '' ?>" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-10 mx-auto">
                                                <h5 class="font-weight-normal">Confirmer-vous le rendez-vous suivant?</h5>
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-4">
                                                <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start mx-auto">
                                                    <h6 class="text-sm text-center">
                                                        Medecin: <span class="font-weight-bold">
                                                            <?php if (isset($_GET['med'])) {
                                                                foreach ($data['medecins'] as $id => $medecin) {
                                                                    if ($medecin->codeService == $_GET['serv']) {
                                                                        echo 'Dr ' . $medecin->nomMedecin . ' ' . $medecin->prenomMedecin . '&nbsp;&nbsp;&nbsp; Service: ' . $medecin->codeService;
                                                                    }
                                                                }
                                                            } ?></span><br>
                                                        Le: <span class="font-weight-bold"><?= $_GET['date'] ?></span><br>
                                                        A: <span class="font-weight-bold"><?= $_GET['h'] ?> </span><br>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button class="btn bg-gradient-info ms-auto mb-0" type="submit" onclick="this.form.submit()">Terminer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    <script src="<?= URLROOT ?>/assets/js/plugins/multistep-form.js"></script>
    <script>
        function getCodeJour() {
            var data = document.getElementById('date').value;
            var d = new Date(data);

            document.getElementById('n').value = d.getDay();
        }

        if (document.getElementById('choices-multiple-remove-button')) {
            var element = document.getElementById('choices-multiple-remove-button');
            const example = new Choices(element, {
                removeItemButton: true
            });
        }

        function getJoursMed() {
            var jours = document.getElementById('joursMed').value;

            var jours = jours.split(",");
            return jours;
        }

        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true,
                "enable": [
                    function(date) {
                        // return true to disable
                        const jours = getJoursMed();
                        console.log(jours);
                        if (jours.includes("" + date.getDay())) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                ]
            }); // flatpickr
        }

        function getMinHeureMed() {
            var min = document.getElementById('minH').value;
            return min;
        }

        function getMaxHeureMed() {
            var max = document.getElementById('maxH').value;
            return max;
        }

        if (document.querySelector('.timepicker')) {
            flatpickr('.timepicker', {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minTime: getMinHeureMed(),
                maxTime: getMaxHeureMed()
            }); // flatpickr
        }
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