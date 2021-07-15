<!--?php require APPROOT . '/views/includes/header.php'; ?-->
<?php foreach ($data['medecins'] as $id => $personnel) : ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= URLROOT ?>/assets/styles/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= URLROOT ?>/assets/styles/tailwind.output.css" />
    <link rel="stylesheet" href="<?= URLROOT ?>/assets/styles/Chart.min.css"/>
    <link rel="icon" href="<?= SITEICON ?>" type="image/gif"/>
    <title>Modifier User</title>
    <link href="<?= URLROOT ?>/assets/styles/tailwind.min.css" rel="stylesheet">
    <script src="<?= URLROOT ?>/assets/scripts/alpine.min.js" defer></script>
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <body class="font-mono bg-gray-400">
	
		<!-- Container -->
		<div class="container mx-auto">
		
			<div class="flex justify-center px-6 my-12">

			 <form  method="post" action="modifStaff?id=<?= $personnel->id?>">
			 <h3  class="pt-4 text-2xl text-center font-bold text-blue-500 ">MODIFIER MEDECIN</h3>
				<!-- Row -->
				 <div class="w-500 xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
					<div class="w-full  bg-white lg:w-1/2 p-5 rounded-lg  lg:rounded-l">

						   <div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="nom">
									Nom
								</label>
			
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="nom" type="text" name="nom" <?= (!empty($data['nom_err'])) ? 'is-invalid' : '' ?> value="<?= $personnel->nomMedecin ?>"
								/>
								<span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="prenom">
									Prenom
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="prenom" type="text" name="prenom" <?= (!empty($data['prenom_err'])) ? 'is-invalid' : '' ?> value="<?= $personnel->prenomMedecin ?>"/>
									<span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="dateNaissancee">
									Date de Naissance
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="dateNaissance" type="date" name="dateNaissance" <?= (!empty($data['dateNaissance_err'])) ? 'is-invalid' : '' ?> value="<?= $personnel->dateNaissanceMedecin ?>"/>
									<span class="invalid-feedback"><?php echo $data['dateNaissance_err']; ?></span>
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="username">
									Lieu de Naissance
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="lieuNaissance" type="text" name="lieuNaissance" <?= (!empty($data['lieuNaissance_err'])) ? 'is-invalid' : '' ?> value="<?= $personnel->lieuNaissanceMedecin ?>"/>
									<span class="invalid-feedback"><?php echo $data['lieuNaissance_err']; ?></span>
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="sexe">
									sexe
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="sexe" type="text" name="sexe" <?= (!empty($data['sexe_err'])) ? 'is-invalid' : '' ?> value="<?= $personnel->sexeMedecin ?>"/>
									<span class="invalid-feedback"><?php echo $data['sexe_err']; ?></span>
							</div>
						</div>
					<!-- Col -->
					<div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="service">
									Service
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="service" type="text" name="service" <?= (!empty($data['service_err'])) ? 'is-invalid' : '' ?> value="<?= $personnel->codeService ?>"/>
									<span class="invalid-feedback"><?php echo $data['service_err']; ?></span>
							</div>
							
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="adresse">
									adresse actuelle
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="adresse" type="text" name="adresse" <?= (!empty($data['adresse_err'])) ? 'is-invalid' : '' ?> value="<?= $personnel->adresseMedecin ?>"/>
									<span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
							</div>
							
						    <div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="contact">
									N° contact
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="contact" type="text" name="tel" <?= (!empty($data['tel_err'])) ? 'is-invalid' : '' ?> value="<?= $personnel->telMedecin ?>"/>
									<span class="invalid-feedback"><?php echo $data['tel_err']; ?></span>
							</div>
							<div class="mb-6 text-center">
								<a href=""><button
									class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="submit"
								>
									Modifier
								</button></a>
							</div>
							<hr class="mb-6 border-t" />
							
						
					</div>
				</div>
				</form>
			</div>
		</div>
	</body>
</body>
</html>
<?php endforeach?>
<!--?php require APPROOT . '/views/includes/footer.php'; ?-->