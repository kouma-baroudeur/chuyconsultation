<?php require APPROOT . '/views/includes/header.php'; ?>
    <section class="module-page-title">
        <div class=" container">
            <div class="row-page-title">
                <div class="page-title-secondary">
                    <h5 class="h5 text-center"><?=$data->nomPatient?> &nbsp; <?=$data->prenomPatient?></h5>
                </div>
            </div>
        </div>
    </section>
    <div class="container mx-auto">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-2/12 md:w-2/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-blue-600">
                    <div class="image overflow-hidden">
                        <img
                            class="h-auto w-full mx-auto"
                            src="<?=PAT?>"
                            alt="patient pp"
                        />
                    </div>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-full">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-black leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">A propos</span>
                    </div>
                    <div class="text-black">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nom</div>
                                <div class="px-4 py-2"><?=$data->nomPatient?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Prénom</div>
                                <div class="px-4 py-2"><?=$data->prenomPatient?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Genre</div>
                                <div class="px-4 py-2"><?=$data->sexePatient?></div>
                            </div>
                            
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Adresse</div>
                                <div class="px-4 py-2"><?=$data->adressePatient?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="#"><?=$_SESSION['userMail']?></a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Date de naissance</div>
                                <div class="px-4 py-2"> <?=$data->dateNaissancePatient?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Lieu de naissance</div>
                                <div class="px-4 py-2"> <?=$data->lieuNaissancePatient?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-8"></div>
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-red-600 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path id="Path_33968" d="M7.368,15.854,1.437,19.1a.989.989,0,0,1-1.318-.394h0A1.043,1.043,0,0,1,0,18.243V3.844C0,1.1,1.876,0,4.577,0H10.92C13.538,0,15.5,1.025,15.5,3.661V18.243a.979.979,0,0,1-.979.979,1.08,1.08,0,0,1-.476-.119L8.073,15.854A.741.741,0,0,0,7.368,15.854Z" transform="translate(0.796 0.778)" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                <path id="Line_209" d="M0,.458H7.3" transform="translate(4.87 6.865)" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            </svg>
                        </span>
                        <span class="tracking-wide">Contact en cas d'urgence</span>
                    </div>
                    <div class="text-black">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nom</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Prénom</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Genre</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Téléphone</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Lien</div>
                                <div class="px-4 py-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-16"></div>
                <!-- End of about section -->
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>