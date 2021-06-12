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
</div>
</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>