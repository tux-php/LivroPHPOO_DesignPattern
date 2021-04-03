<?php

function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"))
    {
        include_once "../classes/{$classe}.php";
    }
}

class Inscricao extends TRecord
{
    const TABLENAME = 'inscricao';
}

try
{
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log7.txt'));
    TTransaction::log("** seleciona inscrições da turma 2");
    
    $criteria = new TCriteria();
    $criteria->add(new TFilter('ref_turma', '=', 2));
    $criteria->add(new TFilter('cancelada', '=', FALSE));
    
    $repository = new TRepository('Inscricao');
    $inscricoes = $repository->load($criteria);
    
    if($inscricoes){
        TTransaction::log("** altera as inscrições");
        
        foreach ($inscricoes as $inscricao)
        {
            $inscricao->nota       = 8;
            $inscricao->frequencia = 75;
            
            $inscricao->store();
        }
    }
    TTransaction::close();
    
} catch (Exception $ex) {
    echo '<b>Erro: </b>'.$ex->getMessage();
    TTransaction::rollback();
}
