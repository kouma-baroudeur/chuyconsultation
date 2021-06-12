<?php require APPROOT . '/views/includes/navbarmed.php'; ?>

<div class="flex flex-col flex-1 w-full">

  <?php require APPROOT . '/views/includes/head.php'; ?>
  <main class="h-full pb-16 overflow-y-auto" id="dynamicContent">
    <div  class="up-form container-fluid">
        <form method="post" name="editRdvForm" action="<?=URLROOT?>/medecins/editRdv/<?=$data['medrdv']->numeroRdv?>">

            <div class="row">

                <div class='col-md-6'>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>ID</label>
                            <input name="numeroRdv" class="form-control form-control-lg" type="text"
                                placeholder="ID" value="<?=$data['medrdv']->numeroRdv?>" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label>IP du Patient </label>
                            <input name="IP" class="form-control form-control-lg disabled" type="text"
                                placeholder="IP du Patient" value="<?=$data['medrdv']->IP?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nom </label>
                            <input name="nomPatient" class="form-control form-control-lg" type="text"
                                placeholder="Nom" value="<?=$data['medrdv']->nomPatient?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Prenom</label>
                            <input name="prenomPatient" class="form-control form-control-lg" type="text"
                                placeholder="Prenom" value="<?=$data['medrdv']->prenomPatient?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Date de naissance </label>
                            <input name="dateNaissancePatient" class="form-control form-control-lg" type="date"
                                placeholder="Date de naissance" value="<?=$data['medrdv']->dateNaissancePatient?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Adresse du patient</label>
                            <input name="adressePatient" class="form-control form-control-lg" type="text"
                                placeholder="Adresse du patient" value="<?=$data['medrdv']->adressePatient?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Sexe </label>
                            <input name="sexePatient" class="form-control form-control-lg" type="text"
                                placeholder="Sexe" value="<?=$data['medrdv']->sexePatient?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Medecin </label>
                            <input name="prenomMedecin" class="form-control form-control-lg" type="text"
                                placeholder="Medecin"
                                value="<?=$data['medrdv']->nomMedecin." ".$data['medrdv']->prenomMedecin?>" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Service</label>
                            <input name="nomService" class="form-control form-control-lg" type="text"
                                placeholder="Service" value="<?=$data['medrdv']->nomService?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Etat de rdv </label>
                            <input name="etatrdv" class="form-control form-control-lg" type="text"
                                placeholder="Etat" value="<?=$data['medrdv']->etatRdv?>"> <!--Should be a dropdown-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Date de rdv</label>
                            <input name="daterdv" class="form-control form-control-lg" type="date"
                                placeholder="Date de rdv" value="<?=$data['medrdv']->dateRdv?>">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Rapport de consultation </label>
                    <textarea name="rapport" rows="20" class="form-control form-control-lg" type="text"
                        placeholder="Rapport de consultation"
                        value=""><?=$data['medrdv']->contenu?>
                    </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-lg btn-round btn-brand" type="submit">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
  </main>
</div>
<!-- Mobile sidebar -->
</div>
<?php require APPROOT . '/views/includes/foot.php'; ?>
