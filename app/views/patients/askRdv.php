<link href="<?= URLROOT ?>/assets/styles/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?= URLROOT ?>/assets/styles/tailwind.min.css" rel="stylesheet" type="text/css">

<!-- Modal -->
<div class="bg-blue-300 fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openEventModal">
    <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">

        <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">

            <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Les détails du rendez-vous</h2>

            <form method="post" name="askRdv" action="<?= URLROOT ?>/patients/askRdvAction/<?= $data['patient']->IP ?>">
                <div class="mb-4">
                    <label class="form-group text-gray-800 block mb-1 font-bold text-sm tracking-wide">Date</label>
                    <input name="dateRdv" class="form-control form-control-lg" id="txtDate" type="date" min="<?php echo date("Y-m-d"); ?>">
                </div>

                <div class="mb-4">
                    <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Heure</label>
                    <input name="heureRdv" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="time" min="08:30" max="18:00">
                </div>

                <div class="inline-block w-64 mb-4">
                    <label for="inputMedecin" class="form-group text-black-800 block mb-1 font-bold text-lg tracking-wide">Médecin</label>
                    <div class="relative">
                        <select name="codeMedecin" id="inputMedecin" class="form-control selectpicker" data-style="btn btn-link">
                            <?php foreach ($data['medecins'] as $medecin) : ?>
                                <option value="<?= $medecin->codeMedecin ?>">
                                    <?= $medecin->nomMedecin . " " . $medecin->prenomMedecin . " ( " . $medecin->nomService . " )" ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mt-8 text-right">
                    <a href="patient">
                        <button type="button" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 border border-gray-300 rounded-lg shadow-sm mr-2">
                            Annuler
                        </button>
                    </a>
                    <button type="submit" class="form-group bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-700 rounded-lg shadow-sm">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal -->
<!-- JAVASCRIPTS -->
<script src="<?= URLROOT ?>/assets/scripts/jquery.min.js"></script>
<script src="<?= URLROOT ?>/assets/scripts/alpine.min.js"></script>