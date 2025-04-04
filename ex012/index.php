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
        <label for="v1">Informe um número</label>
        <input type="number" name="v1" id="v1" value="<?=$valor1?>" required>
        <input type="submit" value="Somar">
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <div class="conta">
            <p class="resultado">
                <?php
                $raizQuadrada = number_format(sqrt($valor1), 2, ",", ".");
                $raizCubica = number_format(pow($valor1,(1/3)), 2, ",", ".");

                echo "Analisando o número <strong>$valor1</strong>, temos:";
                echo "<br> A raiz quadrada de <strong>$valor1</strong> é <strong>$raizQuadrada</strong>";
                echo "<br> A raiz cúbica de <strong>$valor1</strong> é <strong>$raizCubica</strong>";
                ?>
            </p>
        </div>
</body>
</html>