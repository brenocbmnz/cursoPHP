<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Tempo</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .resultado-tempo {
            margin: 15px 0;
        }
        .unidade-tempo {
            margin: 8px 0;
            padding: 5px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
    $segundosTotal = $_GET['segundos'] ?? 0;
    
    $formEnviado = isset($_GET['segundos']);
    ?>
    
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
            <label for="segundos">Digite o tempo em segundos</label>
            <input type="number" name="segundos" id="segundos" value="<?=$segundosTotal?>" required>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado</h2>
        <?php if ($formEnviado): ?>
            <div class="conta">
                <p class="resultado">
                    <?php
                    // Constantes de tempo em segundos
                    $segundosPorMinuto = 60;
                    $segundosPorHora = 60 * 60;
                    $segundosPorDia = 24 * 60 * 60;
                    $segundosPorSemana = 7 * 24 * 60 * 60;
                    
                    // Cálculos
                    $semanas = floor($segundosTotal / $segundosPorSemana);
                    $resto = $segundosTotal % $segundosPorSemana;
                    
                    $dias = floor($resto / $segundosPorDia);
                    $resto = $resto % $segundosPorDia;
                    
                    $horas = floor($resto / $segundosPorHora);
                    $resto = $resto % $segundosPorHora;
                    
                    $minutos = floor($resto / $segundosPorMinuto);
                    $segundos = $resto % $segundosPorMinuto;
                    
                    echo "<p><strong>$segundosTotal segundos</strong> equivalem a:</p>";
                    ?>
                </p>
                
                <div class="resultado-tempo">
                    <div class="unidade-tempo">
                        <strong><?=$semanas?></strong> Semana<?=$semanas != 1 ? 's' : ''?>
                    </div>
                    <div class="unidade-tempo">
                        <strong><?=$dias?></strong> Dia<?=$dias != 1 ? 's' : ''?>
                    </div>
                    <div class="unidade-tempo">
                        <strong><?=$horas?></strong> Hora<?=$horas != 1 ? 's' : ''?>
                    </div>
                    <div class="unidade-tempo">
                        <strong><?=$minutos?></strong> Minuto<?=$minutos != 1 ? 's' : ''?>
                    </div>
                    <div class="unidade-tempo">
                        <strong><?=$segundos?></strong> Segundo<?=$segundos != 1 ? 's' : ''?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p>Preencha o formulário para ver o resultado.</p>
        <?php endif; ?>
    </section>
</body>
</html>