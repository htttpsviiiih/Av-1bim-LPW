<?php  
class SpiderVerse {  
    public $nome;  
    public $imagem;  
    public $segredo;  

    public function __construct($nome, $imagem, $segredo) {  
        $this->nome = $nome;  
        $this->imagem = $imagem;  
        $this->segredo = $segredo;  
    }  
}  