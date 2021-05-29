<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="module-page-title">
    <div class=" container">
        <div class="row-page-title">
            <div class="page-title-captions">
                <h1 class="h5">Créer un compte</h1>
            </div>
            <div class="page-title-secondary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= URLROOT ?>">Home</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="wrapper">
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-md-4 m-auto">
                    <div name="registerForm" class="up-form">
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
                                <button class="btn btn-block btn-lg btn-round btn-brand" type="submit">Creer un compte</button>
                            </div>
                        </form>
                    </div>
                    <div class="up-help">
                        <p>Vous avez dejà un compte? <a href="<?= URLROOT ?>/users/login">S'authentifier!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>