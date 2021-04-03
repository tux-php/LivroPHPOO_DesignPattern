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
    TTransaction::setLogger(new TLoggerTXT('/tmp/log2.txt'));
    
    echo "obtendo alunos \n";
    echo "===============\n";
    
    //obtém o aluno ID 1
    $aluno = new Aluno(1);
    echo 'Nome           :'.$aluno->nome."\n";
    echo 'Endereço       :'.$aluno->endereco."\n";
    
    $aluno = new Aluno(2);
    echo 'Nome           :'.$aluno->nome."\n";
    echo 'Endereço       :'.$aluno->endereco."\n";
    
    //obtém aluns cursos
    echo "\n";
    echo "obtendo cursos \n";
    echo "================\n";
    
    $curso = new Curso(1);
    echo 'Curso : '.$curso->descricao ."\n";
    
    $curso = new Curso(2);
    echo 'Curso : '.$curso->descricao ."\n";
    
    //finaliza transação
    TTransaction::close();
} catch (Exception $ex) {
    echo '<b>Erro</b>'.$ex->getMessage();
    TTransaction::rollback();
}

