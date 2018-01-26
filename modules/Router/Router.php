<?php

/**
 * Router [run]<b>Method to routes of system</b>
 * This module is responsible for the routes inside of the system
 * @autor Ricardo de Oliveira - ricardo.reksystem@gmail.com - v1.0 2018
 */

class Router 
{
    //Pattern Singleton
    public static function getInstance() 
    {
        static $isnt = NULL;
        if ($isnt === null) 
        {
            $isnt = new Router();
        }
        
        return $isnt;
    }
    
    public function load() 
    {
        
    }
    
    public function loadRoutesFile($file) 
    {
        
    }
}
