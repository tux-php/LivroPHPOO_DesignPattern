<?php

final class Produto
{
    static $recordset = array();  //representa nossa estrut. de dados

    public function adicionar($id,$descricao,$estoque,$preco_custo)
    {
        self::$recordset[$id]['descricao']   = $descricao;
        self::$recordset[$id]['estoque']     = $estoque;
        self::$recordset[$id]['preco_custo'] = $preco_custo;
    }

    public function registraCompra($id,$unidade,$preco_custo)
    {
        self::$recordset[$id]['preco_custo'] = $preco_custo;
        self::$recordset[$id]['estoque']    += $unidade;
    }

    public function registraVenda($id,$unidades)
    {
        self::$recordset[$id]['estoque'] -= $unidades;
    }

    public function getEstoque($id)
    {
        return self::$recordset[$id]['estoque'];
    }

    public function calculaPrecoVenda($id)
    {
        return self::$recordset[$id]['preco_custo'] * 1.3;
    }
}

$produto = new Produto();
$produto->adicionar(1,'Vinho',10,15);
$produto->adicionar(2,'Salame',20,20);
//exibe estoque
echo "Estoques: \n";
echo $produto->getEstoque(1)."\n";
echo $produto->getEstoque(2)."\n";

//exibe preço de venda
echo "preços de venda : \n";
echo $produto->calculaPrecoVenda(1)."\n";
echo $produto->calculaPrecoVenda(2)."\n";

//vende algumas unidades
$produto->registraVenda(1,5);
$produto->registraVenda(2,10);
echo "Estoques: \n";
echo $produto->getEstoque(1)."\n";
echo $produto->getEstoque(2)."\n";

//repõe o estoque
$produto->registraCompra(1,5,16);
$produto->registraCompra(2,10,22);

//exibe os preços de venda atuais
echo "preços de venda : \n";
echo $produto->calculaPrecoVenda(1)."\n";
echo $produto->calculaPrecoVenda(2)."\n";
