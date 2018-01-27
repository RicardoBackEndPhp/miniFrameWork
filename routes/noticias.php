<?php

/* 
 * Test
 */

$this->get('noticia',  function($arg){
    echo "entrou em notícias!";
});

$this->get('noticia/{id}',  function($arg){
    echo "I want see a news specific... ";
});