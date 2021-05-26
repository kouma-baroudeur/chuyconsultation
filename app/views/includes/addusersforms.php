<div class="overflow-y-auto w-2/3 h-full md:flex-row">
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="flex justify-between items-center pb-8">
			<p class="text-2xl font-bold">add user</p>
                <div class="modal-close bg-red-600 cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
                <div class="w-full h-full">
                    <form name="user" method="POST" action="./forms/add.php"> 
                        
                        <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">FirtName</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="fname"  placeholder="Michelle" require/><!--? $_POST['fname'] ?? ' '?-->
               </label>
                 <?php if(isset($errors['fname'])):?> <p><?= $errors['fname'] ?> </p> <?php endif ?>
                 <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">LastName</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 name="lname" placeholder="Jane Doe" require
                />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Birth Day</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 name="dob" placeholder="26/10/2001 "
                  type="date" require
                />
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">PlaceBirth</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="pob" placeholder="yaounde"
                  type="text" require
                />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Email
                </span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="email" placeholder="michellefotso2@gmail.com"
                  type="email" require
                />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">grade</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="grade" placeholder="chef de service"
                  type="text" require
                />
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Contact N°
                </span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 name="tel" placeholder="670618686"
                  type="text" require
                />
              </label>
            </div>
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">   
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">password</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="password" placeholder="***********"
                  type="password" require
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  current address
                </span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 name="address" placeholder="mimboman, Cameroun"
                  type="text" require
                />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  spécialities
                </span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="speciality" placeholder="cardiologue"
                  type="text" require
                />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  service
                </span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="service" placeholder="maternité"
                  type="text" require
                />
                </label>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  matricule
                </span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 name="matricul" placeholder="18N280he283ç"
                  type="text"
                />
                </label>
                <div class="flex mt-6 text-sm">
                  <label class="flex items-center dark:text-gray-400">
                  <input
                    type="radio" 
                    class="text-blue-600 form-checkbox focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="gender" value="homme" require
                  />
                  homme
                  </label>
                  <label class="flex items-center dark:text-gray-400">
                  <input
                    type="radio"
                    class="text-blue-600 form-checkbox focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="gender" value="femme" require
                  />
                  femme
                  </label>
                  <?php if(isset($errors['gender'])):?> <p><?= $errors['gender'] ?> </p> <?php endif ?>
                </div>
              <div class="flex justify-end pb-2">
					      <button
					      	class="focus:outline-none modal-close px-4 bg-red-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
					      <button
						      class="focus:outline-none px-4 bg-blue-600 p-3 ml-3 rounded-lg text-white hover:bg-teal-400" type="submit" name="confirm">Confirm</button>
				      </div>


           
         </div>
   </div>
</div>