<?php

/* @author fernando */

class TElement {
    private $name; //nome da TAG
    private $properties;//propriedades da TAG
    protected $children;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function __set($name,$value){
        $this->properties[$name] = $value;
    }
    
    public function add($child){
        $this->children[] = $child;
    }
    
    private function open(){
        echo "<{$this->name}";
        if($this->properties){
            foreach ($this->properties as $name=>$value)
            {
                echo " {$name}=\"{$value}\"";
            }
        }
        echo '>';
    }
    
    public function show(){
        $this->open();
        echo "\n";
        if($this->children){
            foreach ($this->children as $child){
                if(is_object($child))
                {
                    $child->show();
                }
                else if((is_string($child) or ( is_numeric($child))))
                {
                    echo $child;
                }
            }
            //fecha tag
            $this->close();
        }
    }
    
    private function close(){
        echo "</{$this->name}>\n";
    }
}
