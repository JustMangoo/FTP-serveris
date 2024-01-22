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
    <div class="container">
        <div class="left-panel">
            <h1>Ielogoties sistēmā</h1>
            <form action="" method="post">
                <label>E-pasts:</label>
                <input type="email" placeholder="Ievadi savu e-pasta adresi">
                <label>Parole:</label>
                <input type="password" placeholder="Ievadi savu paroli">
                <button type="submit">Ielogoties</button>
            </form>
        </div>
        <div class="right-panel">
            <h1>Iegūt pieeju</h1>
            <p>Sistēma piejama tikai reģistrētiem lietotājiem kri iegādājušies šo pakalpjumu. Lai iegūtu pieeju,
                nospiediet uz zemāk redzemās pogas un veiciet apmaksu, pēc kuras veikšanas saņēmsjer pieejas paroli</p>
            <p>Cena: <b>9.99 EUR</b></p>
            <form action="checkout.php" method="post">
                <button class="stripe-button">Iegādāties pieeju</button>
            </form>
        </div>
    </div>
</body>
</html>