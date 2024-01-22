<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe apmaksa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>

    <?php 
        if(!empty($_GET['session_id'])) {
            $session_id = $_GET['session_id'];
            require_once 'stripe-php/init.php';
            require_once 'config.php';

            try {
                $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
            }catch(Exception $e){
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $checkout_session ) {
                $customer_email = $checkout_session->customer_details->email;
                echo $customer_email;

                try{
                    $paymentIntent = \Stripe\PaymentIntent::retrieve($checkout_session->$payment_intent);
                    ($checkout_session->$payment_intent);
                }catch(\Stripe\Exception\ApiErrorException $e) {
                    $api_error = $e->getMessage();
                }

                if(empty($api_error) && $paymentIntent){
                    if(!empty($paymentIntent) && $paymentIntent->status == "succeeded"){
                        $transactionID = $paymentIntent->id;
                        $payment_status = $paymentIntent->status;
                        //parole

                        $statusMsg = "Maksajums veiksmigi apstrādāts";
                        $dataMsg = "
                        <p>Maksajuma ID: <b>$transactionID</b></p>
                        <p>Maksajuma statuss: <b>$payment_status</b></p>
                        <p>E-pasts: <b>$customer_email</b></p>
                        <p>Parole: <b></b></p>
                        ";
                    }
                }else{
                    $statusMsg = "Nav iespejams iegut maksajuma informaciju!";
                }
            }else{
                $statusMsg = "Neeksistejoss maskajums";
                header("location: ./");
            }
        }
    ?>
    <div class="container">
        <div class="panel">
            <h1><?php echo $statusMsg; ?></h1>
        </div>
    </div>
</body>
</html>