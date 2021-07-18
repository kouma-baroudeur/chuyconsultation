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
                    <div class="card card-body mt-4">
                        <h6 class="mb-0">Nouvelle consultaion</h6>
                        <p class="text-sm mb-0">Veuillez remplir les champs</p>
                        <hr class="horizontal dark my-3">
                        <label for="projectName" class="form-label">Patient</label>
                        <input type="text" class="form-control" id="medecin" value="" hidden>
                        <select class="form-control" name="patient">
                            <option value="Choice 1" selected>Patient 1</option>
                            <option value="Choice 2">Patient 2</option>
                            <option value="Choice 3">Patient 3</option>
                            <option value="Choice 4">Patient 4</option>
                        </select>
                        <label class="mt-4">Description de la consultaion</label>
                        <div id="contenu" class="h-100">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p><br></p>
                        </div>
                        <label class="mt-4 form-label">Symptômes du Patient</label>
                        <select class="form-control" name="choices-multiple-remove-button" id="choices-multiple-remove-button" multiple>
                            <option value="Choice 1" selected>symptome 1</option>
                            <option value="Choice 2">symptome 2</option>
                            <option value="Choice 3">symptome 3</option>
                            <option value="Choice 4">symptome 4</option>
                        </select>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Date de consultaion: </label><span class="text-sm">&nbsp;&nbsp;<?php echo date('d/m/Y'); ?></span>
                            </div>
                        </div>
                        <label class="mt-4 form-label">Ajouter des documents</label>
                        <div class="form-control dropzone" id="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" name="button" class="btn bg-gradient-info m-0">Create Project</button>
                            <button type="button" name="button" class="btn btn-light m-0  ms-2">Cancel</button>
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
    <script>
        if (document.getElementById('contenu')) {
            var quill = new Quill('#contenu', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        if (document.getElementById('choices-multiple-remove-button')) {
            var element = document.getElementById('choices-multiple-remove-button');
            const example = new Choices(element, {
                removeItemButton: true
            });

            example.setChoices(
                [{
                        value: 'One',
                        label: 'Label One',
                        disabled: true
                    },
                    {
                        value: 'Two',
                        label: 'Label Two',
                        selected: true
                    },
                    {
                        value: 'Three',
                        label: 'Label Three'
                    },
                ],
                'value',
                'label',
                false,
            );
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