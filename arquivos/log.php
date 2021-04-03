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
    TTransaction::open('../app.config/pg_livro');
    TTransaction::setLogger(new TLoggerHTML('/tmp/arquivo.html'));
    TTransaction::log("Inserindo registro William Wallace");

    $sql = new TSqlInsert();
    $sql->setEntity('famosos');
    $sql->setRowData('codigo',9);
    $sql->setRowData('nome','William Wallace');

    $conn = TTransaction::get();

    $result = $conn->Query($sql->getInstruction());

    TTransaction::log($sql->getInstruction());

    TTransaction::setLogger(new TLoggerXML('/tmp/arquivo.xml'));

    TTransaction::log("Inserindo registro Albert Einstein");

    $sql = new TSqlInsert();
    $sql->setEntity('famosos');
    $sql->setRowData('codigo',10);
    $sql->setRowData('nome','Albert Einstein');

    $conn = TTransaction::get();

    $result = $conn->Query($sql->getInstruction());

    TTransaction::log($sql->getInstruction());

    TTransaction::close();
}
catch (Exception $msg)
{
    echo $msg->getMessage();
    TTransaction::rollback();
}