<?php

function __autoload($classe) {
    if (file_exists("../classes/{$classe}.php")) {
        include_once "../classes/{$classe}.php";
    }
}

class Turma extends TRecord {

    const TABLENAME = 'turma';

}

class Inscricao extends TRecord {

    const TABLENAME = 'inscricao';

}

try {
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log9.txt'));
    TTransaction::log("** exclui as turmas da tarde");

    $criteria = new TCriteria();
    $criteria->add(new TFilter('turno', '=', 'T'));


    $repository = new TRepository('Turma');
    $turmas = $repository->load($criteria);

    if ($turmas) {
        foreach ($turmas as $turma) {
            $turma->delete();
        }
    }
    TTransaction::log("** exclui as inscrições do aluno '1'");

    $criteria = new TCriteria();
    $criteria->add(new TFilter('ref_aluno', '=', 1));

    $repository = new TRepository('inscricao');
    $repository->delete($criteria);

    echo "registros excluídos com sucesso \n";
    TTransaction::close();
} catch (Exception $ex) {
    echo '<b>Erro: </b>' . $ex->getMessage();
    TTransaction::rollback();
}

