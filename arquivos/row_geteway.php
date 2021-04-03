<?php

class ProdutoGateway
{
    private $data;

    function __get($prop)
    {
        return $this->data[$prop];
    }

    function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }

    function insert()
    {
        $sql = "INSERT INTO produtos(id, descricao,estoque,preco_custo)".
               " VALUES ('{$this->id}','{$this->descricao}','{$this->estoque}','{$this->preco_custo}')";
        echo $sql."\n";
        //instancia
        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        //exec
        $conn->exec($sql);
        unset($conn);
    }

    function update()
    {
        $sql = "UPDATE produtos SET ".
               " descricao = '{$this->descricao}', ".
               " estoque = '{$this->estoque}', ".
               " preco_custo = '{$this->preco_custo}' ".
               " WHERE id = '{$this->id}'";
        echo $sql." \n";
        //instancia
        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        //exec
        $conn->exec($sql);
        unset($conn);
    }

    function delete()
    {
        $sql = "DELETE FROM produtos WHERE id = '{$this->id}'";
        echo $sql."\n";
        //instancia
        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        //exec
        $conn->exec($sql);
        unset($conn);
    }

    function getObject($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = '{$id}'";
        echo $sql."\n";
        //exec sql
        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        //exec
        $result = $conn->query($sql);
        $this->data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
    }
}

//lapada nos objetos
$vinho = new ProdutoGateway();
$vinho->id          = 5;
$vinho->descricao   = 'Vinho Cabernet';
$vinho->estoque     =  10;
$vinho->preco_custo = 10;
$vinho->insert();

$salame = new ProdutoGateway();
$salame->id = 6;
$salame->descricao = 'Salme';
$salame->estoque = 20;
$salame->preco_custo = 20;
$salame->insert();

//recuperando obj
$objeto = new ProdutoGateway();
$objeto->getObject(6);
$objeto->estoque = $objeto->estoque*2;
$objeto->descricao = 'Salaminho Italiano';
$objeto->update();
//excluir
$vinho->delete();


