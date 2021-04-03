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
    TTransaction::setLogger(new TLoggerTXT('/tmp/log1.txt'));
    
    TTransaction::log("** inserindo alunos");
    
    $daline = new Aluno();
    $daline->nome = 'Daline Dall Oglio';
    $daline->endereco = 'Ruda da Conceição';
    $daline->telefone = '(51) 1111-2222';
    $daline->cidade = 'Cruzeiro do Sul';
    $daline->store();
    
    $william = new Aluno();
    $william->nome = 'William Scatolla';
    $william->endereco = 'Rua de Fátima';
    $william->telefone = '(51) 1111-4444';
    $william->cidade = 'Encantado';
    $william->store();
    
    TTransaction::log("** inserindo cursos");
    $curso = new Curso();
    $curso->descricao = 'Orientação a Objetos com PHP';
    $curso->duracao = 24;
    $curso->store();
    
    $curso = new Curso();
    $curso->descricao = 'Desenvolvendo em PHP-GTK';
    $curso->duracao = 32;
    $curso->store();
    
    TTransaction::close();
    echo "Registros inseridos com Sucesso \n";
    
} catch (Exception $e) {
    echo '<b>Erro</b>'.$e->getMessage();
    TTransaction::rollback();
}