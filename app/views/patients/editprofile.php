<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="module-page-title">
    <div class=" container">
        <div class="row-page-title">
            <div class="page-title-secondary">
                <h5 class="h5 text-center"><?= $data->nomPatient ?> &nbsp; <?= $data->prenomPatient ?></h5>
            </div>
        </div>
    </div>
</section>
<div class="text-dark container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="<?=PAT?>">
                    <span class="font-weight-bold"><?= $data->nomPatient ?></span>
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
                        <input name="nom" class="form-control form-control-lg <?= (!empty($data['nom_err'])) ? 'is-invalid' : '' ?>" type="text" value="<?= $data->nomPatient ?>">
                        <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Pr&eacute;nom </label>
                        <input type="text" name="prenom" class="form-control form-control-lg <?= (!empty($data['prenom_err'])) ? 'is-invalid' : '' ?>" id="prenom" placeholder="prénom" value="<?=  $data->nomPatient ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Date de naissance</label>
                        <div class="px-4 py-2"><?= $data->dateNaissancePatient ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Lieu de naissance</label>
                        <div class="px-4 py-2"><?= $data->lieuNaissancePatient ?></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold labels">Adresse</label>
                        <div class="px-4 py-2"><?= $data->adressePatient ?></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-9">
                        <label class="font-weight-bold labels">Email</label>
                        <div class="px-4 py-2"><?= $_SESSION['userMail'] ?></div>
                    </div>
                    <div class="col-md-2">
                        <label class="font-weight-bold labels">Sexe</label>
                        <div class="px-4 py-2"><?= $data->sexePatient ?></div>
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
                    <div class="px-4 py-2"><?= $data->emergencyContact ?></div><br/>

                    <label class="font-weight-bold labels">Prénom :</label>
                    <div class="px-4 py-2"><?= $data->emergencyContact ?></div><br/>

                    <label class="font-weight-bold labels">Genre :</label>
                    <div class="px-4 py-2"><?= $data->emergencyContact ?></div><br/>

                    <label class="font-weight-bold labels">Téléphone :</label>
                    <div class="px-4 py-2"><?= $data->emergencyContact ?></div><br/>

                    <label class="font-weight-bold labels">Lien :</label>
                    <div class="px-4 py-2"><?= $data->emergencyContact ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>