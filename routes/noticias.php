<?php

/* 
 * Exemple routes of Templates
 */


$this->get('noticia', function($arg){
    echo "entrou em notícias!";
});

$this->get('noticia/{id}', function($arg){
    
    $arg['nome'] = "Alô garotas do meu brasil.";
    
    //Connecting on database
    $sql = $this->connect->prepare('SELECT * FROM noticia');
    $sql->execute();
    //$sql = $this->connect()
    //$arg['tableNews'] = $sql->query('SELECT * FROM noticia');
    $arg['tableNews'] = $sql->fetchAll();
    
    $this->view('teste',$arg);
    
});

$this->get('noticia/{id}/{categoria}', function($arg){
    echo "Noticia: ".$arg['id']."<br/>";
    echo "Categoria: ".$arg['categoria']."<br/>";
});