<?php

function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"))
    {
        include_once "../classes/{$classe}.php";
    }
}

$sql = new TSqlSelect();
$sql->setEntity('famosos');
$sql->addColumn('codigo');
$sql->addColumn('nome');
$criteria = new TCriteria();
$criteria->add(new TFilter('codigo','=','1'));
$sql->setCriteria($criteria);

try
{
    $conn = TConection::open('my_livro');

    $result = $conn->query($sql->getInstruction());
    if($result)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        echo $row['codigo']. ' - ' .$row['nome'] ."\n";
    }
    $conn = null;
}
catch (PDOException $msg)
{
    print "Erro!: " .$msg->getMessage() ."\n";
    die();
}

try
{
    $conn = TConection::open('pg_livro');

    $result = $conn->query($sql->getInstruction());
    if($result)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        echo $row['codigo']. ' - ' .$row['nome'] ."\n";
    }
    $conn = null;
}
catch (PDOException $msg)
{
    print "Erro!: " .$msg->getMessage() ."\n";
    die();
}
