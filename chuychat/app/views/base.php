<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Module de messagerie instantanée reservé au personels, patients du système CHUYC">
  <meta name="author" content="KOUMADOUL Baroud Le Baroudeur koumadoulbaroud@gmail.com">
  <base href="http://localhost/chuyconsultation/chuychat/">
  <title>Messagerie instantanée CHUY Consultation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="public/css/style.css" />
  <link rel="stylesheet" href="public/css/all.min.css" />
  <link rel="icon" href="public/background/logo.ico" type="image/gif">
</head>

<body>
  <style>
    body {
      background-image: url('public/background/regimg.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <?php require_once "pages/" . $data['page'] . ".php" ?>

</body>

</html>