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
    <a href="addPlanning">
    <button class="my-6 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Mettre a jour son planning</button>
    </a>

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
<?php require APPROOT . '/views/includes/footer.php'; ?>