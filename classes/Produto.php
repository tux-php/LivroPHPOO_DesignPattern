<?php


final class Produto
{
    private $descricao;
    private $estoque;
    private $preco_custo;

    public function __construct($descricao,$estoque,$preco_custo)
    {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco_custo = $preco_custo;
    }

    public function registraCompra($unidades,$preco_custo)
    {
        $this->preco_custo = $preco_custo;
        $this->estoque += $unidades;
    }

    public function registraVenda($unidades)
    {
        $this->estoque -= $unidades;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function calculaPrecoVenda()
    {
        return $this->preco_custo * 1.3;
    }

    public function getNomeProduto()
    {
        return $this->descricao;
    }

}