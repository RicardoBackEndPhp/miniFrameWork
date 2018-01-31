<?php

/* 
 * Exemple routes of Templates
 */


$this->get('noticia', function($arg){
    $arg['tableNews'] = $this->news->getListNews();    
    $this->view('home',$arg);
});

//exemple with method post
$this->post('noticia', function($arg){
    //print_r($_POST);
    if(isset($_POST['titulo']) && !empty($_POST['titulo']) && !empty($_POST['conteudo']))
    {
        $this->news->addNews($_POST['titulo'], $_POST['conteudo']);
    }
       
    header('location: ./noticia');
});

$this->get('noticia/{id}', function($arg){
    
    $arg['nome'] = "Alô garotas do meu brasil.";
    
    $arg['tableNews'] = $this->news->getNews($arg['id']);
    
    $this->view('noticia',$arg);
    
});

//test
$this->get('noticia/{id}/{categoria}', function($arg){
    $arg['nome'] = "Alô garotas do meu brasil.";
    
    //Connecting on database
    $sql = $this->connect->prepare('SELECT * FROM noticia');
    $sql->execute();
    //$sql = $this->connect()
    //$arg['tableNews'] = $sql->query('SELECT * FROM noticia');
    $arg['tableNews'] = $sql->fetchAll();
    
    $this->view('teste',$arg);
});