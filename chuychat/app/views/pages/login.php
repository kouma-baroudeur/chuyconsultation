<?php
if (isset($_SESSION['unique_id'])) {
  header("location: Home");
}
?>
<div class="wrapper">
  <section class="form login">
    <header>CHUY messagerie instantanée </header>
    <span>Créer un compte ou connecter vous afin d'entrer en contact avec plusieurs</span>
    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="error-text"></div>
      <div class="field input">
        <label>Confirmer votre adresse email</label>
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="field input">
        <label>Confirmer votre mot de passe</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        <i class="fas fa-eye"></i>
      </div>
      <div class="field button">
        <input type="submit" name="submit" value="Continue to Chat">
      </div>
    </form>
    <div class="link">N'avez-vous pas encore un compte de messagerie ? <a href="index">Créez en un maintenant</a></div>
  </section>
</div>

<script src="public/js/pass-show-hide.js"></script>
<script src="public/js/login.js"></script>