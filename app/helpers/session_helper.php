<?php
    session_start();
    
    function flash($name='', $message='',$class='alert alert-success'){
        if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name]))
                unset($_SESSION[$name]);
            if(!empty($_SESSION[$name. '_class']))
                unset($_SESSION[$name. '_class']);
                $_SESSION[$name]=$message;
                $_SESSION[$name. '_class']=$class;
            }elseif(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
                echo '<div class="'.$class.'" id="msg-flash dark:text-white">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name. '_class']);
            }
        }
    }
    function startUserSession($user){
        $_SESSION['userType']=$user->type;
        $_SESSION['userId']=$user->id;
        $_SESSION['userMail']=$user->email;
        $_SESSION['userState']=$user->state;

        redirect($_SESSION['userType'].'s/_2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C');   
    }
    function endUserSession(){
        unset($_SESSION['userType']);
        unset($_SESSION['userId']);
        unset($_SESSION['userMail']);
        unset($_SESSION['userState']);

        session_destroy();
        redirect('pages/index');
    }
    function isLoggedIn(){
        //Ending a php session after 10 minutes of inactivity
        $minutesBeforeSessionExpire=10;
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ($minutesBeforeSessionExpire*60))) {
            session_unset();     // unset $_SESSION   
            endUserSession();   // destroy session data  
        }
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity

        return (isset($_SESSION['userId']));
    }
