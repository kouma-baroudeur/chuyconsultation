<?php 
    class Controller{
        public function model($model){
            //Format for empty require
            require_once "./app/models/".$model.".php";
            return new $model;
        }

        public function view($view, $data=[]){
            require_once "./app/views/".$view.".php";            
        }
    }
