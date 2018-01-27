<?php

/**
 * Router [run]<b>Method to routes of system</b>
 * This module is responsible for the routes inside of the system
 * @autor Ricardo de Oliveira - ricardo.reksystem@gmail.com - v1.0 2018
 */

class Router 
{
    private $get;
    private $post;


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
        $this->loadRoutesFile('default');
        
        return $this;
    }
    
    public function loadRoutesFile($file) 
    {
        if(file_exists('routes/'.$file.'.php')) 
        {
            require_once 'routes/'.$file.'.php';
        }
    }
    
    public function match() 
    {
        
    }
    
    public function get($pattern, $function) 
    {
        $this->get[$pattern] = $function;
    }
    
    public function post($pattern, $function) 
    {
        $this->post[$pattern] = $function;
    }
}
