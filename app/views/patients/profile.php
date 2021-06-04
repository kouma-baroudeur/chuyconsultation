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
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="<?=PAT?>">
                    <span class="font-weight-bold"><?= $data->nomPatient ?></span>
                    <span class="text-black-50"><?= $_SESSION['userMail'] ?></span>
                    <span></span>
        </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Paramètre de profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Nom</label>
                        <div class="px-4 py-2"><?= $data->nomPatient ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Prénom</label>
                        <div class="px-4 py-2"><?= $data->prenomPatient ?></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label class="labels">Sexe</label>
                        <div class="px-4 py-2"><?= $data->sexePatient ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Adresse</label>
                        <div class="px-4 py-2"><?= $data->adressePatient ?></div>
                    </div>
                    <div class="col-md-3">
                        <label class="labels">Email</label>
                        <div class="px-4 py-2"><?= $_SESSION['userMail'] ?></div>
                    </div>
                </div>
                <!-- <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div> -->
            </div>
        </div>
       <!--  <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
    </div>
</div>
</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>