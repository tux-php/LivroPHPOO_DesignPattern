<?php
function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

class Pagina extends TPage{
    private $panel;
    
    function __construct() {
        parent::__construct();
        
        $this->panel = new TPanel(400, 200);
        $this->panel->put(new TParagraph('Responda a questão'),10,10);
        
        $action1 = new TAction(array($this, 'onYes'));
        $action2 = new TAction(array($this, 'onNo'));
        
        new TQuestion('Deseja realmente excluir o registro?', $action1, $action2);
        
        parent::add($this->panel);
        
    }
    
    function onYes(){
        $this->panel->put(new TParagraph('Você escolheu a opção sim'),10,40);
    }
    
    function onNo(){
        $this->panel->put(new TParagraph('Você escolheu a opção não'),10,40);
    }
}


$pagina = new Pagina();
$pagina->show();
