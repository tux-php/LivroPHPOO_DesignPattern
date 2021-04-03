<?php
function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"))
    {
        include_once "../classes/{$classe}.php";
    }
}

$criteria1 = new TCriteria();
$criteria1->add(new TFilter('sexo','=','F'));
$criteria1->add(new TFilter('serie','=','3'));

$criteria2 = new TCriteria();
$criteria2->add(new TFilter('sexo','=','M'));
$criteria2->add(new TFilter('serie','=','4'));

$criteria = new TCriteria();
$criteria->add($criteria1,TExpression::OR_OPERATOR);
$criteria->add($criteria2,TExpression::OR_OPERATOR);

$criteria->setProperty('order','nome');

$sql = new TSqlSelect();
$sql->setEntity('aluno');
$sql->addColumn('*');
$sql->setCriteria($criteria);

echo $sql->getInstruction();
echo "\n";