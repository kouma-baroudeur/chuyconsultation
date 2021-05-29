<?php require APPROOT . '/views/includes/header.php'; ?>

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
<section class="mt-12 mb-12 appointment section-bg">
    <div class="container">
        <form method="post">
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
</section>
<?php require APPROOT . '/views/includes/footer.php'; ?>