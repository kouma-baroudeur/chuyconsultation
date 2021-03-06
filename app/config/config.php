<?php

/** DB Params e;#bZcR7GO-**/
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'chuyconsultation');

/* serveur distant http://chuyconsultation.metchoup.com/chuy */
// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
define('URLROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/chuyconsultation');
// URL login Root
define('LOGINURLROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/chuyconsultation/users/login');
// Site Name
define('SITENAME', 'CHUY Consultation');
//Patient portal name
define('PATIENTPORTALNAME', 'CHUY Portail Patient');
//Admin portal name
define('ADMINPORTALNAME', 'CHUY Portail Administrateur');
//Admin portal name
define('MEDECINPORTALNAME', 'CHUY Portail Médecin');
//Hospital name
define('HOSPITAL', 'CHU Yaoundé');
//patient profile name
define('PATIENT', 'CHU Patient Profile');

//chatapp
/* define('CHATAPP', URLROOT . '/chatapp/'); */

//logo for our site 
define('SITELOGO', URLROOT . '/assets/images/logo.jpg');
//message image 
define('MESSAGE', URLROOT . '/assets/images/message.jpg');
//icon for our site
define('SITEICON', URLROOT . '/assets/icons/logo.ico');
//doctor image
define('DOC', URLROOT . '/assets/images/doctor-icon.png');
//patient image
define('PAT', URLROOT . '/assets/images/patient-picture-default.png');
//admin image
define('ADM', URLROOT . '/assets/images/admin.jpg');
//document header
define('DOCHEADER', URLROOT . '/assets/images/headerMOPH.png');
//registration image on patient side
define('REGIMG', URLROOT . '/assets/images/regimg.jpg');

//some repetitive names
define('DASHBOARD', 'Tableau de bord');
define('REPORT', 'Mes rendez-vous');
define('MD', 'Mon dossier médical');
define('RDV', 'Rendez-vous');
define('PLANNING', 'Mon planning');
define('CONSULT', 'Mes consultation');
define('PAYMENT', 'Facturation');
define('TAKERDV', 'Prendre un rendez-vous');
define('PERS', 'Gérer les patients');
define('USERS', 'Gérer le staff');
define('CHAT', 'Messagerie chat');

define('EMAIL', 'koumadoulbaroud@gmail.com');
define('PHONE', '+237 693 55 34 54');
