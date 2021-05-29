<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="module-page-title">
    <div class="bg-blue-400 container">
        <div class="row-page-title">
            <div class="page-title-captions">
                <h1 class="h1 text-center">LE PLANNING HEBDOMADAIRE DES MEDECINS</h1>
            </div>
        </div>
    </div>
</section>
<div class="container mx-auto my-5 p-5 text-white">
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