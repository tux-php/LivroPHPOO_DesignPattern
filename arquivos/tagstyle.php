<?php
function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

$style = new TStyle('estilo_texto');
$style->color = '#FF0000';
$style->font_family = 'Verdana';
$style->font_size = '20pt';
$style->font_weight = 'bold';
$style->show();

$texto = new TElement('p');
$texto->align = 'center';
$texto->add("Sport Club Internacional");

$texto->class = 'estilo_texto';
$texto->show();