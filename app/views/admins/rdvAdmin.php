<?php require APPROOT . '/views/includes/navbaradmin.php'; ?>

<div class="flex flex-col flex-1 w-full">

  <?php require APPROOT . '/views/includes/head.php'; ?>
  <main class="h-full pb-16 overflow-y-auto" id="dynamicContent">
    <?= flash('EtatPostEditCons'); ?>
    <?php require APPROOT . '/views/includes/rdvAdmin.php'; ?>
    
  </main>
</div>
<!-- Mobile sidebar -->
</div>
<?php require APPROOT . '/views/includes/foot.php'; ?>