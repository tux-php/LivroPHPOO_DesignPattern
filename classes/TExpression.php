<?php
/*
 * Classe abstrata p/ gerenciar expressões
 * */

abstract class TExpression
{
    //operadores lógicos
    const AND_OPERATOR = ' AND ';
    const OR_OPERATOR = ' OR ';

    abstract public function dump();

}