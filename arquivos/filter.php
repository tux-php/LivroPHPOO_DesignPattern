<?php
function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"));
    {
        include_once ("../classes/{$classe}.php");
    }
}

//cria um filtro por data(string)
$filter1 = new TFilter('data','=','21-04-2020');
echo $filter1->dump();
echo "\n";
//criando um filtro por salário(integer)
$filter2=new TFilter('salario','>',6000);
echo $filter2->dump();
echo "\n";
//criando um filtro por sexo(array)
$filter3=new TFilter('sexo','IN',array('M','F'));
echo $filter3->dump();
echo "\n";
//criando um filtro por CONTRATO(NULL)
$filter4=new TFilter('contrato','IS NOT',null);
echo $filter4->dump();
echo "\n";
//criando um filtro por ativo(boolean)
$filter5=new TFilter('ativo','=',TRUE);
echo $filter5->dump();
echo "\n";