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

$day = new Pessoa('Dayanne Gomes',1);
$gui = new Pessoa('Guilherme Correa',3);

echo $day->cidade->getNome()."\n";
echo $gui->cidade->getNome()."\n";

print_r($day->cidade);