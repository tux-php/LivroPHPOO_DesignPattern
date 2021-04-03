<?php

function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"))
    {
        include_once "../classes/{$classe}.php";
    }
}

$criteria = new TCriteria();
$criteria->add(new TFilter('nome','like','maria%'));
$criteria->add(new TFilter('cidade','like','Macap%'));

//define o intervalo de consulta
$criteria->setProperty('offset',0);
$criteria->setProperty('limit',10);
$criteria->setProperty('order','nome');


$sql = new TSqlSelect();
$sql->setEntity('aluno');
$sql->addColumn('nome');
$sql->addColumn('fone');

$sql->setCriteria($criteria);
echo $sql->getInstruction();
echo "\n";
