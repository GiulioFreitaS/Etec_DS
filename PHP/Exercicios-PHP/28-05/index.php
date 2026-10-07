<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista de Exercícios PHP</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f4f4;
    padding:20px;
}

h1{
    text-align:center;
}

.exercicio{
    background:white;
    padding:20px;
    margin-bottom:20px;
    border-radius:10px;
    box-shadow:0 0 5px rgba(0,0,0,.2);
}

input, select{
    padding:8px;
    margin:5px;
}

button{
    padding:8px 15px;
}
</style>
</head>
<body>

<h1>Lista de Exercícios PHP</h1>

<!-- EXERCÍCIO 1 -->
<div class="exercicio">
<h2>1 - Tabuada</h2>

<form method="post">
<input type="number" name="tabuada">
<button name="btn1">Calcular</button>
</form>

<?php
if(isset($_POST['btn1'])){
    $n = $_POST['tabuada'];

    for($i=1;$i<=10;$i++){
        echo "$n x $i = ".($n*$i)."<br>";
    }
}
?>
</div>

<!-- EXERCÍCIO 2 -->
<div class="exercicio">
<h2>2 - Desconto</h2>

<form method="post">
<input type="number" step="0.01" name="preco" placeholder="Preço">
<input type="number" name="desconto" placeholder="%">
<button name="btn2">Calcular</button>
</form>

<?php
if(isset($_POST['btn2'])){
    $preco = $_POST['preco'];
    $desc = $_POST['desconto'];

    $final = $preco - ($preco * $desc / 100);

    echo "Valor final: R$ ".number_format($final,2,",",".");
}
?>
</div>

<!-- EXERCÍCIO 3 -->
<div class="exercicio">
<h2>3 - Aprovado ou Reprovado</h2>

<form method="post">
<input type="number" step="0.1" name="n1">
<input type="number" step="0.1" name="n2">
<input type="number" step="0.1" name="n3">
<input type="number" step="0.1" name="n4">
<button name="btn3">Verificar</button>
</form>

<?php
if(isset($_POST['btn3'])){
    $media = ($_POST['n1']+$_POST['n2']+$_POST['n3']+$_POST['n4'])/4;

    echo "Média: $media <br>";

    echo ($media >= 5) ? "Aprovado" : "Reprovado";
}
?>
</div>

<!-- EXERCÍCIO 4 -->
<div class="exercicio">
<h2>4 - Troca de Valores</h2>

<form method="post">
<input type="number" name="a" placeholder="A">
<input type="number" name="b" placeholder="B">
<button name="btn4">Trocar</button>
</form>

<?php
if(isset($_POST['btn4'])){
    $a = $_POST['a'];
    $b = $_POST['b'];

    $temp = $a;
    $a = $b;
    $b = $temp;

    echo "A = $a <br>";
    echo "B = $b";
}
?>
</div>

<!-- EXERCÍCIO 5 -->
<div class="exercicio">
<h2>5 - Soma dos Quadrados</h2>

<form method="post">
<input type="number" name="q1">
<input type="number" name="q2">
<input type="number" name="q3">
<button name="btn5">Calcular</button>
</form>

<?php
if(isset($_POST['btn5'])){
    $soma = ($_POST['q1']**2)+($_POST['q2']**2)+($_POST['q3']**2);

    echo "Resultado: $soma";
}
?>
</div>

<!-- EXERCÍCIO 6 -->
<div class="exercicio">
<h2>6 - Salário Líquido</h2>

<form method="post">
<input type="number" step="0.01" name="salario">
<button name="btn6">Calcular</button>
</form>

<?php
if(isset($_POST['btn6'])){
    $sal = $_POST['salario'];

    $liq = $sal + ($sal*0.10) - ($sal*0.20);

    echo "Salário Líquido: R$ ".number_format($liq,2,",",".");
}
?>
</div>

<!-- EXERCÍCIO 7 -->
<div class="exercicio">
<h2>7 - Média do Aluno</h2>

<form method="post">
<input type="number" step="0.1" name="m1">
<input type="number" step="0.1" name="m2">
<input type="number" step="0.1" name="m3">
<input type="number" step="0.1" name="m4">
<button name="btn7">Verificar</button>
</form>

<?php
if(isset($_POST['btn7'])){
    $media = ($_POST['m1']+$_POST['m2']+$_POST['m3']+$_POST['m4'])/4;

    echo "Média: $media <br>";

    if($media >= 6)
        echo "Aprovado";
    elseif($media < 3)
        echo "Retido";
    else
        echo "Exame";
}
?>
</div>

<!-- EXERCÍCIO 8 -->
<div class="exercicio">
<h2>8 - Maior e Menor</h2>

<form method="post">
<input type="number" name="x1">
<input type="number" name="x2">
<input type="number" name="x3">
<button name="btn8">Verificar</button>
</form>

<?php
if(isset($_POST['btn8'])){
    echo "Maior: ".max($_POST['x1'],$_POST['x2'],$_POST['x3'])."<br>";
    echo "Menor: ".min($_POST['x1'],$_POST['x2'],$_POST['x3']);
}
?>
</div>

<!-- EXERCÍCIO 9 -->
<div class="exercicio">
<h2>9 - Soma dos Ímpares</h2>

<form method="post">
<input type="number" name="inicio">
<input type="number" name="fim">
<button name="btn9">Somar</button>
</form>

<?php
if(isset($_POST['btn9'])){
    $soma = 0;

    for($i=$_POST['inicio']; $i<=$_POST['fim']; $i++){
        if($i % 2 != 0){
            $soma += $i;
        }
    }

    echo "Soma = $soma";
}
?>
</div>

<!-- EXERCÍCIO 10 -->
<div class="exercicio">
<h2>10 - Par ou Ímpar</h2>

<form method="post">
<input type="number" name="parimpar">
<button name="btn10">Verificar</button>
</form>

<?php
if(isset($_POST['btn10'])){
    echo ($_POST['parimpar'] % 2 == 0)
    ? "Par"
    : "Ímpar";
}
?>
</div>

<!-- EXERCÍCIO 11 -->
<div class="exercicio">
<h2>11 - Calculadora</h2>

<form method="post">
<input type="number" step="0.01" name="c1">
<select name="op">
<option>+</option>
<option>-</option>
<option>*</option>
<option>/</option>
</select>
<input type="number" step="0.01" name="c2">
<button name="btn11">Calcular</button>
</form>

<?php
if(isset($_POST['btn11'])){
    $a = $_POST['c1'];
    $b = $_POST['c2'];

    switch($_POST['op']){
        case '+': echo $a+$b; break;
        case '-': echo $a-$b; break;
        case '*': echo $a*$b; break;
        case '/': echo $a/$b; break;
    }
}
?>
</div>

<!-- EXERCÍCIO 12 -->
<div class="exercicio">
<h2>12 - Ímpares em Ordem Decrescente</h2>

<form method="post">
<input type="number" name="d1">
<input type="number" name="d2">
<button name="btn12">Mostrar</button>
</form>

<?php
if(isset($_POST['btn12'])){

    $maior = max($_POST['d1'],$_POST['d2']);
    $menor = min($_POST['d1'],$_POST['d2']);

    for($i=$maior; $i>=$menor; $i--){
        if($i % 2 != 0){
            echo $i."<br>";
        }
    }
}
?>
</div>

</body>
</html>