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
    $anoNasc = $_GET['v1'] ?? 0;
    $anoCalc = $_GET['v2'] ?? 0;
    $anoAtual = date("Y"); // Obtém o ano atual
    
    $formEnviado = isset($_GET['v1']) && isset($_GET['v2']);
    ?>
    
    <main>
        <h1>Cálculo de Médias</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
            <label for="v1">Em que ano você nasceu?</label>
            <input type="number" name="v1" id="v1" value="<?=$anoNasc?>" required>
            <label for="v2">Quer saber sua idade em que ano? (estamos no ano <?=$anoAtual?>)</label>
            <input type="number" name="v2" id="v2" value="<?=$anoCalc?>" required>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <?php if ($formEnviado): ?>
            <div class="conta">
                <p class="resultado">
                    <?php
                    $idade = $anoCalc - $anoNasc;
                    if ($anoAtual > $anoCalc){
                        echo "Você tinha <strong>$idade</strong> anos no ano <strong>$anoCalc</strong>";
                    }else{
                    echo "Quem nasceu em <strong>$anoNasc</strong> vai completar <strong>$idade</strong> anos em <strong>$anoCalc</strong>.";
                }
                    ?>
                </p>
            </div>
        <?php else: ?>
            <p>Preencha o formulário para ver o resultado.</p>
        <?php endif; ?>
    </section>
</body>
</html>