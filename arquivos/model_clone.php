<?php

function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"))
    {
        include_once "../classes/{$classe}.php";
    }
}

class Aluno extends TRecord
{
    const TABLENAME = 'aluno';
}

class Curso extends TRecord
{
    const TABLENAME = 'curso';
}

$fabio = new Aluno();
$fabio->nome      = 'Fábio Locatelli';
$fabio->endereco  = 'Rua Merlin';
$fabio->telefone  = '(51)2222-1111';
$fabio->cidade    = 'Lajeado';

//clona o objeto $fabio
$julia = clone $fabio;
$julia->nome     ='Júlia Haubert';
$julia->telefone ='(51) 2222-2222';

try
{
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log4.txt'));
    
    //armazena objeto $fabio
    TTransaction::log("** persistindo o aluno \$fabio");
    $fabio->store();
    //armazena objeto $julia
    TTransaction::log("** persistindo o aluno \$julia");
    $julia->store();
    
    //finaliza transação
    TTransaction::close();
    
    echo "clonagem realizada com sucesso \n";
} catch (Exception $ex) {
    echo "<b>Erro</b>".$ex->getMessage();
    TTransaction::rollback();
}

