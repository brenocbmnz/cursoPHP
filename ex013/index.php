<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Médias</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // Inicializa as variáveis
    $nota1 = $_GET['v1'] ?? 0;
    $peso1 = $_GET['v2'] ?? 1;
    $nota2 = $_GET['v3'] ?? 0;
    $peso2 = $_GET['v4'] ?? 1;
    
    // Verifica se o formulário foi enviado
    $formEnviado = isset($_GET['v1']) && isset($_GET['v2']) && isset($_GET['v3']) && isset($_GET['v4']);
    ?>
    
    <main>
        <h1>Cálculo de Médias</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
            <label for="v1">Nota 1</label>
            <input type="number" name="v1" id="v1" value="<?=$nota1?>" required>
            <label for="v2">Peso 1</label>
            <input type="number" name="v2" id="v2" value="<?=$peso1?>" required>
            <label for="v3">Nota 2</label>
            <input type="number" name="v3" id="v3" value="<?=$nota2?>" required>
            <label for="v4">Peso 2</label>
            <input type="number" name="v4" id="v4" value="<?=$peso2?>" required>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <?php if ($formEnviado): ?>
            <div class="conta">
                <p class="resultado">
                    <?php
                    $mediaSimples = number_format(($nota1 + $nota2) / 2, 2, ",", ".");
                    $mediaPonderada = number_format(($nota1 * $peso1 + $nota2 * $peso2) / ($peso1 + $peso2), 2, ",", ".");

                    echo "Analisando as notas <strong>$nota1 e $nota2</strong>, temos:";
                    echo "<br> A média simples é <strong>$mediaSimples</strong>";
                    echo "<br> A média ponderada é <strong>$mediaPonderada</strong>";
                    ?>
                </p>
            </div>
        <?php else: ?>
            <p>Preencha o formulário para ver o resultado.</p>
        <?php endif; ?>
    </section>
</body>
</html>