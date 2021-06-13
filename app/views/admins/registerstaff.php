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
<section class="module-page-title">
    <div class="container">
        <div class="row-page-title">
            <div class="page-title-captions">

                <h1 class="h5">
                    Formulaire d'ajout d'un membre du staff
                </h1>
            </div>
            <div class="page-title-secondary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= URLROOT ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= URLROOT ?>/<?= $_SESSION['userType'] . 's/' ?><?= $_SESSION['userType'] ?>">Mon panneau</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="w-screen h-full mb-8">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="mt-1 flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-4/5 bg-white sm:mx-0 h-full">
            <div class="bg-blue-100 flex flex-col w-full md:w-full p-8 pt-0">
                <div class="flex flex-col flex-1 justify-center mb-4">
                    <div class="w-full pt-4">
                        <form method="post" action="<?= URLROOT ?>/admins/registerstaff/">
                            <div class="form-group">
                                <input name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" type="email" placeholder="Adresse mail" value="<?= $data['email'] ?>">
                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" type="password" placeholder="Mot de passe" value="<?= $data['password'] ?>">
                                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                            </div>
                            <div class="form-group">
                                <input name="confirm_pass" class="form-control form-control-lg <?= (!empty($data['confirm_pass_err'])) ? 'is-invalid' : '' ?>" type="password" placeholder="Confirmer le mot de passe" value="<?= $data['confirm_pass'] ?>">
                                <span class="invalid-feedback"><?php echo $data['confirm_pass_err']; ?></span>
                            </div>
                            <div class="form-group">
                                <select name="type" id="type-select" class="form-control form-control-lg m-b-10 <?= (!empty($data['type_err'])) ? 'is-invalid' : '' ?>">
                                    <option value="medecin">Médecin</option>
                                    <option value="admin">Administrateur</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-lg btn-round btn-brand" type="submit">Suivant</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md:block md:w-1/2 rounded-r-lg" style="background: url('<?=REGIMG?>');background-repeat: no-repeat; background-size:cover; background-position: center center;"></div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>