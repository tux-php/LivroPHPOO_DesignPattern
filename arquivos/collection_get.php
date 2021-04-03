<?php

function __autoload($classe) 
{
    if (file_exists("../classes/{$classe}.php")) 
    {
        include_once "../classes/{$classe}.php";
    }
}



class Aluno extends TRecord {

    const TABLENAME = 'aluno';

}

class Turma extends TRecord {

    const TABLENAME = 'turma';

}

class Inscricao extends TRecord {

    const TABLENAME = 'inscricao';

}

try {
    TTransaction::open('pg_livro');

    TTransaction::setLogger(new TLoggerTXT('/tmp/log6.txt'));

    $criteria = new TCriteria();
    $criteria->add(new TFilter('turno', '=', 'T'));
    $criteria->add(new TFilter('encerrada', '=', 'FALSE'));

    $repository = new TRepository('Turma');
    $turmas = $repository->load($criteria);

    if ($turmas) {
        echo "Turmas retornadas \n";
        echo "==================\n";

        foreach ($turmas as $turma) {
            echo ' ID          :  ' . $turma->id;
            echo ' Dia         :  ' . $turma->dia;
            echo ' Sala        :  ' . $turma->sala;
            echo ' Turno       :  ' . $turma->turno;
            echo ' Professor   :  ' . $turma->professor;
            echo "\n";
        }
    }

    $criteria = new TCriteria();
    $criteria->add(new TFilter('nota', '>=', 7));
    $criteria->add(new TFilter('frequencia', '>=', 75));
    $criteria->add(new TFilter('ref_turma', '=', 1));
    $criteria->add(new TFilter('cancelada', '=', FALSE));

    $repository = new TRepository('Inscricao');
    $inscricoes = $repository->load($criteria);
    if ($inscricoes) {
        echo "Inscrições retornadas \n";
        echo "=======================\n";

        foreach ($inscricoes as $inscricao) {
            echo ' ID  : ' . $inscricao->id;
            echo ' Aluno  : ' . $inscricao->ref_aluno;

            $aluno = new Aluno($inscricao->ref_aluno);
            echo ' Nome : ' . $aluno->nome;
            echo ' Rua  : ' . $aluno->endereco;
            echo "\n";
        }
    }
    TTransaction::close();
} catch (Exception $ex) {
    echo '<b>Erro</b>'.$ex->getMessage();
    TTransaction::rollback();
}


