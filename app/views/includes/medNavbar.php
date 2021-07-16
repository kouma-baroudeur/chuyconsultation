<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="javascript:history.go(-1)">Retour</a></li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Ajouter un Patient</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Rechercher ici...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-sm-inline d-none nav-link text-body font-weight-bold m-1"><?= $data['medecin']->nomMedecin ?></span>
                        <div class="avatar avatar-xs me-2 bg-gradient-dark">
                            <span><?= $data['medecin']->nomMedecin[0] ?></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="profil">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="<?= URLROOT ?>/assets/img/team-2.jpg" class="avatar avatar-sm  me-3 " alt="user image">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">Mon Profil</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="chatapp">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">Mes messages</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">Notifications</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="_2y_10_Cb7AAwLgh7Mmx5IH_MW6huC7BFuFsidzcjeA1UDrRep8VzYj0Er6W">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">Parametres</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="<?= URLROOT ?>/users/_2y_10_AG_OSzHJ09ubMAfgTiWdM_Lw_aobUlVAr6Kw7bTOUMXEJPIMUn66W">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">Deconnexion</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->