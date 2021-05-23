<?php require APPROOT . '/views/includes/navbar.php'; ?>
  
  <div class="flex flex-col flex-1 w-full">

    <?php require APPROOT . '/views/includes/head.php'; ?>
    <main class="h-full pb-16 overflow-y-auto" id="dynamicContent">
        <?=flash('EtatPostEditCons');?>
        <?php require APPROOT . '/views/includes/dashboard.php'; ?>
    </main>
  </div>
  <!-- Mobile sidebar -->
</div>

</body>
  <script>
    window.watsonAssistantChatOptions = {
        integrationID: "11e3e2de-aead-4481-825a-5e1f3dcd75b4", // The ID of this integration.
        region: "eu-de", // The region your integration is hosted in.
        serviceInstanceID: "5651a36f-1949-48ad-8ccc-f625a2721794", // The ID of your service instance.
        onLoad: function(instance) { instance.render(); }
      };
    setTimeout(function(){
      const t=document.createElement('script');
      t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
      document.head.appendChild(t);
    });
  </script>
  <script src="<?=URLROOT?>/assets/scripts/jquery-3.5.1.slim.min.js"></script>
  <script src="<?=URLROOT?>/assets/scripts/Chart.min.js" ></script>
  <script src="<?=URLROOT?>/assets/scripts/charts-lines.js" defer></script>
  <script src="<?=URLROOT?>/assets/scripts/charts-bars.js" defer></script>
  <script src="<?=URLROOT?>/assets/scripts/charts-pie.js" defer></script>
  <script src="<?=URLROOT?>/assets/scripts/alpine.min.js" defer></script>
  <script src="<?=URLROOT?>/assets/scripts/init-alpine.js"></script>
  <script src="<?=URLROOT?>/assets/scripts/core.min.js"></script>
</html>