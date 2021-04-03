<?php

final class Produto
{
    private $descricao;
    private $estoque;
    private $preco_custo;

    public function __construct($descricao, $estoque, $preco_custo)
    {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco_custo = $preco_custo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
}

class Venda
{
    private $id;
    private $itens;

    function __construct($id)
    {
        $this->id = $id;
    }

    function getID()
    {
        return $this->id;
    }

    public function addItem($quantidade, Produto $produto)
    {
        $this->itens[] = array($quantidade, $produto);
    }

    public function getItens()
    {
        return $this->itens;
    }
}

final class VendaMapper
{
    function insert(Venda $venda)
    {
        $id = $venda->getID();
        date_default_timezone_set('America/Sao_Paulo');
        $date = date("Y-m-d");

        $sql = "INSERT INTO venda (id,_data) VALUES ($id, $date)";
        echo $sql."\n";

        foreach ($venda->getItens() as $item)
        {
            $quantidade = $item[0];
            $produto = $item[1];
            $descricao = $produto->getDescricao();

            $sql = "INSERT INTO venda_items(ref_venda, produto, quantidade)".
                   " VALUES('$id','$descricao','$quantidade')";
            echo $sql."\n";
        }
    }
}

$venda = new Venda(1000);

$venda->addItem(3,new Produto('Vinho',10,15));
$venda->addItem(2,new Produto('Same',20,20));
$venda->addItem(1,new Produto('Queijo',30,10));

VendaMapper::insert($venda);
