<?php
function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"))
    {
        include_once "../classes/{$classe}.php";
    }
}

setlocale(LC_NUMERIC,'POSIX');

$sql = new TSqlInsert();
$sql->setEntity('aluno');

$sql->setRowData('id', 3);
$sql->setRowData('nome','Pedro Cardoso');
$sql->setRowData('fone','(86)94444-7777');
$sql->setRowData('nascimento','1985-04-12');
$sql->setRowData('sexo','M');
$sql->setRowData('serie','4');
$sql->setRowData('mensalidade','280.40');

echo $sql->getInstruction();
echo "\n";