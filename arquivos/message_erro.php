<?php

function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

new TMessage('aviso', 'Agora estou falando sério. Este erro é fatal!');
