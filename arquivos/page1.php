<?php

function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

function ola_mundo($param){
    echo 'Olá meu amigo ' .$param['nome'];
}

$pagina = new TPage();
$pagina->show();
