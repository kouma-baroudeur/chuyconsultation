<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<!-- Text widget-->
					<aside class="widget widget_text">
						<div class="textwidget">
							<div class="widget-title">
								<h5><?=HOSPITAL?></h5>
							</div>
							<p>Plateforme de consultation médicale.</p>
						</div>
					</aside>
				</div>
				<div class="col-md-6 col-lg-3">
					<!-- Recent entries widget-->
					<aside class="widget widget_recent_entries">
						<div class="widget-title">
							<h5>Contact</h5>
						</div>
						E-mail : <a href="mailto:koumadoulbaroud@gmail.com"><?=EMAIL?></a> <br/>
							Phone : <?=PHONE?> <br/>
					</aside>
				</div>
				<div class="col-md-6 col-lg-6">
					<!-- Twitter widget-->
					<aside class="widget">
						<div class="widget-title">
							<h5>Equipe de développement</h5>
						</div>
						KOUMADOUL Baroud &nbsp;&amp;&nbsp;
						MOYOPO FOTSO Michelle R. &nbsp;&amp;&nbsp;
						NJIH KEMI Steve C.<br/>
					</aside>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="text-center"><span class="copyright">© 2021 <?=HOSPITAL?>.</span></div>
					</div>
				</div>
			</div>
		</div>
</footer>
<!-- Footer end-->

		<a class="scroll-top" href="#top"><i class="fa fa-angle-up"></i></a>
	</div>
	<!-- Wrapper end-->

</div>
<!-- Layout end-->

<!-- Off canvas-->
<div class="off-canvas-sidebar">
	<div class="off-canvas-sidebar-wrapper">
		<div class="off-canvas-header"><a class="close-offcanvas" href="#"><span class="arrows arrows-arrows-remove"></span></a></div>
		<div class="off-canvas-content">
			<!-- Navmenu widget-->
			<aside class="widget widget_nav_menu">
				<ul class="menu">
					<li class="menu-item menu-item-has-children"><a href="#">Accueil</a></li>
					<li class="menu-item"><a href="#">A propos</a></li>
					<li class="menu-item"><a href="#">Nos services</a></li>
					<li class="menu-item"><a href="#">Contacts</a></li>
					<li class="menu-item"><a href="#"></a></li>
					<li class="menu-item"><a href="#"></a></li>
				</ul>
			</aside>
			<ul class="social-icons">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			</ul>
		</div>
	</div>
</div>
<!-- Off canvas end-->

<!-- Scripts-->
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
<script src="<?=URLROOT?>/assets/scripts/fontawesome.js"></script>
<script src="<?=URLROOT?>/assets/scripts/jquery-2.2.4.min.js"></script>
<script src="<?=URLROOT?>/assets/scripts/popper.min.js"></script>
<script src="<?=URLROOT?>/assets/scripts/bootstrap.min.js"></script>
<script src="<?=URLROOT?>/assets/scripts/Chart.min.js"></script>
<script src="<?=URLROOT?>/assets/scripts/maps.js"></script>
<script src="<?=URLROOT?>/assets/scripts/plugins.min.js"></script>
<script src="<?=URLROOT?>/assets/scripts/charts.js"></script>
<script src="<?=URLROOT?>/assets/scripts/custom.min.js"></script>
<script>
	function editCons(id) {
	    $('#dynamicContent').load('<?=URLROOT?>/panels/editCons/' + id);
	}
	function deleteCons(id) {
	    $('#dynamicContent').load('<?=URLROOT?>/panels/deleteCons/' + id);
	}
	$('#consultationsMe').on('click', function(e) {
	    e.preventDefault();
	    $('#dynamicContent').load('<?=URLROOT?>/panels/consultations');
	});
	$('#profile').on('click', function(e) {
	    e.preventDefault();
	    $('#dynamicContent').load('<?=URLROOT?>/panels/profile');
	});
	$('#consultationsMeAtt').on('click', function(e) {
	    e.preventDefault();
	    $('#dynamicContent').load('<?=URLROOT?>/panels/consultations/only/Attente');
	});
	$('#consultationsAll').on('click', function(e) {
	    e.preventDefault();
	    $('#dynamicContent').load('<?=URLROOT?>/panels/consultations/all');
	});
	$('#consultationsAllAtt').on('click', function(e) {
	    e.preventDefault();
	    $('#dynamicContent').load('<?=URLROOT?>/panels/consultations/all/Attente');
	});
	$('#askConsult').on('click', function(e) {
	    e.preventDefault();
	    $('#dynamicContent').load('<?=URLROOT?>/panels/askConsult');
	});
	$('#mesConsultations').on('click', function(e) {
	    e.preventDefault();
	    $('#dynamicContent').load('<?=URLROOT?>/panels/mesConsultations');
	});
	
	$('#report').on('click', function(e) {
	    e.preventDefault();
	    $('#dynamicContent').load('<?=URLROOT?>/panels/report');
	});
</script>
</body>

</html>