<?php

/* @author fernando */

class TWindow {
    private $x;
    private $y;
    private $width;
    private $height;
    private $title;
    private $content;
    static private $counter;
    
    public function __construct($title) {
        self::$counter ++;
        $this->title = $title;
    }
    
    public function setPosition($x,$y){
        $this->x = $x;
        $this->y = $y;
    }
    
    public function setSize($width, $height){
        $this->width = $width;
        $this->height = $height;
    }
    
    public function add($content){
        $this->content = $content;
    }
    
    public function show(){
        $window_id = 'TWindow'.self::$counter;
        
        $style = new TStyle($window_id);
        $style->position = 'absolute';
        $style->left     = $this->x;
        $style->top      = $this->y;
        $style->width    = $this->width;
        $style->height   = $this->height;
        $style->background = '#e0e0e0';
        $style->border   = '1px solid #000000';
        $style->z_index = "10000";
        
        $style->show();
        
        
        $painel = new TElement('div');
        $painel->id     = $window_id;
        $painel->class  = $window_id;
        
        $table = new TTable();
        $table->width   = '100%';
        $table->height  = '100%';
        $table->style   = 'border-collapse:collapse';
        
        $row1 = $table->addRow();
        $row1->bgcolor = '#707070';
        $row1->height  = '20px';
        
        $titulo = $row1->addCell("<font face=Arial size=2 color=white><b>{$this->title}</b></font>");
        $titulo->widht = '100%';
        
        $link = new TElement('a');
        $link->add(new TImage("../app.images/ico_close.png"));
        $link->onclik = "document.getElementById('$window_id').style.display='none'";
        
        $cell = $row1->addCell($link);
        
        $row2 = $table->addRow();
        $row2->valign = 'top';
        
        $cell = $row2->addCell($this->content);
        $cell->collspan = 2;
        
        $painel->add($table);
        
        $painel->show();
    }
}
