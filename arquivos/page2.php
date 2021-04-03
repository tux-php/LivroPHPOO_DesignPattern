<?php

function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

class Mundo extends TPage{
    function ola($param){
        echo 'Olá meu amigo '.$param['nome'];
    }
}

$pagina = new Mundo();
$pagina->show();
