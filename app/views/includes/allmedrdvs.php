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
            <th class="px-4 py-3">Sexe</th>
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Heure</th>
            <th class="px-4 py-3">Etat</th>
            <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

          <?php foreach ($data['rdv'] as $Rendezvous) : ?>

            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="<?= PAT ?>" alt="Patient PP" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold"><?= $Rendezvous->nomPatient . " " . $Rendezvous->prenomPatient ?></p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <?= sexeIco($Rendezvous->sexePatient).''.$Rendezvous->sexePatient?>
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
                  <a href="editRdv">
                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                      </svg>
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