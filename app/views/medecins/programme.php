<?php require APPROOT . '/views/includes/header.php'; ?>

<style>
    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    .animated.faster {
        -webkit-animation-duration: 500ms;
        animation-duration: 500ms;
    }

    .fadeIn {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
    }

    .fadeOut {
        -webkit-animation-name: fadeOut;
        animation-name: fadeOut;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }
</style>
<section class="module-page-title">
    <div class="bg-blue-400 container">
        <div class="row-page-title">
            <div class="page-title-captions">
                <h1 class="h1 text-center">MON PLANNING HEBDOMADAIRE</h1>
            </div>
        </div>
    </div>
</section>
<div class="container mx-auto my-1 p-1 text-white">
    <button onclick="openModal()" class="my-6 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Mettre a jour son planning
    </button>

    <table class="table table-striped">
        <thead class="bg-blue-400">
            <tr>
                <th class="text-center">Jours</th>
                <th>Disponibilité</th>
                <th>Médecin</th>
                <th>Service</th>
            </tr>
        </thead>
        <tbody class="text-black">
            <?php foreach ($data['planning'] as $id => $planning) : ?>

                <tr>
                    <td class="text-center"><?= $planning->jours ?></td>
                    <td><?= $planning->disponibilites ?></td>
                    <td><?= $planning->nomMedecin . " &nbsp; " . $planning->prenomMedecin ?>
                    </td>
                    <td><?= $planning->nomService ?> </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
		style="background: rgba(0,0,0,.7);">
    <div
        class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!--Body-->
            <div class="my-5">
                <p>Inliberali Persius Multi iustitia pronuntiaret expeteretur sanos didicisset laus angusti ferrentur arbitrium arbitramur huic desiderent.?</p>
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button
                    class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                <button
                    class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>