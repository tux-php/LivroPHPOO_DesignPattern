<?php
function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

new TMessage('info', 'Esta ação é inofensiva, isto é só um lembrete');