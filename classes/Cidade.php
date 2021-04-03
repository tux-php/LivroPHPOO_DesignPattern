<?php


class Cidade
{
    private $id;
    private $nome;

    function __construct($id)
    {
        $data[1] = 'Porto Alegre';
        $data[2] = 'São Paulo';
        $data[3] = 'Rio de Janeiro';
        $data[4] = 'Belo Horizonte';

        $this->id = $id;

        $this->setNome($data[$id]);
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function getNome()
    {
        return $this->nome;
    }

}