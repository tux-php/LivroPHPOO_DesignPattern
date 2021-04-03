<?php

/* @author fernando */

class TTableCell extends TElement {
    public function __construct($value) {
        parent::__construct('td');
        parent::add($value);
    }
}
