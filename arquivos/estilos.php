<?php

function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

$estilo1 = new TStyle('texto');
$estilo1->font_family = 'arial,verdana,sans-serif';
$estilo1->font_style = 'normal';
$estilo1->font_weight = 'bold';
$estilo1->color = 'white';
$estilo1->text_decoration = 'none';
$estilo1->font_size = '10pt';

$estilo2 = new TStyle('celula');
$estilo2->background_color = 'white';
$estilo2->padding_top = '10px';
$estilo2->padding_bottom = '10px';
$estilo2->padding_left = '10px';
$estilo2->padding_right = '10px';
$estilo2->magin_left = '5px';
$estilo2->width = '142px';
$estilo2->height = '154px';

$estilo1->show();
$estilo2->show();

$estilo1->show();
$estilo2->show();