<?php


final class TSqlInsert extends TSqlInstruction
{
    public function setRowData($column, $value)
    {
        if(is_scalar($value))
        {
            if(is_string($value) and (!empty($value)))
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
            else if($value!=='')
            {
                $this->columnValues[$column] = "NULL";
            }
        }

    }

    public function setCriteria(TCriteria $criteria)
    {
        throw new Exception("Cannot call setCriteria from ".__CLASS__);
    }

    function getInstruction()
    {
        $this->sql = "INSERT INTO {$this->entity} (";
        $columns = implode(',',array_keys($this->columnValues));
        $values = implode(',',array_values($this->columnValues));
        $this->sql.=$columns.')';
        $this->sql.=" values ({$values})";
        return $this->sql;
    }
}