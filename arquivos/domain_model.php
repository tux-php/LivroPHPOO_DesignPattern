<?php

function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"))
    {
        include_once "../classes/{$classe}.php";
    }
}

$venda = new Venda();
$venda->addItem(3,new Produto("Lata de Leite Ninho",10,14.99));
$venda->addItem(2,new Produto("Nescal Gelado",20,5));
$venda->addItem(1,new Produto("Queijo",30,10));

//84.461
echo $venda->finalizandoVenda();

