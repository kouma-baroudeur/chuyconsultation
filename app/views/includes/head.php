<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #2b6cb0;
  color: white;
  /* padding: 6px 2px; */
  border: none;
  cursor: pointer;
  opacity: 1.8;
  position: fixed;
  bottom: 23px;
  right: 10px;
  width: 45px;
  /* height: 45px; */
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
  <div class="container flex items-center justify-between h-full px-6 mx-auto text-blue-600 dark:text-blue-600">
    <!-- Mobile hamburger -->
    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-blue dark:text-white" @click="toggleSideMenu" aria-label="Menu">
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd">
        </path>
      </svg>
    </button>
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
    <ul class="flex items-center flex-shrink-0 space-x-6">
      <!-- Theme toggler -->
      <li class="flex">
        <button class="rounded-md focus:outline-none focus:shadow-outline-blue" @click="toggleTheme" aria-label="Toggle color mode">
          <template x-if="!dark">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
          </template>
          <template x-if="dark">
            <svg class="w-5 h-5 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
            </svg>
          </template>
        </button>
      </li>
      <!-- Notifications menu -->
      <li class="relative">
        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-blue" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
          <svg class="w-5 h-5 dark:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
          </svg>
          <!-- Notification badge -->
          <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
        </button>
        <template x-if="isNotificationsMenuOpen">
          <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
            <li class="flex">
              <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                <span>notifications</span>
                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                  2
                </span>
              </a>
            </li>
          </ul>
        </template>
      </li>
      <!-- Messages menu -->
      <li class="relative">
        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-blue" @click="toggleMessagesMenu" @keydown.escape="closeMessagesMenu" aria-label="Messages" aria-haspopup="true">
          <svg class="w-5 h-5 dark:text-white" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
          </svg>
          <!-- message badge -->
          <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
        </button>
        <template x-if="isMessagesMenuOpen">
          <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeMessagesMenu" @keydown.escape="closeMessagesMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
            <li class="flex">
              <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                <span>Messages</span>
                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                  13
                </span>
              </a>
            </li>
          </ul>
        </template>
      </li>
      <!-- Profile menu : profile image depend on users-->
      <li class="relative">
        <button class="align-middle rounded-full focus:shadow-outline-blue focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
          <?php
            if ($_SESSION['userType'] == 'patient') {
                ?><img class="object-cover w-12 h-12 rounded-full" src=<?= PAT ?> alt="pp" aria-hidden="true" /><?php
            }
            if ($_SESSION['userType'] == 'admin') {
                ?><img class="object-cover w-12 h-12 rounded-full" src=<?= ADM ?> alt="pp" aria-hidden="true" /><?php
            }
            if ($_SESSION['userType'] == 'medecin') {
          ?><img class="object-cover w-12 h-12 rounded-full" src=<?= DOC ?> alt="pp" aria-hidden="true" /><?php
            }
          ?>

        </button>
        <template x-if="isProfileMenuOpen">
          <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
            <li class="flex">
              <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span><?= $data['patient']->nomPatient . ' ' . $data['patient']->prenomPatient ?></span>
                <span><?= $data['medecin']->nomMedecin . ' ' . $data['medecin']->prenomMedecin ?></span>
                <span><?= $data['admin']->nomMedecin . ' ' . $data['admin']->prenomMedecin ?></span>
              </a>
            </li>
            <li class="flex">
              <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="editP">
                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                  <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span><i class="fa fa-settings-out-alt"></i>Paramètre</span>
              </a>
            </li>
            <li class="flex">
              <a href="<?= URLROOT ?>/users/logout" class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                <span><i class="fa fa-sign-out-alt"></i> Déconnexion</span>
              </a>
            </li>
          </ul>
        </template>
      </li>
    </ul>
  </div>
</header>

<button class="open-button" onclick="openForm()">
  <img src="<?=MESSAGE?>">
</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <section class="users">
      <header>
        <div class="flex content">
          <img src="<?=PAT ?>" width="80px" height="80px" alt="Patient Pp">
          <div class="details">
            <span><?= $data['patient']->nomPatient . ' ' . $data['patient']->prenomPatient ?></span>
            <span><?= $data['medecin']->nomMedecin . ' ' . $data['medecin']->prenomMedecin ?></span>
            <span><?= $data['admin']->nomMedecin . ' ' . $data['admin']->prenomMedecin ?></span>
            <p>Active</p>
          </div>
        </div>
      </header>
      <div class="search">
        <span class="text">Chercher un utilisateur</span>
        <input type="text" placeholder="Entrer le nom...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>