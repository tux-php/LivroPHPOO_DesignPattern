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
class Turma extends TRecord
{
    const TABLENAME = 'turma';
}

try
{
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log8.txt'));
    TTransaction::log("** Conta Alunos de Porto Alegre");
    
    $criteria = new TCriteria();
    $criteria->add(new TFilter('cidade', '=', 'Porto Alegre'));
    
    
    $repository = new TRepository('Aluno');
    $count = $repository->count($criteria);
    
    echo "Total de alunos de Porto Alegre: {$count} \n";
    
    
    
    TTransaction::log("** Conta Turmas");
    $criteria1 = new TCriteria();
    $criteria1->add(new TFilter('sala', '=', '100'));
    $criteria1->add(new TFilter('turno', '=', 'T'));
    
    $criteria2 = new TCriteria();
    $criteria2->add(new TFilter('sala', '=', '200'));
    $criteria2->add(new TFilter('turno', '=', 'M'));
    
    $criteria = new TCriteria();
    $criteria->add($criteria1, TExpression::OR_OPERATOR);
    $criteria->add($criteria2, TExpression::OR_OPERATOR);
    
    $repository = new TRepository('Turma');
    $count = $repository->count($criteria);
    echo "Total de turmas: {$count} \n";
    
    TTransaction::close();
        
    
    
    
} catch (Exception $ex) {
    echo '<b>Erro: </b>'.$ex->getMessage();
    TTransaction::rollback();
}

