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
<div class="text-dark container rounded bg-white mt-1 mb-5">
    <form class="container" action="<?= URLROOT ?>/patients/_2y_10_K6plTEmyUQTo0G6B_2ueLuzexiyhl2iYCebHq2sGchxX_U2At_JhO/" method="POST">
        <div class="row">
            <div class="col-md-6 border-right mb-2">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Paramètre de profile</h4>
                    </div>
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
                            <input name="date" class="form-control form-control-lg <?= (!empty($data['date_err'])) ? 'is-invalid' : '' ?>" id="date" type="date" value="<?= $data['patient']->dateNaissancePatient ?>">
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
            </div>
            <div class="text-dark col-md-4 border border-danger bg-info">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <h4 class="text-right">Contact d'urgence</h4>
                    </div>
                    <div class="col-md-12">
                        <label class="font-weight-bold labels">Nom :</label>
                        <input type="text" name="nomContact" class="form-control form-control-lg <?= (!empty($data['nomContact_err'])) ? 'is-invalid' : '' ?>" id="nomContact" value="<?=  $data['urgence']->nomContact ?>">
                        <span class="invalid-feedback"><?php echo $data['nomContact_err']; ?></span>

                        <label class="font-weight-bold labels">Prénom :</label>
                        <input type="text" name="prenomContact" class="form-control form-control-lg <?= (!empty($data['prenomContact_err'])) ? 'is-invalid' : '' ?>" id="prenomContact" value="<?=  $data['urgence']->prenomContact ?>">
                        <span class="invalid-feedback"><?php echo $data['prenomContact_err']; ?></span>

                        <label class="font-weight-bold labels">Genre :</label>
                            <select name="sexeContact" class="form-control">
                                <option value="F"> F&eacute;minin</option>
                                <option value="M"> Masculin</option>
                            </select>

                        <label class="font-weight-bold labels">Adresse :</label>
                        <input type="text" name="adresseContact" class="form-control form-control-lg <?= (!empty($data['adresseContact_err'])) ? 'is-invalid' : '' ?>" id="adresseContact" value="<?=  $data['urgence']->adresseContact ?>">
                        <span class="invalid-feedback"><?php echo $data['adresseContact_err']; ?></span>

                        <label class="font-weight-bold labels">Téléphone :</label>
                        <input name="telurgence" class="form-control form-control-lg <?= (!empty($data['telurgence_err'])) ? 'is-invalid' : '' ?>" id="telurgence" type="text" value="<?=  $data['urgence']->telurgence ?>">
                        <span class="invalid-feedback"><?php echo $data['telurgence_err']; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 border-right text-center">
                <div class="row mt-4">
                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary" onclick="confirmer()">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>