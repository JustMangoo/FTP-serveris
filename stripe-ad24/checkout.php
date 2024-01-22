<?php 
    require_once 'stripe-php/init.php';
    require_once 'config.php';

    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment", 
        "success_url" => "https://kristovskis.lv/4pt/daugats/stripe-ad24/success.php?session_id={CHECKOUT_SESSION_ID}",
        "cancel_url" => "https://kristovskis.lv/4pt/daugats/stripe-ad24/",
        "locale" => "auto",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "eur",
                    "unit_amount" => 999,
                    "product_data" => [
                        "name" => "Pieeja mājaslapai"
                    ] 
                ]
            ]
        ]
    ]);

    header("Location: ".$checkout_session->url);
?>