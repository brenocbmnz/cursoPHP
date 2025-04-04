<!DOCTYPE html>
<html lang="pt-br">
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
        // Função para obter a cotação atual do dólar
        function getCotacaoDolar() {
            $dataAtual = date('m-d-Y');
            
            // Usando aspas simples para evitar interpretação das variáveis na URL
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaDia(moeda=@moeda,dataCotacao=@dataCotacao)?@moeda=\'USD\'&@dataCotacao=\'' . $dataAtual . '\'&\$top=100&\$format=json';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $response = curl_exec($ch);
            
            if(curl_errno($ch)) {
                return false;
            }
            
            curl_close($ch);
            
            $data = json_decode($response, true);
            
            if(isset($data['value'][0])) {
                return $data['value'][0]['cotacaoVenda'];
            } else {
                // Se não encontrar para hoje, tenta o último dia útil
                return getUltimaCotacaoDisponivel();
            }
        }
        
        function getUltimaCotacaoDisponivel() {
            $dataInicial = date('m-d-Y', strtotime('-7 days'));
            $dataFinal = date('m-d-Y');
            
            // Usando aspas simples para evitar interpretação das variáveis na URL
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaPeriodo(moeda=@moeda,dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@moeda=\'USD\'&@dataInicial=\'' . $dataInicial . '\'&@dataFinalCotacao=\'' . $dataFinal . '\'&\$top=1&\$orderby=dataHoraCotacao%20desc&\$format=json';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $response = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($response, true);
            
            if(isset($data['value'][0])) {
                return $data['value'][0]['cotacaoVenda'];
            } else {
                return false;
            }
        }
        
        // Obter o valor enviado pelo formulário
        $numero = $_GET['numero'] ?? 0;
        $numero = floatval(str_replace(',', '.', $numero));
        
        // Obter cotação do dólar
        $cotacaoDolar = getCotacaoDolar();
        
        if($cotacaoDolar === false) {
            echo "<p>Não foi possível obter a cotação atual do dólar. Usando valor fixo de R$ 5,25 como fallback.</p>";
            $cotacaoDolar = 5.25;
        } else {
            echo "<p>Cotação do dólar atual: R$ " . number_format($cotacaoDolar, 2, ',', '.') . "</p>";
        }
        
        // Calcular conversão
        $dolar = $numero / $cotacaoDolar;
        $dolarFormatado = number_format($dolar, 2, ',', '.');
        $numeroFormatado = number_format($numero, 2, ',', '.');
        
        echo "<p>Seus R$ <strong>$numeroFormatado</strong> equivalem a <strong>US$ $dolarFormatado</strong>!</p>";
        ?>
        <p><a href="javascript:history.go(-1)">Voltar para a página inicial</a></p>
    </main>
</body>
</html>