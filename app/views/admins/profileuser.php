<div class="container px-6 mx-auto grid">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    <?= USERS ?>
  </h2>
  <a href="registerstaff">
    <button class="my-6 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">+Ajouter un personnel
    </button>
  </a>
  <?= flash('register_success') ?>
  <!-- With actions -->
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Liste de tout le personnel du système
  </h4>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">NOM</th>
            <th class="px-4 py-3">PRENOM</th>
            <th class="px-4 py-3">SERVICE</th>
            <th class="px-4 py-3">EMAIL</th>
            <th class="px-4 py-3">TELEPHONE</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        <?php foreach ($data['medecins'] as $id => $personnel) : ?>
            
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold"><?= $personnel->nomMedecin ?></p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <?= $personnel->prenomMedecin ?>
              </td>
              <td class="px-4 py-3">
                <?= $personnel->nomService ?>
              </td>
              <td class="px-4 py-3 text-sm">
                <?= $personnel->email ?>
              </td>
              <td class="px-4 py-3 text-sm">
                <?= $personnel->telMedecin ?>
              </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

      <span class="col-span-2"></span>
      <!-- Pagination -->
    </div>
  </div>
</div>