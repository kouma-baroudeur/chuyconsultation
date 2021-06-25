<div class="wrapper">
    <section class="users">
        <header>
            <div class="content">
                <img src="<?= DOC?>" alt="">
                <div class="details">
                    <span><?php echo $data['medecin']->nomMedecin . " " . $data['medecin']->prenomMedecin ?></span>
                    <p><?php echo 'Active'; ?></p>
                </div>
            </div>
        </header>
        <div class="search">
            <span class="text">Selectionner un utilisateur</span>
            <input type="text" placeholder="Entrer le nom pour chercher...">
            <button>
                <!-- Search input -->
                <div class="flex justify-center flex-1 lg:mr-32">
                <div class="relative w-full max-w-xl mr-6 focus-within:text-blue-600">
                    <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4 dark:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                    </div>
                    <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-white-600 dark:focus:shadow-outline-white dark:focus:placeholder-white dark:bg-gray-700 dark:text-white focus:placeholder-gray-500 focus:bg-white focus:border-blue-600 focus:outline-none focus:shadow-outline-blue form-input" type="text" placeholder="Search..." aria-label="Search" />
                </div>
                </div>
            </button>
        </div>
        <div class="users-list">
            <?php foreach ($data['userlist'] as $id => $users) : ?>
                <div><?=$users->nomMedecin ?></div>
                <div><?=$users->nomPatient ?></div>
            <?php endforeach; ?>
        </div>
    </section>
</div>