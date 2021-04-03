<?php
function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

class Pagina extends TPage{
    private $table;
    private $content;
    
    function __construct() {
        parent::__construct();
        $this->table = new TTable();
        
        $this->table->border = 1;
        $this->table->width = 500;
        $this->table->style = 'border-collapse:collapse';
        
        $row = $this->table->addRow();
        $row->bgcolor = '#d0d0d0';
        
        $action1 = new TAction(array($this, 'onProdutos'));
        $action2 = new TAction(array($this, 'onContato'));
        $action3 = new TAction(array($this, 'onEmpresa'));
        
        $link1 = new TElement('a');
        $link2 = new TElement('a');
        $link3 = new TElement('a');
        
        $link1->href = $action1->serialize();
        $link2->href = $action2->serialize();
        $link3->href = $action3->serialize();
        
        $link1->add('Produtos');
        $link2->add('Contato');
        $link3->add('Empresa');
        
        $row->addCell($link1);
        $row->addCell($link2);
        $row->addCell($link3);
        
        $this->content = $this->table->addRow();
        
        parent::add($this->table);
        
    }
    
    function onProdutos($get){
        $texto = "Nesta seção vc irá conhecer os produtdos da nossa empresa."
                . "Temos desde pintos, frangos, porcos, bois, vacas e todo tipo de animal"
                . " q vc irá imaginar na nossa fazenda. ";
        
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;
        
        $win = new TWindow('Promoção');
        $win->setPosition(200, 100);
        $win->setSize(240, 100);
        
        $win->add('Temos cogumelos recém colhidos e também ovos de codorna fresquinhos');
        
        $win->show();
    }
    
    function onContato($get){
        $texto = " Para entrar em contato com nossa empresa,"
                . "ligue para 0800-1234-5678 ou mande uma carta endereçada para"
                . "Linha alto coqueiro baixo, fazenda recanto escondido.";
        
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;
    }
    
    function onEmpresa($get){
        $texto = "Aqui na fazenda recanto escondido fazemos eco-turismo,"
                . "vc vai poder conhecer nossas instalações,"
                . "tirar leite diretamente da vaca, recolher os ovos do galinheiro e o mais"
                . "importatnte, vai poder limpar as instalacoes dos suínos, o q é o auge do"
                . "passeio. Não deixe de conhecer nossa fazenda, temos lindas cabanas"
                . "equipadas com cama de casal, fogão a lenha e banheiro."; 
        
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;
    }
}


$pagina = new Pagina();
$pagina->show();