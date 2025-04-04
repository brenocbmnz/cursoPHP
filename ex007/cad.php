<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado do Processamento</h1>
    </header>
    <main>
        <?php 
            $numero = $_REQUEST["numero"] ?? 0;
            
            $numeroFloat = str_replace(',', '.', $numero);
            $parteInteira = (int)$numeroFloat;
            $parteFracionaria = $numeroFloat - $parteInteira;
            
            $parteFracionariaFormatada = $parteFracionaria != 0 
                ? ',' . substr(number_format($parteFracionaria, 3, '.', ''), 2, 3) 
                : '';

            echo "<p>Número inteiro: $parteInteira</p>";
            echo "<p>Parte fracionária: $parteFracionariaFormatada</p>";
        ?>
        <p><a href="javascript:history.go(-1)">Voltar para a página inicial</a></p>
    </main>
    
</body>
</html>