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
<div class="module-page-title">
<div class="container">
        <div class="row-page-title">
            <div class="page-title-captions">

                <h1 class="h5">
                    Informations personnelles
                </h1>
            </div>
            <div class="page-title-secondary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=URLROOT?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=URLROOT?>/panels/<?=$_SESSION['userType']?>">Mon panneau</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="w-screen h-full mb-8">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="mt-1 flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-4/5 bg-white sm:mx-0 h-full">
            <div class="bg-blue-100 flex flex-col w-full md:w-full p-8 pt-0">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <div class="w-full pt-4">
                        <form class="container" action="<?= URLROOT ?>/medecins/createProfile/" method="POST">

                            <div class="row">
                                <div class="col-25">
                                    <label for="nom"> Nom :</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" class="form-control form-control-lg <?= (!empty($data['nom_err'])) ? 'is-invalid' : '' ?>" id="nom" name="nom" placeholder="Nom" value="<?= $data['nom'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
                        
                                <div class="col-25">
                                    <label for="prenom"> Pr&eacute;nom :</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="prenom" class="form-control form-control-lg <?= (!empty($data['prenom_err'])) ? 'is-invalid' : '' ?>" id="prenom" placeholder="prénom" value="<?= $data['prenom'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
                            
                                <div class="col-25">
                                    <label for="date"> Date de naissance :</label>
                                </div>
                                <div class="col-75">
                                    <input type="date" name="dateNaissance" class="form-control form-control-lg <?= (!empty($data['date_err'])) ? 'is-invalid' : '' ?>" id="date" value="<?= $data['dateNaissance'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                           
                                <div class="col-25">
                                    <label for="lieuNaissance"> Lieu de naissance :</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="lieuNaissance" placeholder="lieu de naissance" class="form-control form-control-lg <?= (!empty($data['lieu_err'])) ? 'is-invalid' : '' ?>" id="lieuNaissance" value="<?= $data['lieuNaissance'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['lieu_err']; ?></span>
                            
                                <div class="col-25">
                                    <label for="sexe"> Sexe :</label>
                                </div>
                                <div class="col-75">
                                    <select name="sexe" id="sexe" class="form-control">
                                        <option value="F"> F&eacute;minin</option>
                                        <option value="M"> Masculin</option>
                                    </select>
                                </div>
                            
                                <div class="col-25">
                                    <label for="adresse"> Adresse :</label>
                                </div>
                                <div class="col-75">
                                    <input name="adresse" class="form-control form-control-lg <?= (!empty($data['adresse_err'])) ? 'is-invalid' : '' ?>" id="adresse" placeholder="adresse" value="<?= $data['adresse'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="service"> Service :</label>
                                </div>
                                <div class="col-75">
                                    <select name="service" id="service" class="form-control">
                                        <?php foreach ($data['services'] as $id => $services) : ?>
                                        <option value="<?= $services->codeService ?>"><?= $services->nomService ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-25">
                                    <label for="service"> Tel :</label>
                                </div>
                                <div class="col-75">
                                    <input name="tel" class="form-control form-control-lg <?= (!empty($data['tel_err'])) ? 'is-invalid' : '' ?>" id="tel" placeholder="693553454" value="<?= $data['tel'] ?>">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['tel_err']; ?></span>
                            
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