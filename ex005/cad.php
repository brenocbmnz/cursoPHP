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
        $numero = $_GET['numero'] ?? 'numero desconhecido';
        $dolar = $numero / 5.25;
        $dolar = number_format($dolar, 2, '.', '');
        echo "<p>Seu dinheiro em real equivale a <strong>$dolar</strong> em dólar!";
        ?>
        <p>
            <p><a href="javascript:history.go(-1)">Voltar para a página inicial</a></p>
        </p>
    </main>
    
</body>
</html>