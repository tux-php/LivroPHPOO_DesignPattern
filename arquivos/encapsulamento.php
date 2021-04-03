<?php

function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php")){
        include_once "../classes/{$classe}.php";
    }
}

class Turma extends TRecord {

    const TABLENAME = 'turma';

    function set_dia_semana($valor) {
        if (is_int($valor) and ( $valor >= 1) and ( $valor <= 7)) {
            $this->data['dia_semana'] = $valor;
        } else {
            echo "Tentou atribuir '{$valor}' em dia_semana \n";
        }
    }

    function set_turno($valor) {
        if (($valor == 'M')or ( $valor == 'T')or ( $valor == 'N')) {
            $this->data['turno'] = $valor;
        } else {
            echo "Tentou atribuir '{$valor}' em turno \n";
        }
    }

}

try{
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log10.txt'));
    TTransaction::log("** inserindo turma 1");
    
    $turma = new Turma();
    $turma->dia_semana = 1;
    $turma->turno = 'M';
    $turma->professor = 'Carlo Bellini';
    $turma->sala = '100';
    $turma->data_inicio = '2002-09-01';
    $turma->encerrada = FALSE;
    $turma->ref_curso = 2;
    
    $turma->store();
    
    TTransaction::log('** inserindo turma 2');
    $turma = new Turma();
    $turma->dia_semana = 'Segunda';
    $turma->turno = 'Manhã';
    $turma->professor = 'Sérgio Crespo';
    $turma->sala = '200';
    $turma->data_inicio = '2004-09-01';
    $turma->encerrada = FALSE;
    $turma->ref_curso = 3;
    
    $turma->store();
    
    TTransaction::close();
    
    echo "Registros inseridos com Sucesso \n";
    
} catch (Exception $ex) {
    echo "<b>Erro</b>" .$ex->getMessage();
    TTransaction::rollback();
}
