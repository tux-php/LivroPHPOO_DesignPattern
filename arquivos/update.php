<?php
function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"));
    {
        include_once ("../classes/{$classe}.php");
    }
}

$criteria = new TCriteria();
$criteria->add(new TFilter('id','=','3'));

$sql = new TSqlUpdate();
$sql->setEntity('aluno');
$sql->setRowData('nome','Pedro Cardoso da Silva');
$sql->setRowData('rua','Machado de Assis');
$sql->setRowData('fone','(88) 5555');

$sql->setCriteria($criteria);
echo $sql->getInstruction();
echo "\n";
