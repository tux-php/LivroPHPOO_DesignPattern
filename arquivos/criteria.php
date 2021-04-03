<?php
function __autoload($classe)
{
    if(file_exists("../classes/{$classe}.php"));
    {
        include_once ("../classes/{$classe}.php");
    }
}

$criteria = new TCriteria();
$criteria->add(new TFilter('idade','<',16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade','>',60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo"\n";


$criteria = new TCriteria();
$criteria->add(new TFilter('idade','IN',array(24,25,26)));
$criteria->add(new TFilter('idade','NOT IN',array(10)));
echo $criteria->dump();
echo"\n";

$criteria = new TCriteria();
$criteria->add(new TFilter('nome','like','pedro%'),TExpression::OR_OPERATOR);
$criteria->add(new TFilter('nome','like','maria%'),TExpression::OR_OPERATOR);
echo $criteria->dump();
echo"\n";


$criteria = new TCriteria();
$criteria->add(new TFilter('telefone','IS NOT',NULL));
$criteria->add(new TFilter('sexo','=','F'));
echo $criteria->dump();
echo"\n";


$criteria = new TCriteria();
$criteria->add(new TFilter('UF','IN',array('RS','SC','PR')));
$criteria->add(new TFilter('UF','NOT IN',array('AC','PI')));
echo $criteria->dump();
echo"\n";


$criteria1 = new TCriteria();
$criteria1->add(new TFilter('sexo','=','F'));
$criteria1->add(new TFilter('idade','>',18));
//echo $criteria1->dump();
//echo"\n";


$criteria2 = new TCriteria();
$criteria2->add(new TFilter('sexo','=','M'));
$criteria2->add(new TFilter('idade','<',16));
//echo $criteria2->dump();
//echo"\n";

$criteria = new TCriteria();
$criteria->add($criteria1, TExpression::OR_OPERATOR);
$criteria->add($criteria2, TExpression::OR_OPERATOR);
echo $criteria->dump();
echo"\n";