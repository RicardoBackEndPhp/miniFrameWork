<?php

/* 
 * Archive pattern to routes of archives of the system
 */

$this->get('', function($arg){
    echo "hello word!";
});

$this->loadRoutesFile('noticias');
