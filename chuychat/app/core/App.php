<?php 
    class App{
        protected $controller="Register";
        protected $action="Construct";
        protected $params=[];
        
        function __construct(){
            $arr = $this->UrlProcess();
            if(file_exists("./app/controllers/".$arr[0].".php")){                
                if(file_exists("./app/controllers/".$arr[0].".php")){
                    $this->controller = $arr[0];  
                    unset($arr[0]);                                              
                }                                
            }            
            
            require_once "./app/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;
            //Xu li Action
            if(isset($arr[1])){
                if(method_exists($this->controller, $arr[1])){
                    $this->action = $arr[1];                    
                }
                unset($arr[1]);
            }
            
            //Xu li Params
            $this->params = $arr?array_values($arr):[];
            
            call_user_func_array([$this->controller, $this->action], $this->params);
        }

        function UrlProcess(){
            if(isset($_GET['url'])){
                return explode("/",filter_var(trim($_GET['url'],"/")));

            }
        }
    }
