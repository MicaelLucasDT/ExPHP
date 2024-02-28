<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Converter moeda</h1>
    </header>
    <section>
        <main>
            <?php 
            $inicio = date("m-d-Y", strtotime("-7 days"));
            $fim = date("m-d-Y");
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

            $dados = json_decode(file_get_contents($url), true);
            $cotação = $dados["value"][0]["cotacaoCompra"];
            
            $padrão = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
            $converter = $_REQUEST["numero"];
            $resultado = $converter / $cotação;
            echo "A cotação atual do dolar é: " . numfmt_format_currency($padrão, $cotação, "USD") . "<br>Você inseriu " . numfmt_format_currency($padrão, $converter, "BRL") . "<br>Equivale á: " . numfmt_format_currency($padrão, $resultado, "USD")
            ?>
        </main>
        <p>Dados retirados do <a href="https://www.bcb.gov.br" target="_blank">BCB</a>.</p>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </section>
    
</body>
</html>