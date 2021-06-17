<?php
    class Pages extends Controller {
        public function __construct()
        {
        
        }

        public function index()
        {
            $data = [
            'title' => 'Accueil',
            ];
            
            $this->view('pages/index', $data);
        }

        public function about()
        {
            $data = [
            'title' => 'A propos'
            ];

            $this->view('pages/aboutus', $data);
        }

        public function service()
        {
            $data = [
            'title' => 'Nos services'
            ];

            $this->view('pages/ourservices', $data);
        }

        public function contact()
        {
            $data = [
            'title' => 'Contacts'
            ];

            $this->view('pages/ourcontact', $data);
        }

        public function error()
        {
            $data = [
            'message' => 'Vous n\'êtes pas autorisés d\'acceder à cette page. Veuillez vous authentifier'
            ];

            $this->view('pages/error', $data);
        }

    }
