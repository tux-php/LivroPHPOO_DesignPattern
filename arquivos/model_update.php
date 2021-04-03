<?php

function __autoload($classe) {
    if (file_exists("../classes/{$classe}.php")) {
        include_once "../classes/{$classe}.php";
    }
}

class Aluno extends TRecord {

    const TABLENAME = 'aluno';

}

class Curso extends TRecord {

    const TABLENAME = 'curso';

}

try {
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log3.txt'));
    TTransaction::log("** obtendo o aluno 1");
    //instancia registro do aluno
    $record = new Aluno();
    $aluno = $record->load(1);
    if ($aluno) {
        $aluno->telefone = '(96) 999999-8877';
        TTransaction::log("** persistindo o aluno 1");
        $aluno->store();
    }
    TTransaction::log("** obtendo o curso 1");
    $record = new Curso();
    $curso = $record->load(1);
    if ($curso) {
        $curso->duracao = 28;
        TTransaction::log("** persistindo o curso 1");
        $curso->store();
    }
    //finaliza transação
    TTransaction::close();
    echo "Registros alterados com sucesso \n";
} catch (Exception $ex) {
    echo "<b>Erro</b>" . $ex->getMessage();
    TTransaction::rollback();
}