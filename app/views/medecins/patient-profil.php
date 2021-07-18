<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('<?= URLROOT ?>/assets/img/curved-images/curved10.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-dark opacity-9"></span>
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
                            <h5 class="mb-1">
                                Nom et prenom ici<?= $patient->nomPatient . " " . $patient->prenomPatient ?>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                PATIENT / N° <?= $data['patient'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active " href="<?= URLROOT ?>/medecins/addConsultation/<?= $data['patient'] ?>" role="tab" aria-selected="true">
                                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>consultation</title>
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
                                        <span class="ms-1">Consultaion</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 mb-0 px-0 py-1 " href="<?= URLROOT ?>/medecins/chatapp" role="tab" aria-selected="false">
                                        <svg class="text-dark" width="22px" height="22px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>message</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(1.000000, 0.000000)">
                                                            <path class="color-background" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" opacity="0.59858631"></path>
                                                            <path class="color-foreground" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                                                            <path class="color-foreground" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ms-1">Messages</span>
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
                <div class="col-12 col-xl-4 mt-xl-0 ps-auto">
                    <div class="card card-background align-content-center card-background-mask-info h-100 tilt" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                        <div class="full-background" style="background-image: url('<?= URLROOT ?>/assets/img/curved-images/curved7.jpg')"></div>
                        <div class="card-body m-auto my-5 text-center">
                            <h2 class="text-white mb-0 up">Noms</h2>
                            <h2 class="text-white mb-0 up">Prenoms</h2>
                            <span class="badge badge-lg bg-gradient-dark mb-2 up text-md">Homme</span>
                            <h4 class="text-white mb-0 up">adresse</h4>
                            <a href="<?= URLROOT ?>/medecins/chatapp" class="btn btn-outline-white mb-2 px-5 up text-lg">Envoyer Message</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4 col-xl-4 mt-xl-0 mt-4">
                    <div class="card h-100 max-height-vh-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0 text-dark">Premières Observations</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="<?= URLROOT ?>/medecins/premiereObservation/<?= $data['patient'] ?>">
                                        <span class="fas fa-user-edit text-secondary text-sm">EDIT</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Poids:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Taille:</strong> &nbsp; RAS</li>
                                <hr class="horizontal dark my-0">
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Préssion Arterielle:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Pouls:</strong> &nbsp; RAS</li>
                                <hr class="horizontal dark my-0">
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Groupe Sanguin:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Rhesus:</strong> &nbsp; RAS</li>
                                <hr class="horizontal dark my-0">
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Allergies:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Examen Physiques:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Antecedent Medicaux:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Antecedent Familiaux:</strong> &nbsp; RAS</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4 mt-xl-0 mt-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0 text-danger">Contact d'Urgence</h6>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                Les informations suivantes servent à contact un proche du patient en cas d'urgence medical ou informations relative au suivie du patient.
                            </p>
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-danger">Nom:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-danger">Prenom:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-danger">Sexe:</strong> &nbsp; RAS</li>
                                <hr class="horizontal dark my-2">
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-danger">Telephone:</strong> &nbsp; RAS</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-danger">Adrese:</strong> &nbsp; RAS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-xl-6 mt-xl-0">
                    <div class="card h-100 max-height-vh-100">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Dernieres Consultations</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="javascript:;">
                                        <span class="text-secondary text-sm">VOIR TOUT</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-2 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">Dr. Oliver Liam</h6>
                                        <span class="mb-2 text-xs">Type de consultation: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                                        <span class="text-xs">Date: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span>&nbsp;&nbsp; Derniere mise a jour: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <a class="btn btn-link text-info text-gradient px-3 mb-0" href="javascript:;">Voir</a>
                                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex p-2 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">Dr. Lucas Harper</h6>
                                        <span class="mb-2 text-xs">Type de consultation: <span class="text-dark font-weight-bold ms-sm-2">Stone Tech Zone</span></span>
                                        <span class="text-xs">Date: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span>&nbsp;&nbsp; Derniere mise a jour: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <a class="btn btn-link text-info text-gradient px-3 mb-0" href="javascript:;">Voir</a>
                                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex p-2 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">Dr. Ethan James</h6>
                                        <span class="mb-2 text-xs">Type de consultation: <span class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                                        <span class="text-xs">Date: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span>&nbsp;&nbsp; Derniere mise a jour: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <a class="btn btn-link text-info text-gradient px-3 mb-0" href="javascript:;">Voir</a>
                                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex p-2 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">Dr. Ethan James</h6>
                                        <span class="mb-2 text-xs">Type de consultation: <span class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                                        <span class="text-xs">Date: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span>&nbsp;&nbsp; Derniere mise a jour: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <a class="btn btn-link text-info text-gradient px-3 mb-0" href="javascript:;">Voir</a>
                                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3 mt-xl-0">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Documents</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="javascript:;" class="">
                                        <button type="button" class="btn btn-sm btn-white font-weight-bolder">+</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>planning</title>
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
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-xs">nom du document</h6>
                                            <span class="text-xs">date ajout</span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>planning</title>
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
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-xs">nom du document</h6>
                                            <span class="text-xs">date ajout</span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>planning</title>
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
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-xs">nom du document</h6>
                                            <span class="text-xs">date ajout</span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>planning</title>
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
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-xs">nom du document</h6>
                                            <span class="text-xs">date ajout</span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3 mt-xl-0">
                    <div class="card bg-gradient-dark">
                        <div class="card-header pb-0  bg-gradient-dark">
                            <h6 class="text-white">Rendez-vous Prochain</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold text-secondary">24 a venir</span>
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                    <i class="ni ni-check-bold text-info text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-white text-xs font-weight-bold mb-0">$2400, Design changes</h6>
                                        <p class="text-secondary text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                    <i class="ni ni-check-bold text-info text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-white text-xs font-weight-bold mb-0">New order #1832412</h6>
                                        <p class="text-secondary text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                    <i class="ni ni-check-bold text-info text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-white text-xs font-weight-bold mb-0">Server payments for April</h6>
                                        <p class="text-secondary text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                    <i class="ni ni-check-bold text-info text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-white text-xs font-weight-bold mb-0">New card added for order #4395133</h6>
                                        <p class="text-secondary text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require APPROOT . '/views/includes/copyright-ui.php'; ?>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= URLROOT ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Kanban scripts -->
    <script src="<?= URLROOT ?>/assets/js/plugins/multistep-form.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/tilt.min.js"></script>

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