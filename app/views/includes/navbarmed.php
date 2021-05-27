<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=PATIENTPORTALNAME?></title>
    <link href="<?=URLROOT?>/assets/styles/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?=URLROOT?>/assets/styles/tailwind.output.css" />
    <link rel="stylesheet" href="<?=URLROOT?>/assets/styles/Chart.min.css"/>
    <link rel="icon" href="<?=URLROOT?>/assets/icons/logo.ico" type="image/gif">
  </head>
  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }">
      <!-- Desktop sidebar -->
      <aside class="z-20 hidden w-42 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="<?=URLROOT?>" ><?=HOSPITAL?></a>
          <ul class="mt-6">
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a 
               class=" inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="medecin"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <g id="Home" transform="translate(2.5 2)">
                    <path id="Home-2" data-name="Home" d="M6.657,18.771V15.7a1.426,1.426,0,0,1,1.424-1.419h2.886A1.426,1.426,0,0,1,12.4,15.7h0v3.076A1.225,1.225,0,0,0,13.6,20h1.924A3.456,3.456,0,0,0,19,16.562h0V7.838a2.439,2.439,0,0,0-.962-1.9L11.458.685a3.18,3.18,0,0,0-3.944,0L.962,5.943A2.42,2.42,0,0,0,0,7.847v8.714A3.456,3.456,0,0,0,3.473,20H5.4a1.235,1.235,0,0,0,1.241-1.229h0"/>
                  </g>
                </svg>
                <span class="ml-4"><?=DASHBOARD?></span>
              </a>
            </li>
          </ul>
          <ul class="mb-4">
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="patient"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <g id="_3_User" data-name="3 User" transform="translate(1 3.5)">
                      <path id="Stroke_1" data-name="Stroke 1" d="M0,5.8A2.9,2.9,0,1,0,0,0" transform="translate(16.595 1.629)"/>
                      <path id="Stroke_3" data-name="Stroke 3" d="M0,0A9.435,9.435,0,0,1,1.423.206a2.337,2.337,0,0,1,1.712.978,1.381,1.381,0,0,1,0,1.184,2.361,2.361,0,0,1-1.712.984" transform="translate(17.929 10.585)""/>
                      <path id="Stroke_5" data-name="Stroke 5" d="M2.9,5.8A2.9,2.9,0,1,1,2.9,0" transform="translate(2.388 1.629)"/>
                      <path id="Stroke_7" data-name="Stroke 7" d="M3.268,0A9.435,9.435,0,0,0,1.845.206a2.334,2.334,0,0,0-1.711.978,1.375,1.375,0,0,0,0,1.184,2.358,2.358,0,0,0,1.711.984" transform="translate(0.688 10.585)"/>
                      <path id="Stroke_9" data-name="Stroke 9" d="M6.021,0c3.247,0,6.021.491,6.021,2.458S9.286,4.933,6.021,4.933C2.773,4.933,0,4.441,0,2.475S2.756,0,6.021,0Z" transform="translate(4.917 11.21)"/>
                      <path id="Stroke_11" data-name="Stroke 11" d="M3.858,7.717A3.859,3.859,0,1,1,7.716,3.858,3.845,3.845,0,0,1,3.858,7.717Z" transform="translate(7.08 0.688)"/>
                    </g>
                </svg>
                <span class="ml-4"><?=PERS?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="medoc"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <g id="Iconly_Light_Folder" data-name="Iconly/Light/Folder" transform="translate(1 1)">
                    <g id="Folder">
                      <path id="Path_33957" d="M19.169,13.482c0,3.578-2.109,5.687-5.687,5.687H5.7c-3.587,0-5.7-2.109-5.7-5.687v-7.8C0,2.109,1.314,0,4.893,0h2A2.282,2.282,0,0,1,8.717.913L9.63,2.127a2.291,2.291,0,0,0,1.826.913h2.83c3.587,0,4.911,1.826,4.911,5.477Z"/>
                    </g>
                    <g id="Heart" transform="translate(6.224 7.771)">
                      <path id="Path_33961" d="M3.412,5.951A12.753,12.753,0,0,1,1.193,4.388,3.965,3.965,0,0,1,.137,2.865,2.067,2.067,0,0,1,1.5.1,2.4,2.4,0,0,1,3.412.732h0A2.783,2.783,0,0,1,5.5.1,2.069,2.069,0,0,1,6.863,2.865,3.965,3.965,0,0,1,5.807,4.388,12.753,12.753,0,0,1,3.589,5.951L3.5,6Z" transform="translate(0 -0.047)"/>
                    </g>
                  </g>
                </svg>
                <span class="ml-4"><?=MD?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="rendezvous"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <g id="Document" transform="translate(3.751 2.75)">
                    <path id="Stroke_1" data-name="Stroke 1" d="M7.22.5H0" transform="translate(4.746 12.974)"/>
                    <path id="Stroke_2" data-name="Stroke 2" d="M7.22.5H0" transform="translate(4.746 8.787)"/>
                    <path id="Stroke_3" data-name="Stroke 3" d="M2.755.5H0" transform="translate(4.746 4.61)"/>
                    <path id="Stroke_4" data-name="Stroke 4" d="M12.158,0,4.469,0A4.251,4.251,0,0,0,0,4.607v9.2A4.254,4.254,0,0,0,4.506,18.41l7.689,0a4.252,4.252,0,0,0,4.47-4.6v-9.2A4.255,4.255,0,0,0,12.158,0Z"/>
                  </g>
                </svg>
                <span class="ml-4"><?=REPORT?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="rendezvous"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                    <g id="Calendar" transform="translate(3 2)">
                      <path id="Line_200" d="M0,.473H17.824" transform="translate(0.093 6.931)"/>
                      <path id="Line_201" d="M.459.473H.468" transform="translate(12.984 10.837)"/>
                      <path id="Line_202" d="M.459.473H.468" transform="translate(8.546 10.837)"/>
                      <path id="Line_203" d="M.459.473H.468" transform="translate(4.099 10.837)"/>
                      <path id="Line_204" d="M.459.473H.468" transform="translate(12.984 14.723)"/>
                      <path id="Line_205" d="M.459.473H.468" transform="translate(8.546 14.723)"/>
                      <path id="Line_206" d="M.459.473H.468" transform="translate(4.099 14.723)"/>
                      <path id="Line_207" d="M.463,0V3.291" transform="translate(12.581 0)"/>
                      <path id="Line_208" d="M.463,0V3.291" transform="translate(4.502 0)"/>
                      <path id="Path" d="M13.238,0H4.771C1.834,0,0,1.636,0,4.643v9.05c0,3.054,1.834,4.728,4.771,4.728h8.458c2.946,0,4.771-1.645,4.771-4.652V4.643C18.009,1.636,16.184,0,13.238,0Z" transform="translate(0 1.579)"/>
                    </g>
                </svg>
                <span class="ml-4"><?=RDV?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="consultations"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                 <g id="Chat" transform="translate(2 2)">
                    <path id="Combined_Shape" data-name="Combined Shape" d="M9.085,1.166a1.169,1.169,0,1,1,1.169,1.169A1.169,1.169,0,0,1,9.085,1.166Zm-4.542,0A1.168,1.168,0,1,1,5.711,2.336,1.169,1.169,0,0,1,4.543,1.166ZM0,1.166A1.169,1.169,0,1,1,1.168,2.336,1.169,1.169,0,0,1,0,1.166Z" transform="translate(4.527 9.056)" fill="true"/>
                    <path id="Stroke_7" data-name="Stroke 7" d="M10.02,0A10.006,10.006,0,0,0,0,10.015a10.584,10.584,0,0,0,1.35,5,1.051,1.051,0,0,1,.07.9L.75,18.157a.624.624,0,0,0,.82.78l2.02-.6a1.7,1.7,0,0,1,1.49.361A10,10,0,1,0,10.02,0Z"/>
                  </g>
                </svg>
                <span class="ml-4"><?=CHAT?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="consultations"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                  ></path>
                </svg>
                <span class="ml-4"><?=CONSULT?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="payment"
              >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    fill-rule="evenodd"
                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                    clip-rule="evenodd"
                  ></path>
              </svg>
                <span class="ml-4"><?=PAYMENT?></span>
              </a>
            </li>
          </ul>
          
        </div>
      </aside>
      <!-- Tablette sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-42 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu" >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            <?=HOSPITAL?>
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a 
               class=" inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="medecin"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <g id="Home" transform="translate(2.5 2)">
                    <path id="Home-2" data-name="Home" d="M6.657,18.771V15.7a1.426,1.426,0,0,1,1.424-1.419h2.886A1.426,1.426,0,0,1,12.4,15.7h0v3.076A1.225,1.225,0,0,0,13.6,20h1.924A3.456,3.456,0,0,0,19,16.562h0V7.838a2.439,2.439,0,0,0-.962-1.9L11.458.685a3.18,3.18,0,0,0-3.944,0L.962,5.943A2.42,2.42,0,0,0,0,7.847v8.714A3.456,3.456,0,0,0,3.473,20H5.4a1.235,1.235,0,0,0,1.241-1.229h0"/>
                  </g>
                </svg>
                <span class="ml-4"><?=DASHBOARD?></span>
              </a>
            </li>
          </ul>
          <ul class="mb-4">
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="patient"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <g id="_3_User" data-name="3 User" transform="translate(1 3.5)">
                      <path id="Stroke_1" data-name="Stroke 1" d="M0,5.8A2.9,2.9,0,1,0,0,0" transform="translate(16.595 1.629)"/>
                      <path id="Stroke_3" data-name="Stroke 3" d="M0,0A9.435,9.435,0,0,1,1.423.206a2.337,2.337,0,0,1,1.712.978,1.381,1.381,0,0,1,0,1.184,2.361,2.361,0,0,1-1.712.984" transform="translate(17.929 10.585)""/>
                      <path id="Stroke_5" data-name="Stroke 5" d="M2.9,5.8A2.9,2.9,0,1,1,2.9,0" transform="translate(2.388 1.629)"/>
                      <path id="Stroke_7" data-name="Stroke 7" d="M3.268,0A9.435,9.435,0,0,0,1.845.206a2.334,2.334,0,0,0-1.711.978,1.375,1.375,0,0,0,0,1.184,2.358,2.358,0,0,0,1.711.984" transform="translate(0.688 10.585)"/>
                      <path id="Stroke_9" data-name="Stroke 9" d="M6.021,0c3.247,0,6.021.491,6.021,2.458S9.286,4.933,6.021,4.933C2.773,4.933,0,4.441,0,2.475S2.756,0,6.021,0Z" transform="translate(4.917 11.21)"/>
                      <path id="Stroke_11" data-name="Stroke 11" d="M3.858,7.717A3.859,3.859,0,1,1,7.716,3.858,3.845,3.845,0,0,1,3.858,7.717Z" transform="translate(7.08 0.688)"/>
                    </g>
                </svg>
                <span class="ml-4"><?=PERS?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="medoc"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <g id="Iconly_Light_Folder" data-name="Iconly/Light/Folder" transform="translate(1 1)">
                    <g id="Folder">
                      <path id="Path_33957" d="M19.169,13.482c0,3.578-2.109,5.687-5.687,5.687H5.7c-3.587,0-5.7-2.109-5.7-5.687v-7.8C0,2.109,1.314,0,4.893,0h2A2.282,2.282,0,0,1,8.717.913L9.63,2.127a2.291,2.291,0,0,0,1.826.913h2.83c3.587,0,4.911,1.826,4.911,5.477Z"/>
                    </g>
                    <g id="Heart" transform="translate(6.224 7.771)">
                      <path id="Path_33961" d="M3.412,5.951A12.753,12.753,0,0,1,1.193,4.388,3.965,3.965,0,0,1,.137,2.865,2.067,2.067,0,0,1,1.5.1,2.4,2.4,0,0,1,3.412.732h0A2.783,2.783,0,0,1,5.5.1,2.069,2.069,0,0,1,6.863,2.865,3.965,3.965,0,0,1,5.807,4.388,12.753,12.753,0,0,1,3.589,5.951L3.5,6Z" transform="translate(0 -0.047)"/>
                    </g>
                  </g>
                </svg>
                <span class="ml-4"><?=MD?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="rendezvous"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <g id="Document" transform="translate(3.751 2.75)">
                    <path id="Stroke_1" data-name="Stroke 1" d="M7.22.5H0" transform="translate(4.746 12.974)"/>
                    <path id="Stroke_2" data-name="Stroke 2" d="M7.22.5H0" transform="translate(4.746 8.787)"/>
                    <path id="Stroke_3" data-name="Stroke 3" d="M2.755.5H0" transform="translate(4.746 4.61)"/>
                    <path id="Stroke_4" data-name="Stroke 4" d="M12.158,0,4.469,0A4.251,4.251,0,0,0,0,4.607v9.2A4.254,4.254,0,0,0,4.506,18.41l7.689,0a4.252,4.252,0,0,0,4.47-4.6v-9.2A4.255,4.255,0,0,0,12.158,0Z"/>
                  </g>
                </svg>
                <span class="ml-4"><?=REPORT?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="rendezvous"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                    <g id="Calendar" transform="translate(3 2)">
                      <path id="Line_200" d="M0,.473H17.824" transform="translate(0.093 6.931)"/>
                      <path id="Line_201" d="M.459.473H.468" transform="translate(12.984 10.837)"/>
                      <path id="Line_202" d="M.459.473H.468" transform="translate(8.546 10.837)"/>
                      <path id="Line_203" d="M.459.473H.468" transform="translate(4.099 10.837)"/>
                      <path id="Line_204" d="M.459.473H.468" transform="translate(12.984 14.723)"/>
                      <path id="Line_205" d="M.459.473H.468" transform="translate(8.546 14.723)"/>
                      <path id="Line_206" d="M.459.473H.468" transform="translate(4.099 14.723)"/>
                      <path id="Line_207" d="M.463,0V3.291" transform="translate(12.581 0)"/>
                      <path id="Line_208" d="M.463,0V3.291" transform="translate(4.502 0)"/>
                      <path id="Path" d="M13.238,0H4.771C1.834,0,0,1.636,0,4.643v9.05c0,3.054,1.834,4.728,4.771,4.728h8.458c2.946,0,4.771-1.645,4.771-4.652V4.643C18.009,1.636,16.184,0,13.238,0Z" transform="translate(0 1.579)"/>
                    </g>
                </svg>
                <span class="ml-4"><?=RDV?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="consultations"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                 <g id="Chat" transform="translate(2 2)">
                    <path id="Combined_Shape" data-name="Combined Shape" d="M9.085,1.166a1.169,1.169,0,1,1,1.169,1.169A1.169,1.169,0,0,1,9.085,1.166Zm-4.542,0A1.168,1.168,0,1,1,5.711,2.336,1.169,1.169,0,0,1,4.543,1.166ZM0,1.166A1.169,1.169,0,1,1,1.168,2.336,1.169,1.169,0,0,1,0,1.166Z" transform="translate(4.527 9.056)" fill="true"/>
                    <path id="Stroke_7" data-name="Stroke 7" d="M10.02,0A10.006,10.006,0,0,0,0,10.015a10.584,10.584,0,0,0,1.35,5,1.051,1.051,0,0,1,.07.9L.75,18.157a.624.624,0,0,0,.82.78l2.02-.6a1.7,1.7,0,0,1,1.49.361A10,10,0,1,0,10.02,0Z"/>
                  </g>
                </svg>
                <span class="ml-4"><?=CHAT?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="consultations"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                  ></path>
                </svg>
                <span class="ml-4"><?=CONSULT?></span>
              </a>
            </li>
            <li class="relative px-6 py-3 mb-2">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="payment"
              >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    fill-rule="evenodd"
                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                    clip-rule="evenodd"
                  ></path>
              </svg>
                <span class="ml-4"><?=PAYMENT?></span>
              </a>
            </li>
          </ul>
          
        </div>
      </aside>