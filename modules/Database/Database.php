<?php

/**
 * Database [access]<b>Method responsible for the connect of the database of the system</b>
 * This method is responsible for all connect realised with the database of the system
 * @autor Ricardo de Oliveira - ricardo.reksystem@gmail.com - v1.0 2018
 */

class Database 
{
    
    //Pattern Singleton
    private static $singletonLogs;
    
    /**
     * var PDO
     */
    protected $pdo;


    public function __construct() {
        //Getting object Core
        $core = Core::getInstance();
        
        //Getting the array "db" in class Core from of archive "config"
        $db = $core->getConfig('db');
        
        try 
        {
            $this->pdo = new PDO("mysql:dbname={$db['dbname']};host={$db['host']};charset=utf8", $db['user'], $db['pass']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } 
        catch (Exception $exc) 
        {
            echo $exc->getMessage();
        }
    }
		
    //Pattern Singleton
    public static function getInstance() 
    {
        if (self::$singletonLogs === null) 
        {
            self::$singletonLogs = new Database();
            //echo 'Nova instancia da classe SingletonLogs<br>';
        } 
        else 
        {
            //echo 'A classe já foi instanciada!<br>';
        }

        return self::$singletonLogs;
    }
    
    //exemple for return the objeto PDO
    public function prepare($query) 
    {
        return $this->pdo->prepare($query);
    }
    
    //Access direct the database
    public function query($query) 
    {
        $access = $this->pdo->query($query);
        return $access->fetchAll();
    }
}
