<!DOCTYPE html>
<html lang="fr">
<head>
  <title><?=PATIENT?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?=URLROOT?>/assets/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?=URLROOT?>/assets/styles/tailwind.min.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="<?=SITEICON?>" type="image/gif">
  <style> .footer-links {  a {  padding-bottom: 2px; } } </style>
</head>
<body >
    <div class="bg-white">
        <div class="w-full text-black">
            <div x-data="{ open: false }"
                class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="patient"
                        class="text-lg font-semibold tracking-widest rounded-lg focus:outline-none focus:shadow-outline">
                        &#x1F8A8; Back home
                    </a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}"
                    class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button
                            class="flex flex-row items-center space-x-2 w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent hover:bg-blue-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:bg-blue-600 focus:bg-blue-600 focus:outline-none focus:shadow-outline">
                            <span><h1>Welcome &nbsp; <?=$data->nomPatient?> <?=$data->prenomPatient?></h1></span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End of Navbar -->

        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-2/12 md:w-2/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-blue-600">
                        <div class="image overflow-hidden">
                        <?php echo'
                            <img
                                class="h-auto w-full mx-auto"
                                src="../assets/images/Defaultpic.jpg"
                                alt="patient pp"
                            />
                            ';  
                        ?>
                        </div>
                        
                        <h1 class="text-black font-bold lg:text-sm md:text-xl leading-8 my-10"><?=$data->nomPatient?> <?=$data->prenomPatient?></h1>
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
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-black">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2"><?=$data->nomPatient?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2"><?=$data->prenomPatient?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Gender</div>
                                    <div class="px-4 py-2"><?=$data->sexePatient?></div>
                                </div>
                                
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Adresse</div>
                                    <div class="px-4 py-2"><?=$data->adressePatient?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="#"><?=$data->email?></a>
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
                            <span class="tracking-wide">Emergency contacts</span>
                        </div>
                        <div class="text-black">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2"><?php  echo ucfirst($_SESSION['emergencyfname'])?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2"><?php  echo ($_SESSION['emergencylname'])?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Gender</div>
                                    <div class="px-4 py-2"><?php  echo ($_SESSION['emergencygender'])?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                                    <div class="px-4 py-2"><?php  echo ($_SESSION['emergencyphone'])?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Relationship</div>
                                    <div class="px-4 py-2"><?php  echo ($_SESSION['relationship'])?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-16"></div>
                    <!-- End of about section -->
                </div>
        </div>
    </div>
    <!-- Section 2 -->
    <footer class="bg-blue-700 footer-1 py-4 sm:py-4 mt-40">      
    </footer>
</body>
     <!-- JAVASCRIPTS -->
    <script src="<?=URLROOT?>/assets/scripts/jquery.min.js"></script>
    <script src="<?=URLROOT?>/assets/scripts/alpine.min.js"></script>
</html>