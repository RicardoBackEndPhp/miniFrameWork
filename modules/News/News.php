<?php

/**
 * News [module]<b>Method that control the news of the system</b>
 * This module is responsible for all things related with the news stored in database
 * @autor Ricardo de Oliveira - ricardo.reksystem@gmail.com - v1.0 2018
 */

class News 
{    
    /** @var PDO */
    private $db;
    
    //Only for ensure that the object no go be instantiated
    private function __construct() 
    {
        $this->db = Database::getInstance();
    }
    private function __wakeup() {}
    private function __clone() {}

    //Pattern Singleton
    private static $singletonLogs;
		
    public static function getInstance() 
    {
        if (self::$singletonLogs === null) 
        {
            self::$singletonLogs = new News();
            //echo 'Nova instancia da classe SingletonLogs<br>';
        } 
        else 
        {
            //echo 'A classe já foi instanciada!<br>';
        }

        return self::$singletonLogs;
    }
    
    public function getNews($id) 
    {
        $resp = array();
        
        if(is_numeric($id))
        {
            $sql = $this->db->prepare('SELECT * FROM noticia WHERE id = :id ');
            $sql->bindValue(':id',$id);
            $sql->execute();
            $resp = $sql->fetchAll();
        }
        elseif($id == 'all') 
        {
            $resp = $this->db->query('SELECT * FROM noticia');
        }
        
        return $resp;
    }
    
}
