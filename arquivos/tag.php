<?php

function __autoload($classe){    
    if(file_exists("../app.widgets/{$classe}.php")){        
        include_once"../app.widgets/{$classe}.php";
    }
}

$html = new TElement('html');

$head = new TElement('head');
$html->add($head);

$title = new TElement('title');
$title->add('Título da página');
$head->add($title);

$body = new TElement('body');
$body->bgcolor = '#ffffdd';
$html->add($body);

$center = new TElement('center');
$body->add($center);

$p = new TElement('p');
$p->align = 'center';
$p->add('Sport Club Internacional');
$center->add($p);

$img = new TElement('img');
$img->src = '../app.images/inter.png';
$img->width = '120';
$img->height = '120';
$center->add($img);

$hr = new TElement('hr');
$hr->width = '150';
$hr->align = 'center';
$center->add($hr);

//instancia um link
$a = new TElement('a');
$a->href = 'http://www.internacional.com.br';
$a->add('Visite o Site Oficial');
$center->add($a); //add ao corpo

//quebra de linhas
$br = new TElement('br');
$center->add($br);//add ao corpo

$input = new TElement('input');
$input->type = 'button';
$input->value = 'clique aqui para saber...';
$input->onclik = "alert('Clube do Povo do Rio Grande do Sul!!!')";
$center->add($input);

//mostrando
$html->show();