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
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 m-auto">
            <form method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" type="email" placeholder="Adresse mail" value="<?= $data['email'] ?>">
                    </div>
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <div class="input-group" id="show_hide_password">
                        <input name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" type="password" placeholder="Mot de passe" value="<?= $data['password'] ?>">
                        <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <div class="input-group" id="show_hide_password_conf">
                    <input name="confirm_pass" class="form-control form-control-lg <?= (!empty($data['confirm_pass_err'])) ? 'is-invalid' : '' ?>" type="password" placeholder="Confirmer le mot de passe" value="<?= $data['confirm_pass'] ?>">
                        <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo $data['confirm_pass_err']; ?></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-lg btn-round btn-brand" type="submit">Creer un compte</button>
                </div>
            </form>
            <div class="up-help">
                <p>Vous avez dejà un compte? <a href="<?= URLROOT ?>/users/login">S'authentifier!</a></p>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>