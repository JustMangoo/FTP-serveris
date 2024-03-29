<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe apmaksa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/free/png-256/free-stripe-2-498440.png" type="image/x-icon">
</head>
<body>

    <?php
        require("../php1/connectDB.php");

        if(!empty($_GET['session_id'])){
            $session_id = $_GET['session_id'];
            require_once 'stripe-php/init.php';
            require_once 'config.php';

            try{
                $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
            }catch(Exception $e){
                $api_error = $e->getMessage();
            }

            if(empty($api_error) && $checkout_session){
                $customer_email = encryptData($checkout_session->customer_details->email);

                try{
                    $paymentIntent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
                }catch(\Stripe\Exception\ApiErrorException $e){
                    $api_error = $e->getMessage();
                }

                if(empty($api_error) && $paymentIntent){
                    if(!empty($paymentIntent) && $paymentIntent->status == "succeeded"){
                        $transactionID =  encryptData($paymentIntent->id);
                        $payment_status = encryptData($paymentIntent->status);
                        $password = "";
                        for($i = 0; $i < 5; $i++){
                            $password .= chr(rand(65, 90));
                            $password .= chr(rand(48, 57));
                        }

                        $password = password_hash($password, PASSWORD_DEFAULT);

                        //dati uz datubazi

                        $check_SQL = "SELECT * FROM stripe_lietotaji WHERE epasts = '$customer_email' AND statuss = 'succeeded' AND maksajuma_id = '$transactionID'";
                        $check_result = mysqli_query($savienojums, $check_SQL);
                
                        if(mysqli_num_rows($check_result) > 0 || mysqli_num_rows($check_result) < 0){
                            echo "Ieraksts jau pastāv";
                        }else{
                            $add_SQL = "INSERT INTO stripe_lietotaji(maksajuma_id, statuss, epasts, parole) VALUES ('$transactionID', '$payment_status', '$customer_email', '$password')";
                            $add_result = mysqli_query($savienojums, $add_SQL);
                
                            if(!$add_result){
                                die("Kļūda!".mysqli_error($savienojums));
                            }
                
                            echo "Lietotajs pievienots!";
                        }

                        //izvade

                        $statusMsg = "Maksājums veiksmīgi apstrādāts!";
                        $dataMsg = "
                            <p>Pieejas parole ir nosūtīta uz jūsu e-pastu!</p>
                            <p>Ja parole nav saņemta - sazinies ar mums pa tālruni: 29 999 999.</p>
                            <p>Maksājuma ID: <b>$transactionID</b></p>
                            <p>Maksājuma statuss: <b>$payment_status</b></p>
                            <p>E-pasts: <b>$customer_email</b></p>
                            <p>Parole: <b>$password</b></p>
                            <button class='stripe-button'>Atgriezties uz sākumlapu</button>
                        ";
                    }
                }else{
                    $statusMsg = "Nav iespējams iegūt maksājuma informāciju!";
                }
            }else{
                $statusMsg = "Neeksistējošs maksājums!";
            }

        }else{
            $statusMsg = "Neeksistējošs maksājums!";
            header("location: ./");
        }
    ?>
    <div class="container">
        <div class="panel">
            <h1><?php echo $statusMsg; ?></h1>
            <?php echo $dataMsg; ?>
        </div>
    </div>
</body>
</html>