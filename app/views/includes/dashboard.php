<div id="dashboard" class="tab-content container px-6 mx-auto grid">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    <?=DASHBOARD?>
  </h2>
  <!-- CTA -->
  <a
    class="flex items-center justify-between p-4 mb-8 text-meduim font-semibold text-white bg-blue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-blue"
    href="askRdv"
  >
    <div class="flex items-center">
      <svg
        class="w-5 h-5 mr-2"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
        ></path>
      </svg>
      <span><?=TAKERDV?></span>
    </div>
    <span>&plus;</span>
  </a>
  <!-- medicaldoc -->
  <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
    <!-- Card -->
    <a href="profile">
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"  >
        <div   class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"  >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"  >
            Profil
          </p>
        </div>
      </div>
    </a>
    <!-- Card -->
    <a href="layouts/messages">
      <div  class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" >
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500" >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" >
            Messages
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200"  >
            35
          </p>
        </div>
      </div>
    </a>
    
  </div>

  <!-- TIMETABLE
  ================================================== -->
 
