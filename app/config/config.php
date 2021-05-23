<?php
  // DB Params
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'chuyconsultation');
  

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'http://'.$_SERVER['HTTP_HOST'].'/chuyconsultation');
  // Site Name
  define('SITENAME', 'CHUY Consultation');
  //Patient portal name
  define('PATIENTPORTALNAME', 'CHUY Portail Patient');
  //Hospital name
  define('HOSPITAL', 'CHU Yaoundé');
  //patient profile name
  define('PATIENT', 'CHU Patient Profile');
  
  //logo for our site
  define('SITELOGO',URLROOT.'/assets/images/logo.jpg');
  //icon for our site
  define('SITEICON', URLROOT.'/assets/icons/logo.ico');
  

  //some repetitive names
  define('DASHBOARD', 'Tableau de bord');
  define('REPORT', 'Rapports');
  define('MD', 'Dossier médical');
  define('RDV', 'Rendez-vous');
  define('CONSULT', 'Consultation');
  define('PAYMENT', 'Facturation');
  define('TAKERDV', 'Prendre un rendez-vous');
  define('EMAIL', 'koumadoulbaroud@gmail.com');
  define('PHONE', '+237 693 55 34 54');
  