<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= URLROOT ?>/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-success opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="<?= URLROOT ?>/assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1 font-weight-bolder">
                                <?= $data['medecin']->nomMedecin . " " . $data['medecin']->prenomMedecin ?>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Medecin / <?= $data['medecin']->codeService ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active" href="chatapp">
                                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>document</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(154.000000, 300.000000)">
                                                            <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                                            <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ms-1">Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active" href="_2y_10_Cb7AAwLgh7Mmx5IH_MW6huC7BFuFsidzcjeA1UDrRep8VzYj0Er6W">
                                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>settings</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(304.000000, 151.000000)">
                                                            <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                            </polygon>
                                                            <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                                            <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ms-1">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row mt-3">
                <div class="col-12 col-sm-6 col-xl-8 mt-sm-0 mt-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Informations de Profil</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal dark my-2">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm w-full"><strong class="text-dark">Nom complet:</strong> &nbsp; <?= $data['medecin']->sexeMedecin ? 'M.' : 'Mme.' ?> <?= $data['medecin']->nomMedecin . " " . $data['medecin']->prenomMedecin ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm w-full"><strong class="text-dark">Telephone:</strong> &nbsp; <?= $data['medecin']->telMedecin ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= $_SESSION['userMail'] ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Adresse:</strong> &nbsp; <?= $data['medecin']->adresseMedecin ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date de Naissance:</strong> &nbsp; <?= $data['medecin']->dateNaissanceMedecin ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Lieu de Naissance:</strong> &nbsp; <?= $data['medecin']->lieuNaissanceMedecin ?></li>
                            </ul>
                            <hr class="horizontal dark my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm text-info"><strong class="text-dark">Code du Service:</strong> &nbsp; <?= $data['medecin']->codeService ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mt-sm-0 mt-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Demande de Rendez-vous</h6>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <?php foreach ($data['rdvs'] as $id => $rdv) : ?>
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-3 mb-2 border-radius-lg bg-success-soft">
                                        <div class=" col-3 icon icon-shape shadow text-center border-radius-md shadow-none">
                                            <i class="ni ni-bell-55 text-lg text-success text-gradient opacity-10" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-8 d-flex">
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm font-weight-bold"><?= $rdv->nomPatient . " " . $rdv->prenomPatient ?></h6>
                                                <span class="text-xs text-dark font-weight-bold"><?= $rdv->dateRdv ?> à <?= $rdv->heureRdv ?></span>
                                            </div>
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="col-1 d-flex align-items-end">
                                            <a class="btn btn-link btn-icon-only btn-rounded btn-md text-dark icon-move-right my-auto" onclick="javascript: showAlert('action',<?= $rdv->numeroRdv ?>);"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                                        </div>
                                        <form hidden class="form-check form-switch ms-auto text-end" id="<?= $rdv->numeroRdv ?>" action="validerRdv" method="post">
                                            <input name="id" value="<?= $rdv->numeroRdv ?>" type="text" hidden>
                                        </form>
                                        <form hidden name="<?= $rdv->numeroRdv ?>" action="supprimmerRdv" method="post">
                                            <input name="id" value="<?= $rdv->numeroRdv ?>" type="text" hidden>
                                        </form>
                                    </li>
                                <?php endforeach; ?>
                                <?= empty($data['rdvs']) ? "<div class='mx-auto mt-8 text-center text-sm font-weight-bold'>Vous n'avez aucune nouvelle<br> demande rendez-vous</div> " : "" ?>
                            </ul>
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
    <script src="<?= URLROOT ?>/assets/js/plugins/sweetalert.min.js"></script>
    <!-- Kanban scripts -->
    <script src="<?= URLROOT ?>/assets/js/plugins/multistep-form.js"></script>

    <script>
        function showMessage(e) {
            if ("success-message" == e)
                Swal.fire("Confirmation!", "Le rendez-vous a été confirmé", "success");
            else if ("delete-message" == e)
                Swal.fire("Suppression", "La demande a été supprimmer", "error");
        }

        function showAlert(e, id) {
            if ("action" == e) {
                const n = Swal.mixin({
                    customClass: {
                        confirmButton: "btn bg-gradient-success",
                        cancelButton: "btn bg-gradient-danger",
                    },
                    buttonsStyling: !1,
                });
                n.fire({
                    title: "Valider/Refuser le rendez-vous?",
                    text: "Veuillez faire un choix!",
                    type: "info",
                    showCancelButton: !0,
                    confirmButtonText: "Valider le rendez-vous",
                    cancelButtonText: "Refuser",
                    reverseButtons: !1,
                }).then((e) => {
                    e.value ?
                        document.getElementById(id).submit() :
                        e.dismiss === Swal.DismissReason.cancel &&
                        Swal.fire("Suppression", "La demande a été supprimmer", "error") &&
                        document.getElementsByName(id)[0].submit();
                });
            }
        }

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