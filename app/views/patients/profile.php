<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="module-page-title">
    <div class=" container">
        <div class="row-page-title">
            <div class="page-title-secondary">
                <h5 class="h5 text-center"><?= $data['patient']->nomPatient ?> &nbsp; <?= $data['patient']->prenomPatient ?></h5>
            </div>
        </div>
    </div>
</section>
<div class="text-dark container rounded bg-white mt-2 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="<?=PAT?>">
                    <span class="font-weight-bold"><?= $data['patient']->nomPatient ?></span>
                    <span ><?= $_SESSION['userMail'] ?></span>
                    <span></span>
            </div>
        </div>
        <div class="col-md-5 border-right mb-2">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Paramètre de profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Nom</label>
                        <div class="px-4 py-2"><?= $data['patient']->nomPatient ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Prénom</label>
                        <div class="px-4 py-2"><?= $data['patient']->prenomPatient ?></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Date de naissance</label>
                        <div class="px-4 py-2"><?= $data['patient']->dateNaissancePatient ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Lieu de naissance</label>
                        <div class="px-4 py-2"><?= $data['patient']->lieuNaissancePatient ?></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Adresse</label>
                        <div class="px-4 py-2"><?= $data['patient']->adressePatient ?></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-9">
                        <label class="font-weight-bold labels">Email</label>
                        <div class="px-4 py-2"><?= $_SESSION['userMail'] ?></div>
                    </div>
                    <div class="col-md-2">
                        <label class="font-weight-bold labels">Sexe</label>
                        <div class="px-4 py-2"><?= sexeIco($data['patient']->sexePatient).' '.$data['patient']->sexePatient ?></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-5">
                        <!-- <a href="infpers"> --><button onclick="openModal()" class="btn btn-primary">éditer</button><!-- </a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="text-dark col-md-4 border border-danger">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <h4 class="text-right">Contact d'urgence</h4>
                </div>
                <div class="col-md-12">
                    <label class="font-weight-bold labels">Nom :</label>
                    <div class="px-4 py-2"><?= $data['urgence']->nomContact ?></div>

                    <label class="font-weight-bold labels">Prénom :</label>
                    <div class="px-4 py-2"><?= $data['urgence']->prenomContact ?></div>

                    <label class="font-weight-bold labels">Genre :</label>
                    <div class="px-4 py-2"><?= $data['urgence']->sexeContact ?></div>

                    <label class="font-weight-bold labels">Téléphone :</label>
                    <div class="px-4 py-2"><?= $data['urgence']->telurgence ?></div>

                    <label class="font-weight-bold labels">Adresse :</label>
                    <div class="px-4 py-2"><?= $data['urgence']->adresseContact ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5 main-modal fixed w-full h-90 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
		style="background: rgba(0,0,0,.7);">
		<div
			class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
			<div class="modal-content py-4 text-left px-6">
				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-xl font-bold">Editer ses informations personnelles</p>
					<div class="modal-close cursor-pointer z-50">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
							viewBox="0 0 18 18">
							<path
								d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
							</path>
						</svg>
					</div>
				</div>
				<!--Body-->
                <form class="container" action="<?= URLROOT ?>/patients/updatePatient/" method="POST">
                    <div class="my-2">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="font-weight-bold labels">Nom</label>
                                <input name="nom" class="form-control form-control-lg <?= (!empty($data['nom_err'])) ? 'is-invalid' : '' ?>" id="nom" type="text" value="<?= $data['patient']->nomPatient ?>">
                            </div>
                            <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
                            <div class="col-md-6">
                                <label class="font-weight-bold labels">Pr&eacute;nom </label>
                                <input type="text" name="prenom" class="form-control form-control-lg <?= (!empty($data['prenom_err'])) ? 'is-invalid' : '' ?>" id="prenom"  value="<?=  $data['patient']->prenomPatient ?>">
                            </div>
                            <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="font-weight-bold labels">Date de naissance</label>
                                <input name="date" class="form-control form-control-lg <?= (!empty($data['date_err'])) ? 'is-invalid' : '' ?>" id="date" type="text" value="<?= $data['patient']->dateNaissancePatient ?>">
                            </div>
                            <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                            <div class="col-md-6">
                                <label class="font-weight-bold labels">Lieu de naissance</label>
                                <input type="text" name="lieu" class="form-control form-control-lg <?= (!empty($data['lieu_err'])) ? 'is-invalid' : '' ?>" id="lieu"  value="<?=  $data['patient']->lieuNaissancePatient ?>">
                            </div>
                            <span class="invalid-feedback"><?php echo $data['lieu_err']; ?></span>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="font-weight-bold labels">Adresse</label>
                                <input type="text" name="adresse" class="form-control form-control-lg <?= (!empty($data['adresse_err'])) ? 'is-invalid' : '' ?>" id="adresse"  value="<?=  $data['patient']->adressePatient ?>">
                            </div>
                            <span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
                            <div class="col-md-6">
                                <label class="font-weight-bold labels">Genre</label>
                                <select name="sexe" class="form-control">
                                    <option value="F"> F&eacute;minin</option>
                                    <option value="M"> Masculin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                
                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <button
                            class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                        <button
                            class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>