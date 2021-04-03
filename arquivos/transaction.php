<?php

function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"))
    {
        include_once "../classes/{$classe}.php";
    }
}

try
{
    TTransaction::open('pg_livro');

    $sql = new TSqlInsert();
    $sql->setEntity('famosos');
    $sql->setRowData('codigo',8);
    $sql->setRowData('nome','Galileu');

    $conn = TTransaction::get();
    $result = $conn->Query($sql->getInstruction());

    //cria um update
    $sql = new TSqlUpdate();
    $sql->setEntity('famosos');
    $sql->setRowData('nome','Galileu Galilei');

    $criteria = new TCriteria();
    $criteria->add(new TFilter('codigo','=','8'));

    $sql->setCriteria($criteria);

    $conn = TTransaction::get();

    $result = $conn->Query($sql->getInstruction());

    TTransaction::close();
}
catch (Exception $msg)
{
    echo $msg->getMessage();
    TTransaction::rollback();
}
