<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <form action="<?= URLROOT ?>/medecins/editPremiereInfo" method="post" class="text-center">
                <h6 class="mb-0">Premieres Observations du Patient</h6>
                <p class="text-sm mb-0">Veuillez remplir les champs</p>

                <div class="row mt-5 col-8 mx-auto">
                    <div class="col-6 col-sm-3">
                        <label class="form-label">Poids (Kg)</label>
                        <div class="form-group">
                            <input class="form-control" value="<?= $data['premiereinfo']->poids ?>" name="poids" type="number" min="0" max="300" data-maxlength="3" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" placeholder="Entree le poids">
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <label class="form-label">Taille (cm)</label>
                        <div class="form-group">
                            <input class="form-control" value="<?= $data['premiereinfo']->taille ?>" name="taille" type="number" min="0" max="300" data-maxlength="3" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" placeholder="Entre la taille">
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <label class="form-label">Pression Arterielle (mmHg)</label>
                        <div class="form-group">
                            <input class="form-control" value="<?= $data['premiereinfo']->PA ?>" name="pa" type="text" placeholder="Example: 112/52">
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <label class="form-label">Pouls (hb/mn)</label>
                        <div class="form-group">
                            <input class="form-control" value="<?= $data['premiereinfo']->pouls ?>" name="pouls" type="number" placeholder="Entre le pouls">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="form-label">Groupe Sanguin</label>
                        <select class="form-control" name="groupeSanguin" id="groupeSanguin">
                            <option value="A" <?= ($data['premiereinfo']->groupeSanguin == 'A' ? 'selected' : '') ?>>Groupe A</option>
                            <option value="B" <?= ($data['premiereinfo']->groupeSanguin == 'B' ? 'selected' : '') ?>>Groupe B</option>
                            <option value="AB" <?= ($data['premiereinfo']->groupeSanguin == 'AB' ? 'selected' : '') ?>>Groupe AB</option>
                            <option value="O" <?= ($data['premiereinfo']->groupeSanguin == 'O' ? 'selected' : '') ?>>Groupe O</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="form-label">Rhesus</label>
                        <select class="form-control" name="rhesus" id="rhesus">
                            <option value="Positive (+)" <?= $data['premiereinfo']->rhesus == 'Positive (+)' ? 'selected' : '' ?>>Positive (+)</option>
                            <option value="Negative (-)" <?= $data['premiereinfo']->rhesus == 'Negative (-)' ? 'selected' : '' ?>>Negative (-)</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="mt-4 form-label">Allergies du Patient</label>
                        <select class="form-control" name="allergies[]" id="allergies-multiple-remove-button" aria-placeholder="Selectionner une allergie" multiple>
                            <?php
                                $allergies = array('Allergie 1', 'Allergie 2');
                                foreach ($allergies as $allergie) {
                                    if ($data['premiereinfo']->allergies != null) {
                                        foreach ($data['premiereinfo']->allergies as $patientAllergie) {
                                            echo "<option " . ($patientAllergie == $allergie ? 'selected' : '') . "value='$allergie'>" . $allergie . "</option>";
                                        }
                                    } else {
                                        echo "<option value='$allergie'>" . $allergie . "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="mt-4 form-label">Examens Physiques</label>
                        <select class="form-control" name="examens[]" id="examens-multiple-remove-button" aria-placeholder="Selectionner un examens" multiple>
                            <?php
                                $examens = array('Examen 1','Examen 2','Examen 3','Examen 4','Examen 5');
                                foreach ($examens as $examen) {
                                    if ($data['premiereinfo']->examensPhysiques != null) {
                                        foreach ($data['premiereinfo']->examensPhysiques as $patientExamens) {
                                            echo "<option " . ($patientExamens == $examen ? 'selected' : '') . "value='$examen'>" . $examen . "</option>";
                                        }
                                    } else {
                                        echo "<option value='$examen'>" . $examen . "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <hr class="horizontal dark my-4">
                    <div class="col-12 mt">
                        <label class="form-label">Antecedents Medicaux</label>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Renseigner les antecedent medicaux ici..."></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Antecedents Familiaux</label>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Renseigner les antecedent familiaux ici..."></textarea>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5">
                        <div class="col-lg-8 col-12 actions text-end ms-auto">
                            <button class="btn bg-gradient-info mb-0" type="submit">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
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

        if (document.getElementById('allergies-multiple-remove-button')) {
            var element = document.getElementById('allergies-multiple-remove-button');
            const example = new Choices(element, {
                removeItemButton: true
            });
        }

        if (document.getElementById('examens-multiple-remove-button')) {
            var element = document.getElementById('examens-multiple-remove-button');
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