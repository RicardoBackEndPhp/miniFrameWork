<?php

/* 
 * Test
 */

$this->get('noticia', function($arg){
    echo "entrou em notícias!";
});

$this->get('noticia/{id}', function($arg){
    echo "I want see a news specific... ";
});

$this->get('noticia/{id}/{categoria}', function($arg){
    echo "Noticia: ".$arg['id']."<br/>";
    echo "Categoria: ".$arg['categoria']."<br/>";
});