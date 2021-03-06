<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from themes.2the.me/Core/1.3.3/index-4.html by HTTrack Website Copier/3.x -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Site de prise de rendez-vous pour les consultations au le CHU Yaoundé-Cameroun">
	<meta name="author" content="KOUMADOUL Baroud Le Baroudeur koumadoulbaroud@gmail.com">
	<title><?= SITENAME . "/" . $data['title'] ?></title>
	<!-- Favicons-->
	<link rel="icon" href="<?= SITEICON ?>" type="image/gif">
	<!-- Web Fonts-->
	<link href="<?= URLROOT ?>/assets/styles/styles.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap core CSS-->
	<link href="<?= URLROOT ?>/assets/styles/bootstrap.min.css" rel="stylesheet">
	<!-- Tailwind core CSS-->
	<link href="<?= URLROOT ?>/assets/styles/tailwind.min.css" rel="stylesheet">
	<!-- Plugins and Icon Fonts-->
	<link href="<?= URLROOT ?>/assets/styles/plugins.min.css" rel="stylesheet">
	<!-- Template core CSS-->
	<link href="<?= URLROOT ?>/assets/styles/template.min.css" rel="stylesheet">
	<link href="<?= URLROOT ?>/assets/styles/customv4.css" rel="stylesheet">
	<!--rapport-->
	<link href="<?= URLROOT ?>/Rapport/sample/css/sample.css" rel="stylesheet" media="screen" />
</head>

<body>
	<!-- Layout-->
	<div class="">
		<!-- Header-->
		<header class="header header-center undefined">
			<div class="container-fluid">
				<!-- Logos-->
				<div class="inner-header"><a class="inner-brand" href="<?= URLROOT ?>"><img class="brand-dark" src="<?= SITELOGO ?>" width="77" alt=""><img class="brand-light" src="<?= SITELOGO ?>" width="77" alt="">
						<!-- Or simple text-->
						<!-- Core-->
					</a></div>
				<!-- Navigation-->
				<div class="inner-navigation collapse">
					<div class="inner-navigation-inline">
						<div class="inner-nav text-right">
							<ul>
								<?php if (!isLoggedIn()) : ?>
									<li><a href="<?= URLROOT ?>/users/_2y_10_JLQV1FhaYuHLMRlr5kVeEOZpMIXx2YJPrg_D4XfdJaMlv4zvPwidC"><i class="fa fa-key"></i> S'authentifier</a></li>
									<li><a href="<?= URLROOT ?>/users/_2y_10_tBgLjFR24FURnk65aZuUkuvOftk9YrRPMZmRwb4qZwHsaETlhzoce"><i class="fa fa-plus"></i> Creer un compte</a></li>
									<?php
								else :
									if ($_SESSION['userType'] == 'medecin') :
									?>
										<li><a href="<?= URLROOT ?>/medecins/_2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C"><i class="fa fa-stethoscope"></i> Mon compte</a></li>
									<?php
									elseif ($_SESSION['userType'] == 'patient') :
									?>
										<li><a href="<?= URLROOT ?>/patients/_2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C"><i class="fa fa-user-injured"></i> Mon compte</a></li>
									<?php elseif ($_SESSION['userType'] == 'admin') :
									?>
										<li><a href="<?= URLROOT ?>/admins/_2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C"><i class="fa fa-cog"></i> Administration</a></li>
									<?php endif;
									?>
									<li><a href="<?= URLROOT ?>/users/_2y_10_AG_OSzHJ09ubMAfgTiWdM_Lw_aobUlVAr6Kw7bTOUMXEJPIMUn66W"><i class="fa fa-sign-out-alt"></i> Déconnexion</a></li>
								<?php
								endif; ?>
							</ul>
						</div>
					</div>
				</div>
				<!-- Extra menu-->
				<div class="extra-nav">
					<ul>
						<li><a class="open-offcanvas" href="#"><span>Menu</span><span class="fa fa-bars"></span></a></li>
					</ul>
				</div>
				<!-- Mobile menu-->
				<div class="nav-toggle"><a href="#" data-toggle="collapse" data-target=".inner-navigation"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a></div>
			</div>
		</header>
		<!-- Header end-->

		<!-- Wrapper-->
		<div class="wrapper">

			<!-- Page Header end-->