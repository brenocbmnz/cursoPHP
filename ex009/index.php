<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    $valor1 = $_GET['v1'] ?? "Preencha o valor 1";
    $valor2 = $_GET['v2'] ?? "Preencha o valor 2";

    ?>
    <main>
        <h1>Somador de Valores</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>"
        method="get">
        <label for="v1">Valor 1</label>
        <input type="number" name="v1" id="v1" value="<?=$valor1?>" required>
        <label for="v2">Valor 2</label>
        <input type="number" name="v2" id="v2" value="<?=$valor2?>" required>
        <input type="submit" value="Somar">
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <p>
            <?php
            if (is_numeric($valor1) && is_numeric($valor2)) {
                $soma = $valor1 + $valor2;
                echo "A soma de $valor1 e $valor2 é: $soma";
            } else {
                echo "Por favor, preencha os valores.";
            }
            ?>
        </p>
</body>
</html>