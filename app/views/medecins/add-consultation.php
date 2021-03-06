<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-9 col-12 mx-auto">
                    <form action="<?= URLROOT ?>/medecins/ajouterConsultation" method="post" onsubmit="return getContenu();">
                        <div class="card card-body mt-4">
                            <h6 class="mb-0">Nouvelle consultaion</h6>
                            <p class="text-sm mb-0">Veuillez remplir les champs</p>
                            <hr class="horizontal dark my-3">
                            <label for="projectName" class="form-label">Patient</label>

                            <input type="text" class="form-control" name="medecin" value="<?= $data['medecin']->codeMedecin ?>" hidden>
                            <?php
                            if ($data['idPatient'] != null) {
                                echo '<input type="text" class="form-control" name="patient" value="' . $data['patient']->IP. '" hidden>';
                                echo '<select class="form-control" disabled>';
                                echo '<option value="' . $data['patient']->IP. '" selected>' . $data['patient']->nomPatient . ' ' . $data['patient']->prenomPatient . '</option>';
                            } else {
                                echo '<select class="form-control" name="patient">';
                                foreach ($data['patients'] as $id => $patient) {
                                    echo '<option value="' . $patient->IP . '">' . $patient->nomPatient . ' ' . $patient->prenomPatient . '</option>';
                                }
                            }
                            ?>
                            </select>
                            <label class="mt-4">Description de la consultation</label>

                            <div id="contenuText" class="h-100">
                                <p>Consultation chez CHUY</p>
                                <p>Melen, BP XXXX, <strong>tel +237 6XX XXX XXX</strong>, Rue XXXX</p><br>
                                <p><br></p>
                            </div>
                            <input type="text" name="contenu" class="form-control" id="contenu" hidden>
                            <label class="mt-4 form-label">Sympt??mes du Patient</label>
                            <select class="form-control" name="symptomes[]" id="choices-multiple-remove-button" multiple>
                                <option value="Symptome 1" selected>symptome 1</option>
                                <option value="Symptome 2">symptome 2</option>
                                <option value="Symptome 3">symptome 3</option>
                                <option value="Symptome 4">symptome 4</option>
                            </select>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" name="date_consultation">Date de consultaion: </label><span class="text-sm">&nbsp;&nbsp;<?php echo date('d/m/Y'); ?></span>
                                </div>
                                <!--
                                    <label class="mt-4 form-label">Ajouter des documents</label>
                                    <div class="form-control dropzone" id="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </div>
                                -->
                                <div class="button-row d-flex mt-4">
                                    <button class="btn bg-gradient-info ms-auto mb-0 js-btn">
                                        Ajouter Consultation
                                    </button>
                                    <button type="reset" name="button" class="btn btn-light m-0  ms-2" onclick="history.go(-1)">Cancel</button>
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