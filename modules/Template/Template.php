<?php

/**
 * Template [run]<b>Method responsible for the views of the templates of the system</b>
 * This module is responsible for all templates of the system
 * @autor Ricardo de Oliveira - ricardo.reksystem@gmail.com - v1.0 2018
 */

class Template 
{
    //Pattern Singleton
    public static function getInstance() 
    {
        static $isnt = NULL;
        if ($isnt === null) 
        {
            $isnt = new Template();
        }
        
        return $isnt;
    }
    
    public function render($template, $data = array()) 
    {
        if(file('templates/'.$template.'.php'))
        {
            require_once 'templates/'.$template.'.php';
        }
    }
}
