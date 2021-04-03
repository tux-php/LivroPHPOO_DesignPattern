<?php


class Pessoa
{
    private $nome;
    private $cidadeID;

    function __construct($nome, $cidadeID)
    {
        $this->nome = $nome;
        $this->cidadeID = $cidadeID;
    }

    function __get($propriedade)
    {
        if($propriedade == 'cidade')
        {
            return new Cidade($this->cidadeID);
        }
    }

}