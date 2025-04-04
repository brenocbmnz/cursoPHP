<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .resultado-notas {
            margin: 15px 0;
        }
        .nota {
            margin: 8px 0;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
        .nota-imagem {
            width: 80px;
            height: 40px;
            background-color: #e0e0e0;
            margin-right: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #333;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <?php
    $valorSaque = $_GET['valor'] ?? 0;
    
    $formEnviado = isset($_GET['valor']);
    ?>
    
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
            <label for="valor">Valor para saque (R$)</label>
            <input type="number" name="valor" id="valor" min="5" step="5" value="<?=$valorSaque?>" required>
            <p style="font-size: 0.8em; color: #666;">*Notas disponíveis: R$100, R$50, R$20, R$10, R$5</p>
            <input type="submit" value="Sacar">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado do Saque</h2>
        <?php if ($formEnviado): ?>
            <div class="conta">
                <?php
                // Verificar se o valor é múltiplo de 5
                if ($valorSaque % 5 != 0) {
                    echo "<p class='erro'>Só temos notas de R$100, R$50, R$20, R$10, R$5.</p>";
                } else {
                    // Notas disponíveis
                    $notas = [100, 50, 20, 10, 5];
                    $quantidadeNotas = [];
                    $valorRestante = $valorSaque;
                    
                    // Calcula a quantidade de cada nota
                    foreach ($notas as $nota) {
                        $quantidadeNotas[$nota] = intdiv($valorRestante, $nota);
                        $valorRestante = $valorRestante % $nota;
                    }
                    
                    echo "<p>Para sacar <strong>R$ " . number_format($valorSaque, 2, ',', '.') . "</strong>, você receberá:</p>";
                    
                    echo "<div class='resultado-notas'>";
                    foreach ($notas as $nota) {
                        echo "<div class='nota'>";
                        echo "<div class='nota-imagem'>R$ $nota</div>";
                        echo "<div><strong>" . $quantidadeNotas[$nota] . "</strong> nota" . ($quantidadeNotas[$nota] != 1 ? 's' : '') . " de R$ $nota,00</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                    
                    $totalNotas = array_sum($quantidadeNotas);
                    echo "<p>Total: <strong>$totalNotas</strong> nota" . ($totalNotas != 1 ? 's' : '') . "</p>";
                }
                ?>
            </div>
        <?php else: ?>
            <p>Digite um valor para ver o resultado do saque.</p>
        <?php endif; ?>
    </section>
</body>
</html>