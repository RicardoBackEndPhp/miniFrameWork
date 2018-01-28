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
        
        //returnig this object 
        return $this;
    }
    
    public function loadRoutesFile($file) 
    {
        if(file_exists('routes/'.$file.'.php')) 
        {
            require_once 'routes/'.$file.'.php';
        }
    }
    
    //Calling the routes of the system
    public function match() 
    {
        //Getting URL of the mode reksystem
        $getRaiz = RAIZ.'/';
        $urlNow  = $_SERVER['REQUEST_URI'];
        $url2 = trim(str_replace($getRaiz,'', $urlNow));
        
        //Getting URL now
        $url = isset($_GET['url'])?$_GET['url']:'';
        
        //tests
        //echo 'URL: '.$url."<br/>";
        //echo 'URLReK: '.$url2.'<hr/>';
        //echo 'Método: '.$_SERVER['REQUEST_METHOD'];
        
        //Getting the method using
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $type = $this->post;
            break;
                
            default:
                $type = $this->get;
            break;
        }
                
        //Here that the magic happens
        
        //Getting all routes possible
        foreach($type as $pt => $func) 
        {
            //Verifying if the routes follow the pattern chosen(regular expression).
            $patterned = preg_replace('(\{[a-z0-9]{0,}\})', '([a-z0-9]{0,})', $pt);
            
            echo 'Padrão: '.$patterned.'<br/>';
        }
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
