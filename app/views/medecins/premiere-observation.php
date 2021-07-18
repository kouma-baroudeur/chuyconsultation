<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <form action="<?= URLROOT ?>/medecins/ajouterConsultation" method="post" onsubmit="return getContenu();" class="text-center">
                <h6 class="mb-0">Premieres Observation</h6>
                <p class="text-sm mb-0">Veuillez remplir les champs</p>

                <div class="row mt-5">
                    <div class="col-6 col-sm-3">
                        <label class="form-label">Your Answer</label>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter your answer">
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <label class="form-label">Your Answer</label>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter your answer">
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <label class="form-label">Your Answer</label>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter your answer">
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <label class="form-label">Your Answer</label>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter your answer">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="form-label">Security Question</label>
                        <select class="form-control" name="choices-questions" id="choices-questions">
                            <option value="Question 1">Question 1</option>
                            <option value="Question 2">Question 2</option>
                            <option value="Question 3">Question 3</option>
                            <option value="Your Question" disabled>Your Question</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="form-label">Your Answer</label>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter your answer">
                        </div>
                    </div>
                    <hr class="horizontal dark my-3">
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