<?php require APPROOT . '/views/includes/header.php'; ?>
                <section class="module-page-title">
					<div class="container">
						<div class="row-page-title">
							<div class="page-title-captions">
								<h1 class="h5">Erreur</h1>
							</div>
							<div class="page-title-secondary">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=URLROOT?>">Home</a></li>
								</ol>
							</div>
						</div>
					</div>
				</section>
            <div class="wrapper">
				<section class="module">
					<div class="container">
							<div class="col-md-4 m-auto">
                                <div class="alert alert-danger" > <?=$data['message']?> </div>
								<div class="form-group">
                                <a class="btn btn-block btn-lg btn-round btn-brand" href="<?=URLROOT?>/users/login"><i class="fa fa-key"></i> S'authentifier</a>
								</div>
                                <div class="form-group">
                                <a class="btn btn-block btn-lg btn-round btn-brand" href="<?=URLROOT?>/pages/index"><i class="fa fa-home"></i> Acceuil</a>
								</div>
                            </div>
                                <div class="up-help">
									<p>Vous n'avez pas encore un compte? <a href="<?=URLROOT?>/users/register">Creer un compte!</a></p>
								</div>
					</div>
				</section>
            </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
