<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisão</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    $valor1 = $_GET['v1'] ?? "Informe seu salário";

    ?>
    <main>
        <h1>Cáluclo de divisão</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>"
        method="get">
        <label for="v1">Informe seu salário para calcularmos quantos salários mínimos você recebe</label>
        <input type="number" name="v1" id="v1" value="<?=$valor1?>" required>
        <input type="submit" value="Somar">
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <div class="conta">
            <?php
            $salariomin = 1380.00;
            $quantidade = $valor1 / $salariomin;
            $divInteira = (int)$quantidade;
            $resto = $valor1 - ($salariomin * $divInteira);
            ?>
            <p class="resultado">
                <?php 
                echo "Seu salário equivale a <strong>$divInteira</strong> salário(s) mínimo(s) + <strong>$resto<strong></span>";
                ?>
            </p>
        </div>
</body>
</html>