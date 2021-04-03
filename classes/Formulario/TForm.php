<?php
class TForm{
    protected $fields;
    protected $name;

    public function __construct($name = 'my_form'){
        $this->setName($name);
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setEditable($bool){
        if($this->fields){
            foreach($this->fields as $object){
                $object->setEditable($bool);
            }
        }
    }

    public function setFields($fields){
        foreach($fields as $field){
            if($field instanceof TField){
                $name = $field->getName();
                $this->fields[$name] = $field;

                if($field instanceof TButton){
                    $field->setFormName($this->name);
                }
            }
        }
    }

    public function getField($name){
        return $this->fields[$name];
    }

    public function setData($object){
        foreach($this->fields as $name=>$field){
            if($name){
                @$field->setValue($object->$name);
            }
        }
    }

    public function getData($class = 'stdClass'){
        $object = new $class;
        foreach($this->fields as $key=>$fieldObject){
            $val = isset($_POST[$key] ? $_POST[$key] : '');
            if(get_class($this->fields[$key]) == 'TCombo'){
                if($val !== '0'){
                    $object->$key = $val;
                }
            }
            else if(!$fieldObject instanceof TButton){
                $object->$key = $val;
            }
        }
        foreach($_FILES as $key => $content){
            $object->$key = $content['tmp_name'];
        }
        return $object;
    }

    public function add($object){
        $this->child = $object;
    }

    public function show(){
        $tag = new TElement('form');
        $tag->enctype = "multipart/form-data";
        $tag->name = $this->name;
        $tag->method = "POST";
        $tag->add($this->child);
        $tag->show();
    }

}
?>