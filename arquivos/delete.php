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

//cria intrução DELETE
$sql = new TSqlDelete();
$sql->setEntity('aluno');
//define critérios de seleção
$sql->setCriteria($criteria);
//processa instrução
echo $sql->getInstruction();
echo "\n";