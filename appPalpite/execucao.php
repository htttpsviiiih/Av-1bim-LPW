<?php 
require_once 'model/SpiderVerse.php';
echo '<!DOCTYPE html>  
<html>  
<head>  
    <title>Multiverso Spider-Man</title>  
    <style>  
        body { font-family: Arial; background: #ffffff; color: #290081; text-align: center; }  
        a { 
            color: red; 
            text-decoration: none; 
            font-size: 20px; 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            margin-bottom: 20px; 
        }  
        a img { 
            width: 100px; 
            height: 100px; 
        }
        body { 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
        }
        img { width: 200px; height: 200px; }  
    </style>  
</head>  
<body>  
    <h1>Adivinhe o Spider-Man</h1>  
    <p>Escolha um deles para ser seu palpite</p>  
    <br>
    <a href="execucao.php?palpite=1"><img src="https://i0.wp.com/ovicio.com.br/wp-content/uploads/2022/12/20221224-fkwv_esx0acopik.jpg?resize=555%2C555&ssl=1"><br>Palpite 1 - Aranha do Tobey</a>  
    <a href="execucao.php?palpite=2"><img src="https://wallpapers.com/images/hd/andrew-garfield-spider-man-i1m3b8tq87h85us2.jpg"><br>Palpite 2- Aranha do Andrew</a>  
    <a href="execucao.php?palpite=3"><img src="https://rollingstone.com.br/media/uploads/2023/11/tom-holland-nao-tem-certeza-se-voltara-a-viver-o-homem-aranha-foto-reproducaosony-pictures.jpg"><br>Palpite 3 = Aranha do Tom</a> 
    <a href="execucao.php?palpite=9">Tentar Novamente</a> 
    <a href="execucao.php?palpite=0">Sair</a> 
</body>  
</html>';
$spiderman1 = new SpiderVerse(  
    "Tobey Maguire",  
    "https://i0.wp.com/ovicio.com.br/wp-content/uploads/2022/12/20221224-fkwv_esx0acopik.jpg?resize=555%2C555&ssl=1",  
    "Seu filme tem um trem dividido ao meio!"  
);  

$spiderman2 = new SpiderVerse(  
    "Andrew Garfield",  
    "https://wallpapers.com/images/hd/andrew-garfield-spider-man-i1m3b8tq87h85us2.jpg",  
    "Ele salvou MJ caindo no tempo certo!(e cai entre nós, ele é o melhor miranha!)"  
);  

$spiderman3 = new SpiderVerse(  
    "Tom Holland",  
    "https://rollingstone.com.br/media/uploads/2023/11/tom-holland-nao-tem-certeza-se-voltara-a-viver-o-homem-aranha-foto-reproducaosony-pictures.jpg",  
    "Seu mentor era (<- depressão) um cientista de armadura!"  
);  

//sorteia um dos 3 miranhas
$correto = rand(1, 3);  

do {
    switch ($correto) {  
        case 1:  
            $spiderCorreto = $spiderman1;  
            break;  
        case 2:  
            $spiderCorreto = $spiderman2;  
            break;  
        case 3:  
            $spiderCorreto = $spiderman3;  
            break;  
    }  
} while ($correto == 0);

if (!isset($_GET['palpite'])) {  
    echo "<h1>ERRO: Você não escolheu um Spider-Man!(ou para sair)</h1>";
} else {  
    $palpiteUsuario = $_GET['palpite'];  

    if ($palpiteUsuario == 0) {  
        echo "<h1>Jogo encerrado! Obrigado por jogar!</h1>";  
    }
    elseif($palpiteUsuario == 9){
        echo "<h1>🕷 Boa Sorte! 🕷</h1>";  
    } elseif ($palpiteUsuario == $correto) {  
        echo "<h1>🕷 Acertou! É o " . $spiderCorreto->nome . "!</h1>";  
        echo "<img src='" . $spiderCorreto->imagem . "' style='width: 300px; border: 3px solid red;'>";  
        echo "<p>Segredo: " . $spiderCorreto->segredo . "</p>";  
    } else {  
        echo "<h1>Errou! Não era esse Miranha... mais sorte na próxima :( </h1>";  
        echo "<p>Informação sobre o héroi sorteado: " . $spiderCorreto->segredo . "</p>";  
        echo "<p>Você escolheu: " . $palpiteUsuario . "</p>";
        echo "<p>O correto era: " . $correto . "</p>";
        echo "<img src='" . $spiderCorreto->imagem . "' style='width: 300px;'>";  
    }  
}