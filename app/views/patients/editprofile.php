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
<div class="text-dark container rounded bg-white mt-1 mb-5">
    <form class="container" action="<?= URLROOT ?>/patients/updateProfile/" method="POST">
        <div class="row">
            <div class="col-md-6 border-right mb-2">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Paramètre de profile</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Nom</label>
                            <input name="nom" class="form-control form-control-lg " id="nom" type="text" value="<?= $data->nomPatient ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Pr&eacute;nom </label>
                            <input type="text" name="prenom" class="form-control form-control-lg " id="prenom"  value="<?=  $data->prenomPatient ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Date de naissance</label>
                            <input name="date" class="form-control form-control-lg " id="date" type="text" value="<?= $data->dateNaissancePatient ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Lieu de naissance</label>
                            <input type="text" name="lieu" class="form-control form-control-lg " id="lieu"  value="<?=  $data->lieuNaissancePatient ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Adresse</label>
                            <input type="text" name="adresse" class="form-control form-control-lg " id="adresse"  value="<?=  $data->adressePatient ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold labels">Genre</label>
                            <select name="sexe" class="form-control">
                                <option value="F"> F&eacute;minin</option>
                                <option value="M"> Masculin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-8">
                            <label class="font-weight-bold labels">Email</label>
                            <input type="text" name="email" class="form-control form-control-lg " id="email"  value="<?=  $_SESSION['userMail'] ?>">
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
                        <input type="text" name="nomUrgence" class="form-control form-control-lg " id="nomUrgence">

                        <label class="font-weight-bold labels">Prénom :</label>
                        <input type="text" name="prenomUrgence" class="form-control form-control-lg " id="prenomUrgence">

                        <label class="font-weight-bold labels">Genre :</label>
                            <select name="sexeUrgence" class="form-control">
                                <option value="F"> F&eacute;minin</option>
                                <option value="M"> Masculin</option>
                            </select>

                        <label class="font-weight-bold labels">Adresse :</label>
                        <input type="text" name="adresseUrgence" class="form-control form-control-lg " id="adresseUrgence">

                        <label class="font-weight-bold labels">Téléphone :</label>
                        <input name="telUrgence" class="form-control form-control-lg" id="telUrgence" type="text">

                        <label class="font-weight-bold labels">Lien :</label>
                        <input name="lien" class="form-control form-control-lg" id="lien" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-2 border-right text-center">
                <div class="row mt-2">
                    <div class="col-md-4 mr-5 mb-2">
                        <button type="submit" class="btn btn-primary" onclick="confirmer()">Valider</button>
                    </div>
                    <div class="col-md-4">
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>