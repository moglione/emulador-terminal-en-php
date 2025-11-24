<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$localLogin=md5("root");
$localPassword=md5("Mike1987");


 
/* Check if Request is Ajax and login request */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && isset($_POST['login'])) {
    $login = $_REQUEST['login'];
    $password =$_REQUEST['password'];
    
    if($localLogin==$login && $localPassword==$password){
            setcookie("terminal_ollama", "authorized", time() + 3600); // 3600 seconds = 1 hour
            print_r(json_encode((object) ['result' => "authorized"]));
            exit;
    }
        

    setcookie("terminal_ollama", "", time() - 3600); 
    print_r(json_encode((object) ['result' => "denied"]));
    
    
}
    
    



?>