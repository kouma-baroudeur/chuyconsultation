<link href="<?= URLROOT ?>/assets/styles/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?= URLROOT ?>/assets/styles/tailwind.min.css" rel="stylesheet" type="text/css">
<title><?= SITENAME?></title>
<!-- Favicons-->
<link rel="icon" href="<?= SITEICON ?>" type="image/gif">
<style>
    input:invalid+span:after {
        position: absolute;
        content: '✖';
        padding-left: 5px;
    }

    input:valid+span:after {
        position: absolute;
        content: '✓';
        padding-left: 5px;
    }
</style>
<!-- Modal -->
<div class="bg-blue-300 fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openEventModal">
    <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">

        <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">

            <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Les détails de la journée disponible</h2>

            <form method="post" action="<?= URLROOT ?>/medecins/planningControl/">

                <div class="mb-4 md:flex md:justify-between">
                    <div class="mb-4 md:mr-2 md:mb-0">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                            Jours
                        </label>
                        <input value="LUNDI" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="firstName" type="text" disabled />
                    </div>
                    <div class="md:ml-2">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                            Disponibilités
                        </label>
                        <fieldset class="relative z-0 w-full p-px mb-5">
                            <div class="block pt-3 pb-2 space-x-4">
                                <label>
                                    <input type="radio" name="radio" value="1" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" />
                                    08h30-10h30
                                </label>
                                <label>
                                    <input type="radio" name="radio" value="2" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" />
                                    11h30-14h30
                                </label>
                            </div>
                            <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                        </fieldset>
                    </div>
                </div>
                <hr />

                <div class="mb-4">
                    <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Disponibilité :</label>
                    <input name="disponibilites" class="form-control form-control-lg <?= (!empty($data['disponibilites_err'])) ? 'is-invalid' : '' ?>" id="disponibilites" placeholder="ex: 08h30-18h" value="<?= $data['disponibilites'] ?>">
                    <span class="invalid-feedback"><?php echo $data['disponibilites_err']; ?></span>
                </div>

                <div class="inline-block w-64 mb-4">
                    <label for="inputMedecin" class="form-group text-black-800 block mb-1 font-bold text-lg tracking-wide">Jour</label>
                    <div class="relative">
                        <select name="jours" id="jours" class="form-control">
                            <?php foreach ($data['jours'] as $id => $jours) : ?>
                                <option value="<?= $jours->codeJour ?>"><?= $jours->valeur ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mt-8 text-right">
                    <a href="<?= URLROOT ?>/medecins/planning">
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