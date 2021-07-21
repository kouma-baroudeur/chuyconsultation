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
                    <form action="<?= URLROOT ?>/medecins/editerConsultation" method="post" onsubmit="return getContenu();">
                        <div class="card card-body mt-4">
                            <h6 class="mb-0">Details de la consultaion</h6>
                            <p class="text-sm mb-0">Vous pouvez editer les données de la consultation et les enregistrer de nouveau</p>
                            <hr class="horizontal dark my-3">

                            <input type="text" class="form-control" name="numConsultation" value="<?= $data['consultation']->numeroConsultation ?>" hidden>
                            <input type="text" class="form-control" id="medecin" value="<?= $data['consultation']->codeMedecin ?>" hidden>
                            <input type="text" class="form-control" id="user" value="<?= $data['medecin']->codeMedecin ?>" hidden>
                            <label for="projectName" class="form-label">Patient</label>
                            <select class="form-control" name="patient" disabled>
                                <option value="<?= $data['consultation']->IP ?>" selected><?= $data['consultation']->nomPatient ?> <?= $data['consultation']->prenomPatient ?></option>
                            </select>
                            <label class="mt-4">Description de la consultaion</label>

                            <div id="contenuText" class="h-100">
                                <?= $data['consultation']->contenu ?>
                            </div>
                            <input type="text" class="form-control" name="contenu" id="contenu" hidden>
                            <label class="mt-4 form-label">Symptômes du Patient</label>
                            <select class="form-control" name="symptomes[]" id="choices-multiple-remove-button" multiple>
                                <?php
                                foreach ($data['symptomes'] as $symp) {
                                    echo "<option selected value='$symp'>" . $symp . "</option>";
                                }

                                $symptomes = array('Aucun symptome', 'Symptome 1', 'Symptome 2', 'Symptome 3', 'Symptome 4', 'Symptome 5');
                                foreach ($symptomes as $symptome) {
                                    echo "<option value='$symptome'>" . $symptome . "</option>";
                                }
                                ?>
                            </select>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">Date de consultaion: </label>
                                    <span class="text-sm">&nbsp;&nbsp;<?= $data['consultation']->dateConsultation ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <label class="form-label">Derniere Edition: </label>
                                    <span class="text-sm">&nbsp;&nbsp;<?= $data['consultation']->dateEdition ?></span>
                                </div>
                            </div>
                            <label class="mt-4 form-label">Ajouter des documents</label>
                            <div class="form-control dropzone" id="dropzone">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" name="button" class="btn bg-gradient-info m-0">Enregistrer</button>
                                <button type="reset" name="button" class="btn btn-light m-0  ms-2" onclick="history.go(-1)">Annuler</button>
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
    <script src="<?= URLROOT ?>/assets/js/plugins/sweetalert.min.js"></script>
    <script>
        function showMessage(msg) {
                Swal.fire("Désolé!", msg, "warning");
        }
        function getContenu() {
            var contenu = document.getElementById('contenuText').innerHTML;
            var symptomes = document.getElementById('choices-multiple-remove-button').value;
            var user = document.getElementById('user').value;
            var medecin = document.getElementById('medecin').value;
            var defaultText = '<div class="ql-editor ql-blank" data-gramm="false" contenteditable="true"><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>';
            
            if (user != medecin) {
                var msg = "Vous n'etes pas autoriser à modifier ce consultation <br> Seul le medecin en charge le peut!";
                showMessage(msg);
                return false;
            }

            if (contenu == defaultText) {
                var msg = "Veuillez entrer une description";
                showMessage(msg);
                return false;
            }
            if (symptomes == null || symptomes == '') {
                var msg = "Veuillez choisir un symptome";
                showMessage(msg);
                return false;
            }
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