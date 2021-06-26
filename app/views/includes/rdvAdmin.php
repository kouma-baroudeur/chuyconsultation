<div class="container px-6 mx-auto grid">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    <?= REPORT ?>
  </h2>

  <?= flash('EtatPostEditCons') ?>
  <!-- With actions -->
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Tableau des états
  </h4>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Patient</th>
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Heure</th>
            <th class="px-4 py-3">Etat</th>
            <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

          <?php foreach ($data['rdv'] as $id => $Rendezvous) : ?>

            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="<?= PAT ?>" alt="Pat PP" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold"><?= $Rendezvous->nomPatient . " " . $Rendezvous->prenomPatient ?></p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      <?= $Rendezvous->nomService ?>
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <?= $Rendezvous->dateRdv ?>
              </td>
              <td class="px-4 py-3">
                <?= $Rendezvous->heureRdv ?>
              </td>
              <td class="px-4 py-3 text-sm">
                <?= $Rendezvous->etatRdv ?>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                <a href="statutC?id=<?= $Rendezvous->numeroRdv ?>">
                   <button class="my4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" name="confirmer" value="confirmer">CONFIRMER
                   </button>
                  </a>
                  <a href="statutA?id=<?= $Rendezvous->numeroRdv ?>">
                   <button class="my4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" name="annuler">ANNULER
                   </button>
                  </a>
                </div>
              </td>
            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

      <span class="col-span-2"></span>
    </div>
  </div>
</div>