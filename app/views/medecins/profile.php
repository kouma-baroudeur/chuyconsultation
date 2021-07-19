<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<<<<<<< HEAD
<body class="g-sidenav-show bg-gray-100">
    <main class="main-content max-height-vh-100 h-full">
        <div class="container-fluid my-3 py-3">
            <div class="row mb-5">
                <div class="col-lg-3">
                    <div class="card position-sticky top-1">
                        <ul class="nav flex-column bg-white border-radius-lg p-3">
                            <li class="nav-item">
                                <a class="nav-link text-body" data-scroll="" href="#profile">
                                    <div class="icon me-2">
                                        <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>spaceship</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(4.000000, 301.000000)">
                                                            <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                                                            <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                                                            <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
                                                            <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" opacity="0.598539807"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="text-sm">Profil</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body" data-scroll="" href="">
                                    <div class="icon me-2">
                                        <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
=======
<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= URLROOT ?>/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
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
>>>>>>> d3b17ef6a8b39e1ad153e4e5460d97dffa4516dd
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
                <div class="col-12 col-md-6 col-xl-8 mt-md-0 mt-4">
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
<<<<<<< HEAD
                    <!-- Card Basic Info -->
                    <form action="editProfile" method="post" class="m-4">
                        <div class="card mt-4" id="basic-info">
                            <div class="card-header">
                                <h5>Informations de Base</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label">Nom</label>
                                        <div class="input-group">
                                            <input id="firstName" name="firstName" maxlength="55" value="<?= $data['medecin']->nomMedecin ?>" class="form-control <?= (!empty($data['nom_err'])) ? 'is-invalid' : '' ?>" type="text" required>
                                        </div>
                                        <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label">Prenom</label>
                                        <div class="input-group">
                                            <input id="lastName" name="lastName" maxlength="55" value="<?= $data['medecin']->prenomMedecin ?>" class="form-control <?= (!empty($data['prenom_err'])) ? 'is-invalid' : '' ?>" type="text" required>
                                        </div>
                                        <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4">Sexe</label>
                                        <select class="form-control <?= (!empty($data['sexe_err'])) ? 'is-invalid' : '' ?>" name="choices-gender" id="choices-gender" required>
                                            <?php
                                            if ($data['medecin']->sexeMedecin == 'M') {
                                                echo '<option value="M" selected>Homme</option>
                                                        <option value="F">Femme</option>';
                                            } else {
                                                echo '<option value="M">Homme</option>
                                                        <option value="F" selected>Femme</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4 ">Service</label>
                                        <div class="input-group">
                                            <input id="service" name="service" maxlength="55" value="<?= $data['medecin']->codeService ?>" class="form-control <?= (!empty($data['service_err'])) ? 'is-invalid' : '' ?>" type="text" required>
                                        </div>
                                        <span class="invalid-feedback"><?php echo $data['service_err']; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4 >">Lieu de Naissance</label>
                                        <div class="input-group">
                                            <input id="lieuNaissance" name="lieuNaissance" maxlength="55" value="<?= $data['medecin']->lieuNaissanceMedecin ?>" class="form-control <?= (!empty($data['lieuNaissance_err'])) ? 'is-invalid' : '' ?>" type="text" required>
                                        </div>
                                        <span class="invalid-feedback"><?php echo $data['lieuNaissance_err']; ?></span>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4">Date de Naissance</label>
                                        <div class="input-group">
                                            <input id="dateNaissance" name="dateNaissance" value="<?= $data['medecin']->dateNaissanceMedecin ?>" class="form-control <?= (!empty($data['dateNaissance_err'])) ? 'is-invalid' : '' ?>" type="Date" value="" max="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <span class="invalid-feedback"><?php echo $data['dateNaissance_err']; ?></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4">Votre Adresse</label>
                                        <div class="input-group">
                                            <input id="location" name="location" maxlength="55" value="<?= $data['medecin']->adresseMedecin ?>" class="form-control <?= (!empty($data['adresse_err'])) ? 'is-invalid' : '' ?>" type="text">
=======
                </div>
                <div class="col-12 col-xl-4 mt-xl-0 mt-4">
                    <div class="card h-100 bg-light">
                        <div class="card-header pb-0 p-3 bg-light">
                            <h6 class="mb-0">Demande de Rendez-vous</h6>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-3 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Patient X</h6>
                                            <span class="text-xs">Bonjour Dr, besoin d'un rdv urgent svp..</span>
>>>>>>> d3b17ef6a8b39e1ad153e4e5460d97dffa4516dd
                                        </div>
                                        <span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
                                    </div>
<<<<<<< HEAD
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4">Numéro de Telephone</label>
                                        <div class="input-group">
                                            <input id="phone" name="phone" data-maxlength="9" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" value="<?= $data['medecin']->telMedecin ?>" class="form-control" type="number">
                                        </div>
                                        <span class="invalid-feedback"><?php echo $data['tel_err']; ?></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Mettre à jour</button>
                            </div>
                        </div>
                    </form>
                    <!-- Card Change Password -->
                    <form action="editInfo" method="post" class="m-4">
                        <div class="card mt-4" id="password">
                            <div class="card-header">
                                <h5>Changer le Mot de Passe</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label mt-4">Email</label>
                                        <div class="input-group">
                                            <input id="email" name="email" maxlength="55" value="<?= $_SESSION['userMail'] ?>" class="form-control  <?= (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" type="email">
                                        </div>
                                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mt-4">Confirmation Email</label>
                                        <div class="input-group">
                                            <input id="confirmation" value="<?= $_SESSION['userMail'] ?>" name="confirmation" class="form-control  <?= (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" type="email">
                                        </div>
                                    </div>
                                </div>
                                <label class="form-label">Mot de passe actuel</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="currentPwd" placeholder="Current password" required>
                                </div>
                                <label class="form-label">Nouveau mot de passe</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="newPwd" placeholder="New password" required>
                                </div>
                                <label class="form-label">Confirmer nouveau mot de passe</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="connfirmPwd" placeholder="Confirm password" required>
                                </div>
                                <h5 class="mt-5">Recommendations du mot de passe</h5>
                                <p class="text-muted mb-2">
                                    S'il vous plait veuillez suivre les recommendations pour un mot de passe fiable:
                                </p>
                                <ul class="text-muted ps-4 mb-0 float-start">
                                    <li>
                                        <span class="text-sm">Un caractère special</span>
                                    </li>
                                    <li>
                                        <span class="text-sm">Min 6 caractères</span>
                                    </li>
                                    <li>
                                        <span class="text-sm">Aumoins un nombre</span>
                                    </li>
                                    <li>
                                        <span class="text-sm">Changer le frequement</span>
                                    </li>
                                </ul>
                                <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Mettre à jour</button>
                            </div>
=======
                                    <div class="d-flex">
                                        <a class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                                    </div>
                                </li>
                            </ul>
>>>>>>> d3b17ef6a8b39e1ad153e4e5460d97dffa4516dd
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