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
                        &#x1F8A8; Retour
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
                            <span><h1>PLANNING HEBDOMADAIRE DE TOUS LES MEDECINS</h1></span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End of Navbar -->

        <div class="container mx-auto my-5 p-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Jours</th>
                        <th>Disponibilité</th>
                        <th>Médecin</th>
                        <th>Service</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($data['planning'] as $id => $planning) :?>

                    <tr>
                        <td class="text-center"><?=$planning->jours?></td>
                        <td><?=$planning->disponibilites?></td>
                        <td><?=$planning->nomMedecin." &nbsp; ".$planning->prenomMedecin?>
                        </td>
                        <td><?=$planning->nomService?> </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
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