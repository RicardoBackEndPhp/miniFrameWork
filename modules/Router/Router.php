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
    private $core;
    private $connect;
    private $news;
    

    private function __construct() 
    {
        //Getting the Object Core
        $this->core = Core::getInstance();
        $this->connect = Database::getInstance();
        $this->news = News::getInstance();
    }
    
    //Pattern Singleton
    private static $singletonLogs;
		
    public static function getInstance() 
    {
        if (self::$singletonLogs === null) 
        {
            self::$singletonLogs = new Router();
            //echo 'Nova instancia da classe SingletonLogs<br>';
        } 
        else 
        {
            //echo 'A classe já foi instanciada!<br>';
        }

        return self::$singletonLogs;
    }
    
    public function load() 
    {
        //I passed the call below for the method "construct"
        //$this->core = Core::getInstance();
        
        //Calling the method "loadRoutesFile"
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
    
    
    public function view($template, $data = array()) 
    {        
        //Getting object Template
        $tpl = $this->core->loadModule('template');
        
        //Calling the method "render" in class "Template"
        $tpl->render($template,$data);
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
            //Find the parameters with "{}" and replace by regular expression
            $patterned = preg_replace('(\{[a-z0-9]{0,}\})', '([a-z0-9]{0,})', $pt);
            
            //Verifying if the routes follow the pattern chosen(regular expression).
            if (preg_match('#^('.$patterned.')*$#i', $url, $matches) === 1) 
            {
                //Withdrawing the two first position
                array_shift($matches);
                array_shift($matches);
                
                $itens = array();
                
                //Filling in the array with the names of arguments
                if(preg_match_all('(\{[a-z0-9]{0,}\})', $pt, $vIndice)) 
                {
                    $itens = preg_replace('(\{|\})', '', $vIndice[0]);
                }
                
                //Joining the values ($matches) with the arguments ($items)
                $arg = array();
                foreach ($matches as $key => $value) 
                {
                    $arg[$itens[$key]] = $value;
                }
                
                //Executing  the function of the route
                $func($arg);
                break;
            }
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
