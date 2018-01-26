<!DOCTYPE html>
<!--
    Here is where the magic happens.
    This is the document main for that the system run of way.
-->
<?php
    session_start();
    
    require './configRek.php';
    
    //Auto loading
    spl_autoload_register(function($class){
        //verify if exist the archive in folder "modules" 
        if(file_exists('modules/'.$class.'/'.$class.'.php'))
        {
            require_once 'modules/'.$class.'/'.$class.'.php';
        }
    });
    
    Core::getInstance()->run($config);
    
?>