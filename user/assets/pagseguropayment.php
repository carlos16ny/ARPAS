<?php

$data['currency'] = 'BRL'; 
$data['token'] = '26CF138C5142403BA31DB986AA5FB9BB';
$data['email'] =  'carloshpa.mg4@me.com'; 
$data['itemId1'] = '01'; 
$data['itemQuantity1'] = '01'; 
$data['itemAmount1'] = '30.00'; 
$data['itemDescription1'] = 'Diária de Quarto';
$data['acceptPaymentMethodName'] = 'VISA';

$data = urldecode(http_build_query($data));

// var_dump($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

$curl = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml = curl_exec($curl);
curl_close($curl);
$xml = simplexml_load_string($xml);

echo $xml->code;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<script type="text/javascript"
    src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
</script>

<script>

 var code = <?=json_encode($xml->code)?>;
    
    PagSeguroLightbox(
        {
	        code: code[0]
	    },
        {
            success : function(transactionCode) {
                alert("success - " + transactionCode);
        },
            abort : function() {
                alert("abort");
            }
        }
    );
</script>
    
</body>
</html>
