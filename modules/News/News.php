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

    /** @var News */
    private static $singletonLogs;
    
    //Pattern Singleton
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
    
    public function getListNews() 
    {
        return $this->db->query('SELECT id,titulo,data FROM noticia ORDER BY data DESC');;
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
    
    public function addNews($title, $news) 
    {
        $data = date('Y-m-d');
        $query = "
            INSERT INTO noticia SET 
            titulo = :titulo,
            conteudo = :conteudo,
            data = '$data'
        ";
        $add = $this->db->prepare($query);
        $add->bindValue(':titulo', $title);
        $add->bindValue(':conteudo', $news);
        $add->execute();
        
        if ($add->rowCount() > 0) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
}
