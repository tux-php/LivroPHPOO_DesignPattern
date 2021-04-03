<?php


final class TSqlUpdate extends TSqlInstruction
{
    private $columnValues;

    public  function setRowData($column, $value)
    {
        if(is_scalar($value))
        {
            if(is_string($value))
            {
                $value = addslashes($value);
                $this->columnValues[$column] = "'$value'";
            }
            else if(is_bool($value))
            {
                $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
            }
            else if(is_integer($value))
            {
                $this->columnValues[$column] = $value;
            }
            else if($value!==''){
                $this->columnValues[$column] = "NULL";
            }
        }
    }

    function getInstruction()
    {
        $this->sql = "UPDATE {$this->entity}";
        if($this->columnValues)
        {
            foreach ($this->columnValues as $column=>$value)
            {
                $set[] = "{$column} = {$value}";
            }
        }
        $this->sql .=' SET ' .implode(', ', $set);
        if($this->criteria)
        {
            $this->sql .=' WHERE '.$this->criteria->dump();
        }
        return $this->sql;
    }
}