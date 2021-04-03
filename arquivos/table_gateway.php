<?php

class ProdutoGateway
{

    function insert($id, $descricao,$estoque,$preco_custo)
    {
        $sql = "INSERT INTO produtos(id, descricao, estoque, preco_custo)".
                " VALUES ('$id','$descricao',$estoque,'$preco_custo')";

        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $conn->exec($sql);
        unset($conn);

    }

    function update($id, $descricao, $estoque, $preco_custo)
    {
        $sql = "UPDATE produtos SET descricao = '$descricao', ".
               " estoque = '$estoque' , preco_custo = '$preco_custo' ".
               " WHERE id = '$id'";

        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $conn->exec($sql);
        unset($conn);
    }

    function delete($id)
    {
        $sql = "DELETE FROM produtos WHERE id = '$id'";

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

    function getObjects()
    {
        $sql = "SELECT * FROM produtos";
        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $result = $conn->query($sql);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
}

$gateway = new ProdutoGateway();

$gateway->insert(1,'Vinho',10,10);
$gateway->insert(2,'Salame',20,20);
$gateway->insert(3,'Queijo',30,30);

//alterando os dados

$gateway->update(1,'Vinho',20,20);
$gateway->update(2,'Salame',40,40);

//excluir produto 3
$gateway->delete(3);
//exibe registros
echo "Lista de Produtos \n";
print_r($gateway->getObjects());