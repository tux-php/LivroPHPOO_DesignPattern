<?php
/*
 * Esta classe provê uma interface p/ definição de filtros de seleção
 * */

class TFilter extends TExpression
{
    private $variable; //variável
    private $operator; //operador
    private $value; //valor

    function __construct($variable,$operator,$value)
    {
        $this->variable = $variable;
        $this->operator = $operator;
        $this->value = $this->transforme($value);
    }

    private function transforme($value){
        //caso seja um array
        if(is_array($value))
        {
            foreach ($value as $x)
            {
                if(is_integer($x))
                {
                    $foo[] = $x;
                }
                else if(is_string($x))
                {
                    $foo[]="'$x'";
                }
            }
            $result = '('.implode(',',$foo).')';
        }
        //caso seja uma string
        else if(is_string($value))
        {
            $result = "'$value'";
        }
        // caso seja uma valor nulo
        else if(is_null($value))
        {
            $result = 'NULL';
        }
        //caso seja boleano
        else if(is_bool($value))
        {
            $result = $value ? 'TRUE' : 'FALSE';
        }
        else
        {
            $result = $value;
        }

        return $result;
    }

    /*
     * método dump()
     * retorna o filtro em forma de string
     * */

    public function dump()
    {
        //concatenando a expressão
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}