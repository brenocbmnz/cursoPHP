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

    $valor1 = $_GET['v1'] ?? "Preencha o valor do dividendo";
    $valor2 = $_GET['v2'] ?? "Preencha o valor do divisor";

    ?>
    <main>
        <h1>Cáluclo de divisão</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>"
        method="get">
        <label for="v1">Dividendo</label>
        <input type="number" name="v1" id="v1" value="<?=$valor1?>" required>
        <label for="v2">Divisor</label>
        <input type="number" name="v2" id="v2" value="<?=$valor2?>" required>
        <input type="submit" value="Dividir">
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <div class="conta">
            <?php
            $div = $valor1 / $valor2;
            $rest = $valor1 % $valor2;
            ?>

            <p class="valores">
                <?php 
                echo "<span>$valor1</span>";
                echo "<span>$valor2</span>";
                ?>
            </p>

            <p class="resultado">
                <?php 
                echo "<span>$rest</span>";
                echo "<span>$div</span>";
                ?>
            </p>
        </div>
</body>
</html>