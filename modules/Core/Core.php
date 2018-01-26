<?php

/**
 * Core [run]<b>Method main of funding</b>
 * This module is responsible for the funding and url friendly of the system
 * @autor Ricardo de Oliveira - ricardo.reksystem@gmail.com - v1.0 2018
 */

class Core 
{
    private $config;

    //Pattern Singleton
    public static function getInstance() 
    {
        static $isnt = NULL;
        if ($isnt === null) 
        {
            $isnt = new Core();
        }
        
        return $isnt;
    }
    
    //Function main <<<<<<<<<<<<<<<<<<<<----
    public function run($cfg) 
    {
        $this->config = $cfg;
        $this->loadModule('router');
    }
    
    //Get parameters in array of configuration
    public function getConfig($name) 
    {
        return $this->config[$name];
    }
    
    public function loadModule($moduleName) 
    {
        try 
        {
            //Passing all to lowercase and after passed the first letter to uppercase
            $moduleName = ucfirst(strtolower($moduleName));
            
            //instance of object
            $route = $moduleName::getInstance();
            
            return $route;
        } catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }
}