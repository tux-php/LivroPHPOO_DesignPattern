<?php
function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

$dados[] = array(1, 'Maria do Rosário', 'http://www.maria.com.br',1200);
$dados[] = array(2, 'Pedro Cardoso', 'http://www.pedro.com.br',800);
$dados[] = array(3, 'João de Barro', 'http://www.joao.com.br',1500);
$dados[] = array(3, 'Joana Pereira', 'http://www.joana.com.br',700);
$dados[] = array(3, 'Erasmo Carlos', 'http://www.erasmo.com.br',2500);

$tabela = new TTable();

$tabela->width = 600;
$tabela->border = 1;

$cabecalho = $tabela->addRow();
$cabecalho->bgcolor = '#a0a0a0';

$cabecalho->addCell('Código');
$cabecalho->addCell('Nome');
$cabecalho->addCell('Site');
$cabecalho->addCell('Salário');

$i = 0;
$total = 0;

foreach($dados as $pessoa){
    $bgcolor = ($i % 2)== 0 ? '#d0d0d0':'#ffffff';
    
    $linha = $tabela->addRow();
    $linha->bgcolor = $bgcolor;
    
    //add células
    $linha->addCell($pessoa[0]);
    $linha->addCell($pessoa[1]);
    $linha->addCell($pessoa[2]);    
    $x = $linha->addCell($pessoa[3]);
    $x->align = "right";
    $total += $pessoa[3];
    $i++;
}

//instancia linha p/ o totalizador
$linha = $tabela->addRow();

//add célula
$celula = $linha->addCell('Total');
$celula->colspan = 3;

$celular = $linha->addCell($total);
$celula->bgcolor = "#a0a0a0";
$celula->align = "right";

$tabela->show();
