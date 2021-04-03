<?php

function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

$tabela = new TTable();
$tabela->border = 1;

$linha1 = $tabela->addRow();
$paragrafo = new TParagraph('Esta é a logo do GNOME');
$paragrafo->setAlign('left');

$linha1->addCell($paragrafo);

$imagem = new TImage('../app.images/gnome.png');
$linha1->addCell($imagem);

$linha2 = $tabela->addRow();

$paragrafo = new TParagraph('Esta é a logo do GIMP');
$paragrafo->setAlign('left');
$linha2->addCell($paragrafo);

$imagem = new TImage('../app.images/gimp.png');
$linha2->addCell($imagem);

$linha3 = $tabela->addRow();

$celula = $linha3->addCell(new TParagraph('texto em duas colunas'));
$celula->colspan = 2;

$tabela->show();