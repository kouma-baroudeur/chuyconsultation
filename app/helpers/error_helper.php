<?php
	function notAuthorized(){
	    //flash('notAuthorized','Vous n\'êtes pas autorisés d\'acceder à cette page. Veuillez s\'authentifier','alert alert-danger');
	    redirect('pages/error');
	}
