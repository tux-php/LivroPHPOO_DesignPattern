<?php

function __autoload($classe) {
    if (file_exists("../classes/{$classe}.php")) {
        include_once "../classes/{$classe}.php";
    }
}

class Aluno extends TRecord {

    const TABLENAME = 'aluno';

    function inscrever($turma) {
        $inscricao = new Inscricao();
        $inscricao->ref_aluno = $this->id;
        $inscricao->ref_turma = $turma;
        $inscricao->store();
    }

}

class Inscricao extends TRecord {

    const TABLENAME = 'inscricao';

}

try{
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log12.txt'));
    TTransaction::log("** inserindo o aluno \$calos");
    
    $carlos = new Aluno();
    $carlos->nome = "Carlos Ranzi";
    $carlos->endereco = "Rua Francisco Oscar";
    $carlos->telefone = "(51) 1234-5678";
    $carlos->cidade = "Lajeado";
    $carlos->store();
    
    TTransaction::log("** inscrevendo o aluno nas turmas");
    
    $carlos->inscrever(1);
    $carlos->inscrever(2);
    
    TTransaction::close();
    
} catch (Exception $ex) {
    echo "Erro: ".$ex->getMessage();
    TTransaction::rollback();
}
