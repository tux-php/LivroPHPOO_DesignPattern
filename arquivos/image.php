<?php
function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

$gnome = new TImage('../app.images/gnome.png');
$gnome->show();


$gimp = new TImage('../app.images/gimp.png');
$gimp->show();
