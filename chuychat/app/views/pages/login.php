<?php
if (isset($_SESSION['unique_id'])) {
  header("location: Home");
}
?>
<div class="wrapper">
  <section class="form">
    <header>CHUY messagerie instantanée </header>
  </section>
  <section class="form login">
    <header style="font-size: medium;">Afin de pouvoir l'utiliser, veuillez
      <b style="color: black;">créer un compte de messagerie instantanée ou connecter si vous en avez un, </b>
      <span>afin d'entrer en contact avec tout le personnel et d'autres patients.</span>
    </header>
    
    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="error-text"></div>
      <div class="field input">
        <label>Confirmer votre adresse email</label>
        <input type="text" name="email" required>
      </div>
      <div class="field input">
        <label>Confirmer votre mot de passe</label>
        <input type="password" name="password"  required>
        <i class="fas fa-eye"></i>
      </div>
      <div class="field button">
        <input type="submit" name="submit" value="Commencer">
      </div>
    </form>
    <div class="link">N'avez-vous pas encore un compte de messagerie ? <a href="index">Créez en un maintenant</a></div>
  </section>
  
</div>

<script src="public/js/pass-show-hide.js"></script>
<script src="public/js/login.js"></script>