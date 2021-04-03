<?php

class Produto
{
    public $id;
    public $descricao;
    public $estoque;
    public $preco_custo;
}
class ProdutoGateway
{

    function insert(Produto $object)
    {
        $sql = "INSERT INTO produtos(id, descricao, estoque, preco_custo)".
            " VALUES ('$object->id','$object->descricao','$object->estoque','$object->preco_custo')";

        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $conn->exec($sql);
        unset($conn);

    }

    function update(Produto $object)
    {
        $sql = "UPDATE produtos SET descricao = '$object->descricao', ".
            " estoque = '$object->estoque' , preco_custo = '$object->preco_custo' ".
            " WHERE id = '$object->id'";

        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $conn->exec($sql);
        unset($conn);
    }

    function getObject($id)
    {
        $sql = "SELECT * FROM produtos where id = '$id'";

        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
}

$gateway = new ProdutoGateway();

$vinho = new Produto();
$vinho->id = 4;
$vinho->descricao = 'Vinho Galhoto';
$vinho->estoque = 10;
$vinho->preco_custo = 15;

//inserindo obj no bd postg

$gateway->insert($vinho);
print_r($gateway->getObject(4))."\n";

$vinho->descricao = 'Vinho Joao de Barro';
//atualizando
$gateway->update($vinho);
//mostrando
print_r($gateway->getObject(4));

