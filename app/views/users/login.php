<?php require APPROOT . '/views/includes/header.php'; ?>
<section class="module-page-title">
    <div class="container">
        <div class="row-page-title">
            <div class="page-title-captions">

                <h1 class="h5">S'authentifier</h1>
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
            <div class="up-logo">
                <?= flash('register_success') ?>
            </div>
            <form method="post">
                <div class="form-group">
                    <div class="input-group ">
                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        <input name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" type="email" placeholder="Adresse mail" value="<?= $data['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group" id="show_hide_password">
                        <div class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </div>
                        <input name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" type="password" placeholder="Mot de passe" value="<?= $data['password'] ?>">
                        <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class='alert alert-danger <?= (!empty($data['email_err']) || !empty($data['password_err'])) ? '' : 'd-none' ?>'>
                    <?= $data['email_err'] . ' <br/> ' . $data['password_err'] ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-lg btn-round btn-brand" type="submit">S'authentifier</button>
                </div>
            </form>
            <div class="up-help">
                <p>Vous n'avez pas encore un compte? <a href="<?= URLROOT ?>/users/register">Creer un compte!</a></p>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>