<div class="container px-6 mx-auto grid">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    <?= CONSULT ?>
  </h2>

  <?= flash('EtatPostEditCons') ?>
  <!-- With actions -->
  <h4 class="mb-4 text-lg font-semibold text-black dark:text-gray-300">
    Tableau des états
  </h4>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-black uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Médecin</th>
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Contenu</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

          <?php foreach ($data['consult'] as $id => $Consultation) : ?>

            <tr class="text-black dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="<?= DOC ?>" alt="Doc PP" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold"><?= $Consultation->nomMedecin . " " . $Consultation->prenomMedecin ?></p>
                    <p class="text-xs text-black dark:text-gray-400">
                      <?= $Consultation->nomService ?>
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <?= $Consultation->dateConsultation ?>
              </td>
              <td class="px-4 py-3">
                <?= $Consultation->contenu ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-black uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

      <span class="col-span-2"></span>
    </div>
  </div>
</div>