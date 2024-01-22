<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT kursi</title>
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script> 

</head>
<body>
<?php
    require("connectDB.php");
?>
<div id="menu-btn" class="fas fa-bars"></div> <!-- šo vēlāk -->

<header class="header">
    <a href="#" class="logo"> <i class="fa fa-puzzle-piece"></i> IT kursi </a>

    <nav class="navbar">
        <a href="#"> <i class="fas fa-angle-right"></i>Sākums </a>
        <a href="#category"> <i class="fas fa-angle-right"></i>Kategorijas </a>
        <a href="#about"> <i class="fas fa-angle-right"></i>Par mums </a>
        <a href="#courses"> <i class="fas fa-angle-right"></i>Apmācības </a>
        <a href="#reviews"> <i class="fas fa-angle-right"></i>Atsauksmes </a>
        <a href="#contact"> <i class="fas fa-angle-right"></i>Kontakti </a>
    </nav>

    <p class="credit"><span>IT kursi &copy; 2023</span><br>
        Visas tiesības aizsargātas
    </p>

</header>

<section class="information" id="home">

    <div class="image">
        <img src="images/main_img.png">
    </div>

    <div class="content">
        <h3>Iegūsti kvalitatīvu apmācību pie mums!</h3>
        <p>Piesakies tiešsaistes apmācību kursiem mūsu mācību centrā un iegūsti jaunu pieredzi. Atrodi īsto kursu, aizpildi pieteikuma anketu un mēs sazināsimies ar Tevi, lai vienotos par kursu uzsākšanas laiku.</p>
        <p><span>Apskati piedāvātos kursus jau tagad!</span></p>
        <a href="#courses" class="btn">Mūsu kursi</a>
    </div>

</section>

<section class="info-container">

    <div class="box">
        <i class="fas fa-user-graduate"></i>
        <div class="info">
            <h3>300 +</h3>
            <p>izglītojamie</p>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-laptop-code"></i>
        <div class="info">
            <h3>30 +</h3>
            <p>kursi</p>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-chalkboard-teacher"></i>
        <div class="info">
            <h3>15 +</h3>
            <p>lektoru / ekspertu</p>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-book"></i>
        <div class="info">
            <h3>6</h3>
            <p>kategorijas</p>
        </div>
    </div>

</section>

<section class="category" id="category">

    <div class="heading">
        <h3>Piedāvātās kategorijas</h3>
    </div>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-code"></i>
            <h3>Programmēšana</h3>
        </div>

        <div class="box">
            <i class="fas fa-paint-brush"></i>
            <h3>Grafiskais dizains</h3>
        </div>

        <div class="box">
            <i class="fas fa-chart-bar"></i>
            <h3>Projektu pārvaldība</h3>
        </div>

        <div class="box">
            <i class="fas fa-music"></i>
            <h3>Audio & video montāža</h3>
        </div>

        <div class="box">
            <i class="fas fa-robot"></i>
            <h3>Mākslīgais intelekts</h3>
        </div>

    </div>

</section>

<section class="information" id="about">
    <div class="content">
        <span>Par mums</span>
        <h3>IT kursi - kvalitatīvas apmācības</h3>
        <p>"IT kursi" ir projekts, kurš aizsācies 2020.gadā, kad Covid-19 pandēmija lika cilvēku ikdienai būtiski mainīties pārejot uz attālinātu dzīvi. Platformas mērķis ir sniegt nākotnes iespējas jauniešiem un pieaugušajiem, piedāvājot daudzveidīgas programmas, kas nodrošina plašāku piekļuvi tehnoloģiju prasmēm un iespējām.</p>
    </div>

    <div class="image">
        <img src="images/about.png" alt="">
    </div>

</section>

<section class="courses" id="courses">

    <div class="heading">
        <span>Apmācības</span>
        <h3>Šobrīd piedāvājam sekojošus kursus:</h3>
    </div>

    <div class="box-container">
        <?php
            $visi_kursi_SQL = "SELECT * FROM kursi WHERE kursa_statuss = 1";
            $kursa_atlase = mysqli_query($savienojums, $visi_kursi_SQL);

            while($kurss = mysqli_fetch_assoc($kursa_atlase)){
                echo "
                <div class='box'>
                    <div class='image'>
                        <img src='{$kurss['kursa_attels']}'>
                        <h3>{$kurss['kursa_nosaukums']}  {$kurss['kursa_statuss']}</h3>
                    </div>
                    <div class='content'>
                        <h3>{$kurss['kursa_nosaukums']}</h3>
                        <p>{$kurss['kursa_apraksts']}</p>
                        <button name='pieteikties' class='btn btnApply' value='{$kurss['kursa_id']}'>Pieteikties</button>
                    </div>
                </div>
                ";
            }
        ?>

    </div>

</section>

<section class="reviews" id="reviews">

    <div class="heading">
        <span>Atsauksmes</span>
        <h3>Ko saka izglītojamie?</h3>
    </div>

    <div class="box-container">

        <div class="box">
            <img src="images/review_1.png" alt="">
            <h3>Jānis Bērziņš</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos repellat sunt a temporibus suscipit distinctio maiores iste tenetur voluptate nostrum.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>

        <div class="box">
            <img src="images/review_2.png" alt="">
            <h3>Ieva Kļaviņa</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos repellat sunt a temporibus suscipit distinctio maiores iste tenetur voluptate nostrum.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>

        <div class="box">
            <img src="images/review_3.png" alt="">
            <h3>Anna Ozoliņa</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos repellat sunt a temporibus suscipit distinctio maiores iste tenetur voluptate nostrum.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

    </div>

</section>

