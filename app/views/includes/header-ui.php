<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from themes.2the.me/Core/1.3.3/index-4.html by HTTrack Website Copier/3.x -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Site de prise de rendez-vous pour les consultations au le CHU Yaoundé-Cameroun">
	<meta name="author" content="King Velly evestchris@gmail.com">
	<title><?= SITENAME ."/".$data['title']?></title>
	<!-- Favicons-->
	<link rel="icon" href="<?= SITEICON ?>" type="image/gif">
	<!-- Web Fonts-->
	<link href="<?= URLROOT ?>/assets/styles/styles.css" rel="stylesheet" type="text/css">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= URLROOT ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= URLROOT ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= URLROOT ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= URLROOT ?>/assets/css/soft-ui-dashboard.min2c70.css?v=1.0.3" rel="stylesheet" />

    <style type="text/css" media="screen">
      body {
        background-color: #f1f1f1;
        margin: 0;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      }

      .container { margin: 50px auto 40px auto; width: 600px; text-align: center; }

      a { color: #4183c4; text-decoration: none; }
      a:hover { text-decoration: underline; }

      h1 { width: 800px; position:relative; left: -100px; letter-spacing: -1px; line-height: 60px; font-size: 60px; font-weight: 100; margin: 0px 0 50px 0; text-shadow: 0 1px 0 #fff; }
      p { color: rgba(0, 0, 0, 0.5); margin: 20px 0; line-height: 1.6; }

      ul { list-style: none; margin: 25px 0; padding: 0; }
      li { display: table-cell; font-weight: bold; width: 1%; }

      .logo { display: inline-block; margin-top: 35px; }
      .logo-img-2x { display: none; }
      @media
      only screen and (-webkit-min-device-pixel-ratio: 2),
      only screen and (   min--moz-device-pixel-ratio: 2),
      only screen and (     -o-min-device-pixel-ratio: 2/1),
      only screen and (        min-device-pixel-ratio: 2),
      only screen and (                min-resolution: 192dpi),
      only screen and (                min-resolution: 2dppx) {
        .logo-img-1x { display: none; }
        .logo-img-2x { display: inline-block; }
      }

      #suggestions {
        margin-top: 35px;
        color: #ccc;
      }
      #suggestions a {
        color: #666666;
        font-weight: 200;
        font-size: 14px;
        margin: 0 10px;
      }

    </style>
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