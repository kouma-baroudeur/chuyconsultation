<?php require APPROOT . '/views/includes/header.php'; ?>
<?php foreach ($data['patient'] as $id => $personnel) : ?>
<section class="module-page-title">
    <div class=" container">
        <div class="row-page-title">
            <div class="page-title-secondary">
                <h5 class="h5 text-center">&nbsp; <?= $data['patient']->prenomPatient ?></h5>
            </div>
        </div>
    </div>
</section>
<div class="text-dark container rounded bg-white mt-1 mb-5">
    <form class="container" action="modifierPatient?id=<?=$personnel->IP ?>" method="POST">
        <div class="row">
            <div class="col-md-6 border-right mb-2">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right"></h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Nom</label>
                            <input name="nom" class="form-control form-control-lg <?= (!empty($data['nom_err'])) ? 'is-invalid' : '' ?>" id="nom" type="text" value="<?= $personnel->nomPatient ?>">
                        </div>
                        <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Pr&eacute;nom </label>
                            <input type="text" name="prenom" class="form-control form-control-lg <?= (!empty($data['prenom_err'])) ? 'is-invalid' : '' ?>" id="prenom"  value="<?= $personnel->nomPatient ?>">
                        </div>
                        <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Date de naissance</label>
                            <input name="date" class="form-control form-control-lg <?= (!empty($data['date_err'])) ? 'is-invalid' : '' ?>" id="date" type="date" value="<?=$personnel->dateNaissancePatient ?>">
                        </div>
                        <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Lieu de naissance</label>
                            <input type="text" name="lieu" class="form-control form-control-lg <?= (!empty($data['lieu_err'])) ? 'is-invalid' : '' ?>" id="lieu"  value="<?=  $personnel->lieuNaissancePatient ?>">
                        </div>
                        <span class="invalid-feedback"><?php echo $data['lieu_err']; ?></span>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Adresse</label>
                            <input type="text" name="adresse" class="form-control form-control-lg <?= (!empty($data['adresse_err'])) ? 'is-invalid' : '' ?>" id="adresse"  value="<?=$personnel->adressePatient ?>">
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
                        <input type="text" name="nomContact" class="form-control form-control-lg <?= (!empty($data['nomContact_err'])) ? 'is-invalid' : '' ?>" id="nomContact" value="<?=$personnel->nomContact ?>">
                        <span class="invalid-feedback"><?php echo $data['nomContact_err']; ?></span>

                        <label class="font-weight-bold labels">Prénom :</label>
                        <input type="text" name="prenomContact" class="form-control form-control-lg <?= (!empty($data['prenomContact_err'])) ? 'is-invalid' : '' ?>" id="prenomContact" value="<?=$personnel->prenomContact ?>">
                        <span class="invalid-feedback"><?php echo $data['prenomContact_err']; ?></span>

                        <label class="font-weight-bold labels">Genre :</label>
                            <select name="sexeContact" class="form-control">
                                <option value="F"> F&eacute;minin</option>
                                <option value="M"> Masculin</option>
                            </select>

                        <label class="font-weight-bold labels">Adresse :</label>
                        <input type="text" name="adresseContact" class="form-control form-control-lg <?= (!empty($data['adresseContact_err'])) ? 'is-invalid' : '' ?>" id="adresseContact" value="<?=$personnel->adresseContact ?>">
                        <span class="invalid-feedback"><?php echo $data['adresseContact_err']; ?></span>

                        <label class="font-weight-bold labels">Téléphone :</label>
                        <input name="telurgence" class="form-control form-control-lg <?= (!empty($data['telurgence_err'])) ? 'is-invalid' : '' ?>" id="telurgence" type="text" value="<?=$personnel->telurgence ?>">
                        <span class="invalid-feedback"><?php echo $data['telurgence_err']; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 border-right text-center">
                <div class="row mt-4">
                    <div class="col-md-12 mb-2">
                       <a href="">
                        <button type="submit" class="btn btn-primary" >Valider</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<?php endforeach?>
<?php require APPROOT . '/views/includes/footer.php'; ?>