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

try
{
    TTransaction::open('pg_livro');
    TTransaction::setLogger(new TLoggerTXT('/tmp/log5.txt'));
    
    TTransaction::log("** Apagando da primeira forma");
    
    $aluno = new Aluno(1);
    $aluno->delete();
    
    TTransaction::log("** Apagando da segunda forma");
    
    $modelo = new Aluno();
    $modelo->delete(2);
    
    TTransaction::close();
    
    echo "Exclusão realizada com sucesso \n";
} catch (Exception $ex) {
    echo "<b>Erro</b>".$ex->getMessage();
    TTransaction::rollback();

}

