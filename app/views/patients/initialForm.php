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
                        <form class="container" action="<?= URLROOT ?>/patients/_2y_10_ePkQJGLAsOj0QIRddcQ0hOGVinxi3p14xynxXZpM_zZKOTo4mcQAq/" method="POST">

                            <div class="row">
                                <div class="col-25">
                                    <label for="nom"> Nom :</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" class="form-control form-control-lg <?= (!empty($data['nom_err'])) ? 'is-invalid' : '' ?>" id="nom" name="nom" placeholder="Nom" value="<?= $data['nom'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="prenom"> Pr&eacute;nom :</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="prenom" class="form-control form-control-lg <?= (!empty($data['prenom_err'])) ? 'is-invalid' : '' ?>" id="prenom" placeholder="prénom" value="<?= $data['prenom'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="prenom"> Date de naissance :</label>
                                </div>
                                <div class="col-75">
                                    <input type="date" name="dateNaissance" class="form-control form-control-lg <?= (!empty($data['date_err'])) ? 'is-invalid' : '' ?>" id="date" value="<?= $data['dateNaissance'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="prenom"> Lieu de naissance :</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="lieuNaissance" placeholder="lieu de naissance" class="form-control form-control-lg <?= (!empty($data['lieu_err'])) ? 'is-invalid' : '' ?>" id="lieu" value="<?= $data['lieuNaissance'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['lieu_err']; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="sexe"> Sexe :</label>
                                </div>
                                <div class="col-75">
                                    <select name="sexe" class="form-control">
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
                                    <input name="adresse" class="form-control form-control-lg <?= (!empty($data['adresse_err'])) ? 'is-invalid' : '' ?>" id="adresse" cols="25" rows="3" placeholder="adresse" value="<?= $data['adresse'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
                            </div>
                            <div class="form-group mt-5"></div>
                            <button type="submit" class="btn btn-primary" onclick="confirmer()">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md:block md:w-1/2 rounded-r-lg" style="background: url('<?=REGIMG?>');background-repeat: no-repeat; background-size:cover; background-position: center center;"></div>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>