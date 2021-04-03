<?php

/* @author fernando */

class TTable extends TElement{
    public function __construct() {
        parent::__construct('table');
    }
    
    public function addRow(){
        $row = new TTableRow();
        parent::add($row);
        return $row;
    }
}
