<?php

function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

$texto1 = new TParagraph('teste1<br>teste1<br>teste1');
$texto1->setAlign('left');
$texto1->show();

$texto2 = new TParagraph('teste2<br>teste2<br>teste2');
$texto2->setAlign('right');
$texto2->show();