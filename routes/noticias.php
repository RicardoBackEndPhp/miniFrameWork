<?php

/* 
 * Test
 */


//Getting object Template
//$tpl = $this->core->loadModule('template');

$this->get('noticia', function($arg){
    echo "entrou em notícias!";
});

$this->get('noticia/{id}', function($arg){
    
    $arg['nome'] = "Alô garotas do meu brasil.";
    $this->view('teste',$arg);
    
});

$this->get('noticia/{id}/{categoria}', function($arg){
    echo "Noticia: ".$arg['id']."<br/>";
    echo "Categoria: ".$arg['categoria']."<br/>";
});