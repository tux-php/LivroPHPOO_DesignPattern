<?php

class TCriteria extends TExpression
{
    private $expresions;
    private $operators;
    private $properties;

    function __construct()
    {

        $this->expresions = array();
        $this->properties = array();
    }

    public function add(TExpression $expression, $operator = self::AND_OPERATOR)
    {
        if(empty($this->expresions))
        {
            $operator = null;
        }
        $this->expresions[] = $expression;
        $this->operators[] = $operator;
    }

    public function dump()
    {
        if(is_array($this->expresions))
        {
            if(count($this->expresions) > 0)
            {
                $result = '';

                foreach ($this->expresions as $i=>$expresion) {
                    $operator = $this->operators[$i];
                    $result.= $operator.$expresion->dump(). ' ';
                }
                $result = trim($result);
                return "({$result})";
            }
        }
    }

    public function setProperty($property,$value)
    {
        if(isset($value))
        {
            $this->properties[$property] = $value;
        }
        else
        {
            $this->properties[$property] = NULL;
        }
    }

    public function getProperty($property)
    {
        if(isset($this->properties[$property]))
        {
            if(isset($this->properties[$property]))
            {
                return $this->properties[$property];
            }
        }
    }
}