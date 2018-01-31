<?php

/**
 * Template [run]<b>Method responsible for the views of the templates of the system</b>
 * This module is responsible for all templates of the system
 * @autor Ricardo de Oliveira - ricardo.reksystem@gmail.com - v1.0 2018
 */

class Template 
{
    
    private function __construct() {}
    
    /** @var Template */
    private static $singletonLogs;
		
    //Pattern Singleton
    public static function getInstance() 
    {
        if (self::$singletonLogs === null) 
        {
            self::$singletonLogs = new Template();
            //echo 'Nova instancia da classe SingletonLogs<br>';
        } 
        else 
        {
            //echo 'A classe já foi instanciada!<br>';
        }

        return self::$singletonLogs;
    }
    
    
    public function render($template, $data = array()) 
    {
        if(file('templates/'.$template.'.php'))
        {
            require_once 'templates/'.$template.'.php';
        }
    }
}
