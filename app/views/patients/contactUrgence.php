<?php require APPROOT . '/views/includes/header.php'; ?>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<div class="module-page-title"></div>
<div class="w-screen h-full mb-8">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="mt-1 flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-4/5 bg-white sm:mx-0 h-full">
            <div class="bg-blue-100 flex flex-col w-full md:w-full p-8 pt-0">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <div class="w-full pt-4">
                        <?= flash('ErrorProfileCreate') ?>
                        <form class="container" action="<?= URLROOT ?>/patients/_2y_10_3FHVz0a6g94pKKveK9sOFOV43tl1ZLKYCpx4jIbvbxgXDf_yizy3a/" method="POST">
                            <div class="d-flex justify-content-between align-items-center experience">
                                <h4 class="text-right">Personne à contacter en cas d'urgence</h4>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="nom"> Nom :</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" class="form-control form-control-lg <?= (!empty($data['nomContact_err'])) ? 'is-invalid' : '' ?>" id="nomContact" name="nomContact" placeholder="Nom" value="<?= $data['nomContact'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['nomContact_err']; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="prenom"> Pr&eacute;nom :</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="prenomContact" class="form-control form-control-lg <?= (!empty($data['prenomContact_err'])) ? 'is-invalid' : '' ?>" id="prenomContact" placeholder="prénom" value="<?= $data['prenomContact'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['prenomContact_err']; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="prenom"> Téléphone :</label>
                                </div>
                                <div class="col-75">
                                    <input type="number" name="telurgence" class="form-control form-control-lg <?= (!empty($data['telurgence_err'])) ? 'is-invalid' : '' ?>" id="telurgence" value="<?= $data['telurgence'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['telurgence_err']; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="sexe"> Sexe :</label>
                                </div>
                                <div class="col-75">
                                    <select name="sexeContact" class="form-control">
                                        <option value="F"> F&eacute;minin</option>
                                        <option value="M"> Masculin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="adresse"> Adresse :</label>
                                </div>
                                <div class="col-75">
                                    <input name="adresseContact" class="form-control form-control-lg <?= (!empty($data['adresseContact_err'])) ? 'is-invalid' : '' ?>" id="adresseContact" cols="25" rows="3" placeholder="adresse d'urgence" value="<?= $data['adresseContact'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['adresseContact_err']; ?></span>
                            </div>
                            <div class="form-group mt-2"></div>
                            <button type="submit" class="btn btn-primary" onclick="confirmer()">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md:block md:w-1/2 rounded-r-lg" style="background: url('<?=REGIMG?>');background-repeat: no-repeat; background-size:cover; background-position: center center;"></div>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>