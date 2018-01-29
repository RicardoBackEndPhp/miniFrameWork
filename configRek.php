<?php

/* 
 * Archive of configuration of the system custom
 */

//Array of configuration 
$config = array();

//Directory root
define('RAIZ', '/reksystem');
define('BASE', 'http://localhost/reksystem');

//Configuring the timezone of the Brazil
date_default_timezone_set('America/Sao_Paulo');

//Data of connection in database
$config['db'] = array(
    'host' => 'localhost',
    'dbname' => 'reksystem',
    'user' => 'root',
    'pass' => ''
);