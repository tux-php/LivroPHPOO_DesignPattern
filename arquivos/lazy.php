<?php

function __autoload($classe){
    if(file_exists("../classes/{$classe}.php")){
        include_once "../classes/{$classe}.php";
    }
}

class Inscricao extends TRecord{
    const TABLENAME = 'inscricao';
    
    function get_aluno(){
        $aluno = new Aluno($this->ref_aluno);
        
        return $aluno;
    }
}

class Aluno extends TRecord{
    const TABLENAME = 'aluno';
    
    function get_inscricoes(){
        $criteria = new TCriteria();
        $criteria->add(new TFilter('ref_aluno', '=', $this->id));
        
        $repository = new TRepository('Inscricao');
        return $repository->load($criteria);
    }
}

try {
    
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log11.txt'));
    TTransaction::log('** obtendo o aluno de uma inscrição');
    
    $inscricao = new Inscricao(2);
   
    echo "Dados da inscrição \n";
    echo "===================\n";
    echo 'Nome      :'.$inscricao->aluno->nome."\n";
    echo 'Endereço      :'.$inscricao->aluno->endereco."\n";
    echo 'Cidade      :'.$inscricao->aluno->cidade."\n";
    
    TTransaction::log("** obtendo as incrições de um aluno");
    
    $aluno = new Aluno(2);
    echo "\n";
    echo"Inscrições do Aluno \n";
    echo"====================\n";
    
    foreach($aluno->inscricoes as $incricao){
        echo 'ID    : '.$inscricao->id;
        echo 'Turma : '.$inscricao->ref_turma;
        echo 'Nota  : '.$inscricao->nota;
        echo 'Freq. : '.$inscricao->frequencia;
        echo "\n";
    }
    
    TTransaction::close();
    
} catch (Exception $ex) {
    echo "Erro ".$ex->getMessage();
    TTransaction::rollback();
}