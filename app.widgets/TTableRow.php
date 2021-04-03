<?php

/* @author fernando */

class TTableRow extends TElement{
    public function __construct() {
        parent::__construct('tr');
    }
    
    public function addCell($value){
        $cell = new TTableCell($value);
        parent::add($cell);
        return $cell;
    }
}
