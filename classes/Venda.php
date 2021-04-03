<?php


final class Venda
{
    private $itens;

    public function addItem($quantidade,$produto)
    {
        $this->itens[] = array($quantidade, $produto);
    }

    public function getItens()
    {
        return $this->itens;
    }

    /*método finaliza
    *calcula o total de uma cesta e diminui do estoque
    */
    public function finalizandoVenda()
    {
        $total = 0;
        foreach ($this->itens as $item) {
            $quantidade = $item[0];
            $produto = $item[1];

            //soma o total
            $total += $produto->calculaPrecoVenda() * $quantidade;
            //diminui do estoque
            $produto->registraVenda($quantidade);
        }
        return $total;
    }

}