<?php
if (!isset($_SESSION['unique_id'])) {
  header("location: ./");
}
$row = $data['list'];
?>

<div class="wrapper">
  <section class="chat-area">
    <header>
      <a href="./Home" class="back-icon"><i class="fa fa-arrow-left"></i></a>
      <img src="public/images/<?php echo $row[0]['img']; ?>" alt="">
      <div class="details">
        <span><?php echo $row[0]['fname'] . " " . $row[0]['lname'] ?></span>
        <p><?php echo $row[0]['status']; ?></p>
      </div>
    </header>
    <div class="chat-box">

    </div>
    <form action="#" class="typing-area">
      <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $row[0]['unique_id']; ?>" hidden>
      <input type="text" name="message" class="input-field" placeholder="Ecrivez votre message ici..." autocomplete="off">
      <button><i class="fab fa-telegram-plane"></i></button>
    </form>
  </section>
</div>

<script src="public/js/chat.js"></script>