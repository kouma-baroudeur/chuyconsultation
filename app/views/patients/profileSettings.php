<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= URLROOT ?>/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= URLROOT ?>/assets/img/favicon.png">
    <title>
        Paramettre du Profil
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= URLROOT ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= URLROOT ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="<?= URLROOT ?>/kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= URLROOT ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= URLROOT ?>/assets/css/soft-ui-dashboard.min2c70.css?v=1.0.3" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
</head>

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
                                <a class="nav-link text-body" data-scroll="" href="#basic-info">
                                    <div class="icon me-2">
                                        <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>document</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(154.000000, 300.000000)">
                                                            <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                                            <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="text-sm">Informations de Base</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body" data-scroll="" href="#password">
                                    <div class="icon me-2">
                                        <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>box-3d-50</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(603.000000, 0.000000)">
                                                            <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                                                            <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                                            <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="text-sm">Changer Mot de Passe</span>
                                </a>
                            </li>
                            <li class="nav-item pt-2">
                                <a class="nav-link text-body" data-scroll="" href="#delete">
                                <div class="icon me-2">
                                    <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                                            <path class="color-foreground" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                            </g>
                                        </g>
                                        </g>
                                    </g>
                                    </svg>
                                </div>
                                <span class="text-sm">Supprimer mon Compte</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 mt-lg-0 mt-4">
                    <!-- Navbar -->
                    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" data-scroll="true">
                        <div class="container-fluid py-1 px-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Parametres du Profil</li>
                                </ol>
                                <h6 class="font-weight-bolder mb-0"><a href="javascript:history.go(-1)" >Retour</a></h6>
                            </nav>
                            <div class="mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                        <input type="text" name="search" class="form-control" placeholder="Reachercher ici...">
                                    </div>
                                    <ul class="navbar-nav col-flex col-4 col-sm-4 justify-content-end">
                                        <li class="nav-item d-flex align-items-center">
                                            <a href="<?= URLROOT ?>/users/_2y_10_AG_OSzHJ09ubMAfgTiWdM_Lw_aobUlVAr6Kw7bTOUMXEJPIMUn66W" class="nav-link text-body font-weight-bold px-0" target="_blank">
                                                <i class="fa fa-user me-sm-1"></i>
                                                <span class="d-sm-inline d-none">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                    <!-- Card Profile -->
                    <div class="card card-body m-4" id="profile">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-sm-auto col-4">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="<?= URLROOT ?>/assets/img/bruce-mars.jpg" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-sm-auto col-8 my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1 font-weight-bolder">
                                        <?= $data['patient']->nomPatient . " " . $data['patient']->prenomPatient ?>
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        Patient / <?= $data['patient']->codeService ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                            </div>
                        </div>
                    </div>
                    <!-- Card Patient Basic Info -->
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
                                            <input id="firstName" name="firstName" maxlength="55" value="<?= $data['patient']->nomPatient ?>" class="form-control" type="text" placeholder="Alec" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label">Prenom</label>
                                        <div class="input-group">
                                            <input id="lastName" name="lastName" maxlength="55" value="<?= $data['patient']->prenomPatient ?>" class="form-control" type="text" placeholder="Thompson" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4">Sexe</label>
                                        <select class="form-control" name="choices-gender" id="choices-gender" required>
                                            <?php
                                            if ($data['patient']->sexePatient == 'M') {
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
                                        <label class="form-label mt-4">Date de Naissance</label>
                                        <div class="input-group">
                                            <input id="dateNaissance" name="dateNaissance" value="<?= $data['patient']->dateNaissancePatient ?>" class="form-control" type="Date" value="" max="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label mt-4">Email</label>
                                        <div class="input-group">
                                            <input id="email" name="email" maxlength="55" value="<?= $_SESSION['userMail'] ?>" class="form-control" type="email" placeholder="example@email.com">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mt-4">Confirmation Email</label>
                                        <div class="input-group">
                                            <input id="confirmation" maxlength="55" value="<?= $_SESSION['userMail'] ?>" name="confirmation" class="form-control" type="email" placeholder="example@email.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4">Votre Adresse</label>
                                        <div class="input-group">
                                            <input id="location" name="location" maxlength="55" value="<?= $data['patient']->adressePatient ?>" class="form-control" type="text" placeholder="Sydney, A">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Mettre à jour</button>
                            </div>
                        </div>
                    </form>
                    <!-- Card Patient Emergency Info -->
                    <form action="editContactUrgence" method="post" class="m-4">
                        <div class="card mt-4" id="basic-info">
                            <div class="card-header">
                                <h5>Contact d'Urgence</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label">Nom du contact</label>
                                        <div class="input-group">
                                            <input id="firstName" name="firstName" maxlength="55" value="<?= $data['patient']->nomPatient ?>" class="form-control" type="text" placeholder="Alec" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label">Prenom du contact</label>
                                        <div class="input-group">
                                            <input id="lastName" name="lastName" maxlength="55" value="<?= $data['patient']->prenomPatient ?>" class="form-control" type="text" placeholder="Thompson" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4">Sexe</label>
                                        <select class="form-control" name="choices-gender" id="choices-gender" required>
                                            <?php
                                            if ($data['patient']->sexePatient == 'M') {
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
                                        <label class="form-label mt-4">Adresse du contact</label>
                                        <div class="input-group">
                                            <input id="location" name="location" maxlength="55" value="<?= $data['patient']->adressePatient ?>" class="form-control" type="text" placeholder="Sydney, A">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label mt-4">Numéro de Telephone à contacter en cas d'urgence</label>
                                        <div class="input-group">
                                            <input id="phone" name="phone" data-maxlength="9" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" value="<?= $data['medecin']->telMedecin ?>" class="form-control" type="number" placeholder="6xx xx xx xx">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Mettre à jour</button>
                            </div>
                        </div>
                    </form>
                    <!-- Card Change Password -->
                    <form action="editPasswordMed" method="post" class="m-4">
                        <div class="card mt-4" id="password">
                            <div class="card-header">
                                <h5>Changer le Mot de Passe</h5>
                            </div>
                            <div class="card-body pt-0">
                                <label class="form-label">Mot de passe actuel</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Current password" required>
                                </div>
                                <label class="form-label">Nouveau mot de passe</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="New password" required>
                                </div>
                                <label class="form-label">Confirmer nouveau mot de passe</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Confirm password" required>
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
                        </div>
                    </form>
                    <!-- Card Delete Account -->
                    <form action="deleteAccount" method="post" class="m-4">
                        <div class="card mt-4" id="delete">
                            <div class="card-header">
                            <h5>Supprimer mon Compte</h5>
                            <p class="text-sm mb-0">Si vous decidez de supprimer votre compte, il sera suspendu et vous ne pourez plus vous connecter, ni avoir des consultations, ni creer un compte avec cette email.
                                Neamoins vous pourriez toute fois recuperer votre compte si vous le souhaiter.</p>
                            </div>
                            <div class="card-body d-sm-flex pt-0">
                            <div class="d-flex align-items-center mb-sm-0 mb-4">
                                <div>
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0" required>
                                </div>
                                </div>
                                <div class="ms-2">
                                <span class="text-dark font-weight-bold d-block text-sm">Confirmer</span>
                                <span class="text-xs d-block">Oui, je voudrais supprimmer mon compte.</span>
                                </div>
                            </div>
                            <button class="btn bg-gradient-danger mb-0 ms-auto" name="button">Delete Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script data-cfasync="false" src="<?= URLROOT ?>/../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with love<i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com/" class="font-weight-bold" target="_blank">Optimists & Hardworkers</a>
                                for a better web.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="<?= URLROOT ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/choices.min.js"></script>
    <!-- Kanban scripts -->
    <script src="<?= URLROOT ?>/assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/jkanban/jkanban.js"></script>
    <script>
        if (document.getElementById('choices-gender')) {
            var gender = document.getElementById('choices-gender');
            const example = new Choices(gender);
        }

        if (document.getElementById('choices-language')) {
            var language = document.getElementById('choices-language');
            const example = new Choices(language);
        }

        if (document.getElementById('choices-skills')) {
            var skills = document.getElementById('choices-skills');
            const example = new Choices(skills, {
                delimiter: ',',
                editItems: true,
                maxItemCount: 5,
                removeItemButton: true,
                addItems: true
            });
        }

        if (document.getElementById('choices-year')) {
            var year = document.getElementById('choices-year');
            setTimeout(function() {
                const example = new Choices(year);
            }, 1);

            for (y = 1900; y <= 2020; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 2020) {
                    optn.selected = true;
                }

                year.options.add(optn);
            }
        }

        if (document.getElementById('choices-day')) {
            var day = document.getElementById('choices-day');
            setTimeout(function() {
                const example = new Choices(day);
            }, 1);


            for (y = 1; y <= 31; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 1) {
                    optn.selected = true;
                }

                day.options.add(optn);
            }

        }

        if (document.getElementById('choices-month')) {
            var month = document.getElementById('choices-month');
            setTimeout(function() {
                const example = new Choices(month);
            }, 1);

            var d = new Date();
            var monthArray = new Array();
            monthArray[0] = "January";
            monthArray[1] = "February";
            monthArray[2] = "March";
            monthArray[3] = "April";
            monthArray[4] = "May";
            monthArray[5] = "June";
            monthArray[6] = "July";
            monthArray[7] = "August";
            monthArray[8] = "September";
            monthArray[9] = "October";
            monthArray[10] = "November";
            monthArray[11] = "December";
            for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (m == 1) {
                    optn.selected = true;
                }
                month.options.add(optn);
            }
        }

        function visible() {
            var elem = document.getElementById('profileVisibility');
            if (elem) {
                if (elem.innerHTML == "Compte inactif") {
                    elem.innerHTML = "Compte actif"
                } else {
                    elem.innerHTML = "Compte inactif"
                }
            }
        }

        var openFile = function(event) {
            var input = event.target;

            // Instantiate FileReader
            var reader = new FileReader();
            reader.onload = function() {
                imageFile = reader.result;

                document.getElementById("imageChange").innerHTML = '<img width="200" src="' + imageFile + '" class="rounded-circle w-100 shadow" />';
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="<?= URLROOT ?>/../../buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= URLROOT ?>/assets/js/soft-ui-dashboard.min2c70.js?v=1.0.3"></script>
</body>

</html>