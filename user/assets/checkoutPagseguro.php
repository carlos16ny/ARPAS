<?php
require_once '../../vendor/autoload.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagamento</title>
</head>
<body>

<script type="text/javascript"
src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
</script>

<script>

// function sendPagSeguro(){
//     $.post('pagseguropayment.php', '', function(data){
//         alert(data);
//     });
// }

// PagSeguroLightbox({
// 	code: 
// 	}, {
// 	success : function(transactionCode) {
// 		alert("success - " + transactionCode);
// 	},
// 	abort : function() {
// 		alert("abort");
// 	}
// });

</script>
    
</body>
</html>

<?php


try {
    \PagSeguro\Library::initialize();
} catch (Exception $e) {
    die($e->getMessage());
}
\PagSeguro\Library::cmsVersion()->setName($cmsVersion)->setRelease($cmsRelease);
\PagSeguro\Library::moduleVersion()->setName($moduleVersion)->setRelease($moduleRelease);

$environment = 'production';

\PagSeguro\Configuration\Configure::setEnvironment($environment);//production or sandbox

$accountEmail = 'carloshpa.mg4@me.com';
$accountToken = 'FF7F18A1CFB340BC8AE2EEEF7972C053';

\PagSeguro\Configuration\Configure::setAccountCredentials(
    $accountEmail,
    $accountToken
);

\PagSeguro\Configuration\Configure::setCharset('UTF-8');

\PagSeguro\Configuration\Configure::setLog(true, $logPath);

try {
    $response = \PagSeguro\Services\Session::create(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
    echo $response->getResult();

} catch (Exception $e) {
    die($e->getMessage());
}

$credential = new \PagSeguro\Domains\AccountCredentials(
    'carloshpa.mg4@me.com',
    $accountToken
);


// $payment = new \PagSeguro\Domains\Requests\Payment();

// $payment->setSender()->setName($senderName);
// $payment->setSender()->setEmail($credential->getEmail);

// $item = new \PagSeguro\Domains\Item();
// $item->setAmount(29.90);
// $item->setDescription('Diária de Hospedagem');
// $item->setId('02');
// $item->setQuantity('001');
// $item->setWeight(0.0);
// $item->setShippingCost(0.0);

// $items = [$item];

// $payment->setCurrency('BRL');
// $payment->setItems($items);

// $payment->setRedirectUrl($redirectUrl);
// $payment->setNotificationUrl($notificationUrl);

// // $payment->addParameter()->withParameters('itemId', '0003')->index(3);
// // $payment->addParameter()->withParameters('itemDescription', 'Notebook Amarelo')->index(3);
// // $payment->addParameter()->withParameters('itemQuantity', '1')->index(3);
// // $payment->addParameter()->withParameters('itemAmount', '200.00')->index(3);

// $payment->acceptPaymentMethod()->groups(
//     \PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD
// );

// var_dump($payment->register($credential, true));

// try {
//     $response = $payment->register(
//         $credential
//     );
//     var_dump($response);

// } catch (Exception $e) {
//     die($e->getMessage());
// }

?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" 
    src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
</script>
<script>

    var id = <?php echo json_encode($response->getResult())?>

    PagSeguroDirectPayment.setSessionId(id);
    PagSeguroDirectPayment.onSenderHashReady(function(response){
        if(response.status == 'error') {
            console.log(response.message);
            return false;
        }
        var hash = response.senderHash; //Hash estará disponível nesta variável.
        
    });
    PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(response) {
            console.log(response);
        },
        error: function(response) {
            //tratamento do erro
        },
        complete: function(response) {
            //tratamento comum para todas chamadas
        }
    });
</script>

<?php if (\PagSeguro\Configuration\Configure::getEnvironment()->getEnvironment() == "sandbox") {
    ?>
        <!--Para integração em ambiente de testes no Sandbox use este link-->
        <script type="text/javascript"
                src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
        </script>
<?php
} else {
?>
        <!--Para integração em ambiente de produção use este link-->
        <script type="text/javascript"
                src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
        </script>
<?php
} ?>
</head>
<body>
<!-- A irá exibir o modal para pagamento -->
<script>PagSeguroLightbox(<?= $response->getCode() ?>);</script>
</body>
</html>