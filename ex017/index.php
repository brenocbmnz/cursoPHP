<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Médias</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .slider-container {
            margin: 20px 0;
        }
        .slider-value {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    $valorItem = $_GET['v1'] ?? 0;
    $valorReajuste = $_GET['v2'] ?? 0;
    
    $formEnviado = isset($_GET['v1']) && isset($_GET['v2']);
    ?>
    
    <main>
        <h1>Reajuste de Preço</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
            <label for="v1">Digite o valor a ser reajustado</label>
            <input type="number" name="v1" id="v1" value="<?=$valorItem?>" required>
            
            <div class="slider-container">
                <label for="v2">Porcentagem de reajuste: <span id="sliderValue"><?=$valorReajuste?></span>%</label>
                <input type="range" name="v2" id="v2" min="0" max="100" value="<?=$valorReajuste?>" oninput="updateSliderValue(this.value)" required>
                <div class="slider-value"></div>
            </div>
            
            <input type="submit" value="Reajustar">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <?php if ($formEnviado): ?>
            <div class="conta">
                <p class="resultado">
                    <?php
                    $valorPorcentagem = $valorReajuste / 100;
                    $valorFinal = ($valorItem * $valorPorcentagem) + $valorItem;

                    echo "Após um reajuste de <strong>$valorReajuste%</strong>, o preço do produto foi de <strong>R$ " . number_format($valorItem, 2, ',', '.') . "</strong> para <strong>R$ " . number_format($valorFinal, 2, ',', '.') . "</strong>.";
                    ?>
                </p>
            </div>
        <?php else: ?>
            <p>Preencha o formulário para ver o resultado.</p>
        <?php endif; ?>
    </section>

    <script>
        function updateSliderValue(val) {
            document.getElementById('sliderValue').innerHTML = val;
        }
    </script>
</body>
</html>