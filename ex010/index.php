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
        <input type="number" name="v1" id="v1" min="0" value="<?=$valor1?>" required>
        <label for="v2">Divisor</label>
        <input type="number" name="v2" id="v2" min="1" value="<?=$valor2?>" required>
        <input type="submit" value="Dividir">
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <div class="conta">
            <?php
            $div = intdiv($valor1, $valor2);
            $rest = $valor1 % $valor2;
            ?>

            <table class="divisao">
            <tr>
                <td><?=$valor1?></td>
                <td><?=$valor2?></td>
                </tr>

                <tr>
                <td><?=$rest?></td>
                <td><?=$div?></td>
                </tr>
        </div>
</body>
</html>