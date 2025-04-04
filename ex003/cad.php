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
        $ant = $numero - 1;
        $suc = $numero + 1;
        echo "<p>Seu número é <strong>$numero</strong>!";
        echo "<p>O número antecessor é <strong>$ant</strong>!";
        echo "<p>O número sucessor é <strong>$suc</strong>!";
        ?>
        <p>
            <p><a href="javascript:history.go(-1)">Voltar para a página inicial</a></p>
        </p>
    </main>
    
</body>
</html>