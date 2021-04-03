<?php

/* @author fernando */

class TParagraph extends TElement {
    public function __construct($text) {
        parent::__construct('p');
        parent::add($text);
    }
    
    function setAlign($align){
        $this->align = $align;
    }
}
