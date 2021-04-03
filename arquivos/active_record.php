<?php

class Produto
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
        $sql = "INSERT INTO produtos (id, descricao, estoque, preco_custo)".
               " VALUES ('{$this->id}','{$this->descricao}','{$this->estoque}',".
               "          '{$this->preco_custo}')";
        //var_dump($sql);die();

        $conn = new PDO('pgsql:dbname=livro; user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
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

        $conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $conn->exec($sql);
        unset($conn);
    }

    function delete()
    {
        $sql = "DELETE FROM produtos WHERE id = '{$this->id}'";
        $conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $conn->exec($sql);
        unset($conn);
    }

    public function registraCompra($unidade, $preco_custo)
    {
        $this->preco_custo = $preco_custo;
        $this->estoque += $unidade;
    }

    public function registraVendas($unidades)
    {
        $this->estoque -= $unidades;
    }

    public function calculoPrecoVenda()
    {
        return $this->preco_custo * 1.3;
    }
}

$vinho = new Produto();
$vinho->id = 7;
$vinho->descricao = 'Vinho Cabernet';
$vinho->estoque = 10;
$vinho->preco_custo = 10;
$vinho->insert();

$vinho->registraVendas(5);
echo 'estoque: ' .$vinho->estoque ."\n";
echo 'preco_custo: ' .$vinho->preco_custo ."\n";
echo 'preco_venda: ' .$vinho->calculoPrecoVenda() ."\n";

$vinho->registraCompra(10,20);
$vinho->update();
echo 'estoque: '.$vinho->estoque."\n";
echo 'preco_custo: '.$vinho->preco_custo."\n";
echo 'preco_venda: '.$vinho->calculoPrecoVenda()."\n";