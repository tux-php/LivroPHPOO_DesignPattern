<?php

function __autoload($classe){
    if(file_exists("../app.widgets/{$classe}.php")){
        include_once "../app.widgets/{$classe}.php";
    }
}

function onProdutos($get){
    echo "Lorem Ipsum é simplesmente uma simulação de texto da indústria "
    . "tipográfica e de impressos, e vem sendo utilizado desde o século XVI, "
    . "quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou "
            . "para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a "
            . "cinco séculos, como também ao salto para a editoração eletrônica, "
            . "permanecendo essencialmente inalterado. Se popularizou na década de 60, "
            . "quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, "
            . "e mais recentemente quando passou a ser integrado a softwares de editoração "
            . "eletrônica como Aldus PageMaker. \n";
}

function onContato($get){
    echo "É um fato conhecido de todos que um leitor se distrairá com o conteúdo de "
    . "texto legível de uma página quando estiver examinando sua diagramação. "
            . "A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras,"
            . " ao contrário de , fazendo com que ele tenha uma aparência similar a de"
            . " um texto legível. Muitos softwares de publicação e editores de páginas na 
                internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca
                por";
}

function onEmpresa($get){
    echo "Lorem Ipsum é simplesmente uma simulação de texto da indústria "
    . "tipográfica e de impressos, e vem sendo utilizado desde o século XVI, "
    . "quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou "
            . "para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a "
            . "cinco séculos, como também ao salto para a editoração eletrônica, "
            . "permanecendo essencialmente inalterado. Se popularizou na década de 60, "
            . "quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, "
            . "e mais recentemente quando passou a ser integrado a softwares de editoração "
            . "eletrônica como Aldus PageMaker. \n";
}

echo "<a href='?method=onProdutos'>Produtos</a> <br>";
echo "<a href='?method=onContato'>Contato</a> <br>";
echo "<a href='?method=onEmpresa'>Empresa</a> <br>";

$pagina = new TPage();
$pagina->show();