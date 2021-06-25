<?php
if (isset($_SESSION['unique_id'])) {
  header("location: Home");
}
?>
<div class="wrapper">
  <section class="form signup">
    <header>CHUY messagerie instantanée </header>
    <span>Créer un compte ou connecter vous afin d'entrer en contact avec plusieurs</span>
    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="error-text"></div>
      <div class="field input">
        <input type="text" name="fname" placeholder="Nom" required>
      </div>
      <div class="field input">
        <input type="text" name="lname" placeholder="Prénom" required>
      </div>
      <div class="field input">
        <input type="text" name="email" placeholder="Confirmer votre adresse email" required>
      </div>
      <div class="field input">
        <input type="password" name="password" placeholder="Confirmer votre mot de passe" required>
        <i class="fas fa-eye"></i>
      </div>
      <div class="field image">
        <label>Selectionner une image</label>
        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
      </div>
      <div class="field button">
        <input type="submit" name="submit" value="Continue to Chat">
      </div>
    </form>
    <div class="link">Avez-vous déjà un compte de messagerie ? <a href="Login">Connectez-vous maintenant</a></div>
  </section>
</div>

<script src="public/js/pass-show-hide.js"></script>
<script src="public/js/signup.js"></script>