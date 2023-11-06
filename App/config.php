<?php

// Caminhos de diretório

define('VIEWS', dirname(__FILE__) . '/View/modules/');

// Dados para conexão ao banco de dados

$_ENV['db']['host'] = 'localhost:3306';
$_ENV['db']['user'] = 'root';
$_ENV['db']['pass'] = '';
$_ENV['db']['database'] = 'crud_users';
