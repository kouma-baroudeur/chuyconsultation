////////////\\\\\\\\\\\\
//      Toast.js      \\
//        v 1.4       \\
//     Jirka Vrba     \\
//    (jirkavrbis)    \\
////////////\\\\\\\\\\\\
			


document.addEventListener('keydown',tlacitko,false)

var at = false;

function toast(text,nadpis,customClass){
	if(!at){
		createToast(text,nadpis,customClass)
	}
}

function createToast(text='',nadpis='',customClass=''){
	at = true;
	//ztmaveni stranky
	var e = document.createElement('div');
	e.id = 'toastBg'
	e.addEventListener('click',function(e){if(e.target.id == 'toastBg'){deleteToast()}})
	//samotny toast
	var t = document.createElement('div');
	t.id = 'toastBody';
	if(customClass.length != 0){
		t.className = customClass;
	}
	e.appendChild(t);
	//zaviraci tlacitko
	var tc = document.createElement('div');
	tc.id = 'toastClose';
	tc.innerHTML = 'x';
	tc.addEventListener('click',deleteToast,false);
	t.appendChild(tc);
	//nadpis
	if(nadpis.length != 0 && text.length != 0){
		tc = document.createElement('div');
		tc.id = 'toastTitle';
		tc.innerHTML = nadpis || '';
		tc.addEventListener('click',deleteToast,false);
		t.appendChild(tc);
		document.body.appendChild(e)
		//text
		tc = document.createElement('div');
		tc.id = 'toastText';
		tc.innerHTML = text || '';
		tc.addEventListener('click',deleteToast,false);
		t.appendChild(tc);
		document.body.appendChild(e)
	}
	else if(text.length != 0){
		tc = document.createElement('div');
		tc.id = 'toastTextFull';
		tc.innerHTML = text || '';
		tc.addEventListener('click',deleteToast,false);
		t.appendChild(tc);
		document.body.appendChild(e)
	}
	else{
		tc = document.createElement('div');
		tc.id = 'toastTextFull';
		tc.innerHTML = nadpis || '';
		tc.addEventListener('click',deleteToast,false);
		t.appendChild(tc);
		document.body.appendChild(e)
	}
}

function tlacitko(e){
	if(e.keyCode == 27 && at){
		e.preventDefault();
		deleteToast()
	}
}

function deleteToast(){	
	at = false;
	var e = document.getElementById("toastBg");
	e.style.opacity = 0;
	setTimeout(function(){e.parentNode.removeChild(e)},300);
}