<section class="contact" id="contact">

    <div class="heading">
        <span>Kontakti</span>
        <h3>Sazinies ar mums!</h3>
    </div>

    <div class="row">

        <div class="contact-info-container">

            <div class="box">
                <i class="fas fa-phone"></i>
                <div class="info">
                    <h3>Tālrunis:</h3>
                    <p>+371 2999 9999</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <div class="info">
                    <h3>E-pasts:</h3>
                    <p>info@it-kursi.lv</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-map"></i>
                <div class="info">
                    <h3>Adrese:</h3>
                    <p>Ventspils iela 51, Liepāja, Latvija</p>
                </div>
            </div>

            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
        </div>

        <form action="" method="post">
            <div class="inputBox">
                <input type="text" name="vards" placeholder="Vārds" required>
                <input type="email" name="epasts" placeholder="E-pasts" required>
            </div>
            <div class="inputBox">
                <input type="tel" name="talrunis" pattern="[0-9]{8}" placeholder="Tālrunis" required>
                <input type="text" name="temats" placeholder="Jūsu ziņojuma temats" required>
            </div>
            <textarea name="zina" placeholder="Jūsu ziņojums..."></textarea>
            <input type="submit" name="nosutit" value="Nosūtīt ziņu" class="btn">
        
            <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            if(isset($_POST["nosutit"])){
                try {
                    $mail->CharSet = "UTF-8";
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP(); //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;  //Enable SMTP authentication
                    $mail->Username   = 'lvt.4pt@gmail.com'; //SMTP username
                    $mail->Password   = 'npdw kusw hump ooct'; //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('lvt.4pt@gmail.com', 'LVT 4PT grupa');
                    $mail->addAddress('lvt.4pt@gmail.com', 'LVT 4PT grupa');

                    //Content
                    $mail->isHTML(true); //Set email format to HTML
                    $mail->Subject = 'Jauna ziņa no IT kursu mājaslapas';
                    $mail->Body    = '<b>Ziņas sūtītāja e-pasts</b>: '.$_POST["epasts"].'<br>
                                        <b>Ziņas sūtītāja vārds</b>: '.$_POST["vards"].'<br>
                                        <b>Ziņas sūtītāja tālrunis</b>: '.$_POST["talrunis"].'<br>
                                        <b>Ziņas sūtītāja temats</b>: '.$_POST["temats"].'<br>
                                        <b>Ziņojums</b>: '.$_POST["zina"].'<br>';
                
                    $mail->send();
                    echo "<div id='pazinojums'>
                        <p>
                            Ziņa nosūtīta! Sazināsimies ar Jums pavisam drīz!
                            <a onclick='closee()'><i class='fas fa-times'></i></a>
                        </p>
                    </div>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            ?>
        </form>
    </div>
</section>

<div class="modal">
    <div class="apply">
        <div class="close_modal"><i class="fas fa-times"></i></div>
        <h2>Pieteikšanās kursam</h2>
        <form action="" method="post">
            <label>Vārds <span>*</span>:</label>
            <input type="text" name="vards" required>
            <label>Uzvārds <span>*</span>:</label>
            <input type="text" name="uzvards" required>
            <label>E-pasta adrese <span>*</span>:</label>
            <input type="email" name="epasts" required>
            <label>Tālrunis <span>*</span>:</label>
            <input type="tel" pattern="[0-9]{8}" name="talrunis" required>
            <label>Komentāri:</label>
            <input type="text" name="komentari">
            <input type="hidden" name="kursaID">
            <input type="submit" name="pieteikties" value="Pieteikties" class="btn">
        </form>
    </div>
</div>


<?php
    if(isset($_POST["pieteikties"])){
        $vards_ievade = mysqli_real_escape_string($savienojums, encryptData($_POST['vards']));
        $uzvards_ievade = mysqli_real_escape_string($savienojums,encryptData( $_POST['uzvards']));
        $epasts_ievade = mysqli_real_escape_string($savienojums, encryptData($_POST['epasts']));
        $talrunis_ievade = mysqli_real_escape_string($savienojums, encryptData($_POST['talrunis']));
        $komentari_ievade = mysqli_real_escape_string($savienojums, $_POST['komentari']);
        $kursaID = mysqli_real_escape_string($savienojums, $_POST['kursaID']);

        if(
            !empty($vards_ievade) &&
            !empty($uzvards_ievade) &&
            !empty($epasts_ievade) &&
            !empty($talrunis_ievade) &&
            !empty($kursaID)
        ){
            $pievienot_SQL = "INSERT INTO kursu_pieteikumi(piet_vards, piet_uzvards, piet_epasts, piet_talrunis, piet_komentars, piet_kurss) VALUES ('$vards_ievade', '$uzvards_ievade','$epasts_ievade', '$talrunis_ievade', '$komentari_ievade', '$kursaID')";

            if(mysqli_query($savienojums, $pievienot_SQL)){
                echo "<div id='pazinojums'>
                        <p>
                            Reģistrācija ir noritējusi veiksmīgi! Sazināsimies ar Jums pavisam drīz!
                            <a onclick='closee()'><i class='fas fa-times'></i></a>
                        </p>
                    </div>";
            }else{
                echo "<div id='pazinojums'>
                        <p>
                            Reģistrācija nav izdevusies! Sazinieties ar mums, lai informētu par problēmu!
                            <a onclick='closee()'><i class='fas fa-times'></i></a>
                        </p>
                    </div>";
            }
        }else{
            echo "<div id='pazinojums'>
                        <p>
                            Reģistrācija nav izdevusies! Kāds no ievades laukiem aizpildīts nekorekti!
                            <a onclick='closee()'><i class='fas fa-times'></i></a>
                        </p>
                    </div>";
        }
    }
?>
</body>
</html>