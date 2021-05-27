<?php require APPROOT . '/views/includes/header.php'; ?>

<section class="module-page-title">
    <div class="container">
        <div class="row-page-title">
            <div class="page-title-captions">

                <h1 class="h5">
                    Formulaire d'enrégistrement
                </h1>
            </div>
            <div class="page-title-secondary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=URLROOT?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=URLROOT?>/<?=$_SESSION['userType'].'s/'?><?=$_SESSION['userType']?>">Mon panneau</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="mt-12 mb-12 appointment section-bg">
  <div class="container">
      <form method="post">
        <div class="form-row">
          <div class="col-md-4 form-group">
            <input type="text" name="nom" class="form-control form-control-lg <?=(!empty($data['nom_err'])) ? 'is-invalid' : ''?>" id="nom" placeholder="Nom" value="<?=$data['nom']?>">
            <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
          </div>
          <div class="col-md-4 form-group">
            <input type="text" name="prenom" class="form-control form-control-lg <?=(!empty($data['prenom_err'])) ? 'is-invalid' : ''?>" id="prenom" placeholder="Prénom" value="<?=$data['prenom']?>">
            <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
          </div>
          <div class="col-md-4 form-group">
            <input type="date" name="dateNaissance" class="form-control form-control-lg <?=(!empty($data['date_err'])) ? 'is-invalid' : ''?>" id="dateNaissance" placeholder="Date de naissance" value="<?=$data['dateNaissance']?>">
            <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
          </div>
          <div class="col-md-4 form-group">
            <input type="text" name="lieuNaissance" class="form-control form-control-lg <?=(!empty($data['lieu_err'])) ? 'is-invalid' : ''?>" id="lieuNaissance" placeholder="Lieu de naissance" value="<?=$data['lieuNaissance']?>">
            <span class="invalid-feedback"><?php echo $data['lieu_err']; ?></span>
          </div>
          <div class="col-md-4 form-group">
            <select name="sexe" id="sexe" class="form-control">
              <option value="M">Masculin</option>
              <option value="F">Feminin</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 form-group">
            <input type="tel" class="form-control form-control-lg <?=(!empty($data['tel_err'])) ? 'is-invalid' : ''?>" name="tel" id="tel" placeholder="Téléphone" data-rule="minlen:9" data-rule="maxlen:9" value="<?=$data['tel']?>">
            <span class="invalid-feedback"><?php echo $data['tel_err']; ?></span>
          </div>
          <div class="col-md-4 form-group">
            <input name="adresse" class="form-control form-control-lg <?=(!empty($data['adresse_err'])) ? 'is-invalid' : ''?>" type="text" placeholder="Adresse" value="<?=$data['adresse']?>">
            <span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
          </div>
          <div class="col-md-4 form-group">
            <select name="service" id="service" class="form-control">
              <?php foreach($data['services'] as $id => $services) :?>
                <option value="<?=$data['service']?>"><?=$services->nomService?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input name="email" class="form-control form-control-lg <?=(!empty($data['email_err'])) ? 'is-invalid' : ''?>" type="email" placeholder="S'il vous plaît confirmer l'adresse email" value="<?=$data['email']?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
        </div>

        <div class="form-group">
            <button class="btn btn-block btn-lg btn-round btn-brand" type="submit">Valider</button>
        </div>
      </form>
  </div>
</section>
<?php require APPROOT . '/views/includes/footer.php'; ?>