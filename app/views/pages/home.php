<?php
if (!isset($_SESSION['unique_id'])) {
    header("location: ./");
}
$row = $data['list'];
?>

<div class="wrapper">
    <section class="users">
        <header>
            <div class="content">
                <img src="public/images/<?php echo $row[0]['img']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row[0]['fname'] . " " . $row[0]['lname'] ?></span>
                    <p><?php echo $row[0]['status']; ?></p>
                </div>
            </div>
            <a href="Home/logout/<?php echo $row[0]['unique_id']; ?>" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
    </section>
</div>
<script src="public/js/users.js"></script>