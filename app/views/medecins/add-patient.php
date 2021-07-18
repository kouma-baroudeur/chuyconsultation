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
                    <h3 class="mt-5">AJOUTER UN PATIENT</h3>
                    <div class="multisteps-form mb-5">
                        <!--progress bar-->
                        <div class="row">
                            <div class="col-12 col-lg-8 mx-auto my-5">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                                        <span>Creer le compte</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn" id="terminer" type="button" title="Address">
                                        <span>Terminer</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--form panels-->
                        <div class="row">
                            <div class="col-12 col-lg-8 m-auto">
                                <form class="multisteps-form__form" action="createPatient" method="POST" >
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-10 mx-auto">
                                                <h5 class="font-weight-normal">Saisissez les informations suivantes</h5>
                                                <p>Noter bien que ces informations servirons uniquement à la création du compte patient, Il devra ensuite renseigner ses données personnels lors de sa première connexion!</p>
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-4">
                                                    <div class="avatar avatar-xxl position-relative">
                                                        <img src="<?= URLROOT ?>/assets/img/team-2.jpg" class="border-radius-md h-300 w-100" alt="team-2">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-8 mt-4 mt-sm-0 text-start">
                                                    <label>Email du Patient</label>
                                                    <input class="multisteps-form__input form-control mb-3" name="email" maxlength="55" type="email" placeholder="Eg. nompatient@chuy.com" required/>
                                                    <label>Premier Mot de Passe</label>
                                                    <input class="multisteps-form__input form-control mb-3" name="password" maxlength="55" type="password" required/>
                                                    <label>Confirmer Mot de Passe</label>
                                                    <input class="multisteps-form__input form-control" name="confirm_pass" maxlength="55" type="password" required/>
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-info ms-auto mb-0 js-btn" title="Next" onclick=" javascript: document.getElementById('terminer').setAttribute('class','multisteps-form__progress-btn js-active'); notify(this);" data-type="success" data-content="Le compte a été créé, le patient doit verifier sa boite mail." data-title="Compte Patient Créé!" data-icon="ni ni-bell-55">
                                                    Créer Patient
                                                </button>
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
    <script src="<?= URLROOT ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Kanban scripts -->
    <script src="<?= URLROOT ?>/assets/js/plugins/multistep-form.js"></script>
    
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