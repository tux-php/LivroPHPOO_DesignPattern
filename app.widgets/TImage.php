<?php

/* @author fernando */

class TImage {
    private $source;
    private $tag;
    
    public function __construct($source) {
        $this->source = $source;
        $this->tag = new TElement('img');
    }
    
    public function show(){
        $this->tag->src = $this->source;
        $this->tag->border = 0;
        
        $this->tag->show();
    }
}
