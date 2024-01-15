<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT kursi | Mans profils</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js" defer></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <script src="admin-script.js" defer></script>

</head>
<body>
<?php
    session_start();
    require("../connectDB.php");
    require("navigation.php");
?>

<div class="title">
    <div class="name">
    <i class="fas fa-id-card"></i> Mans profils
    </div>
</div>

<div class="container">
    <div class="info-profile">
        <div class="profile-image">
            <i class="fas fa-user"></i>
        </div>
    
    <?php
        if (isset($_SESSION["lietotajvards_LYXQT"])) {
            $activeUsername = $_SESSION["lietotajvards_LYXQT"];

            $lietotajs_SQL = "SELECT * FROM kursi_lietotaji WHERE lietotajvards = ? AND statuss = 1";
            
            if ($stmt = mysqli_prepare($savienojums, $lietotajs_SQL)) {
                mysqli_stmt_bind_param($stmt, "s", $activeUsername);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                if ($row = mysqli_fetch_assoc($result)) {
                    $name = $row["vards"];
                    $surname = $row["uzvards"];
                    $email = $row["epasts"];
                    $regDate = $row["reg_datums"];
                    $userRole = $row["loma"];
                    $userID = $row["lietotajs_id"];
                } else {
                    $userRole = "Nezināms";
                    $name = "Nezināms";
                    $surname = "Nezināms";
                    $email = "Nezināms";
                    $regDate = "Nezināms";
                    $userRole = "Nezināms";
                    $userID = "Nezināms";
                }
                mysqli_stmt_close($stmt);
            }

            echo "
            <div class='box'>
                <div class='info'>
                    <h2 >" . htmlspecialchars($name) ." ". htmlspecialchars($surname)  . "</h2>
                    <h3 class='sub-head'>" . htmlspecialchars($activeUsername) . "</h3>
                    <p><b>E-pasts:</b> " . htmlspecialchars($email) . "</p>
                    <p><b>Reģistrācijas datums:</b> " . htmlspecialchars($regDate) . "</p>
                    <p style='padding-bottom: 4rem;'><b>Loma:</b> " . htmlspecialchars($userRole) . "</p>
            
                    <h3>Mainīt paroli</h3>
                    <p class='kluda'></p>
                    <form id='lietotajaParole' class='apply'>
                        <div class='formElements'>

                            
                            <label for='password'>Vecā parole</label>
                            <input type='password' id='password' autocomplete='current-password' name='password' required>
                            <label for='password'>Jaunā parole</label>
                            <input type='password' id='newpasswordone' autocomplete='new-password' name='new-password' required>
                            <label for='password'>Atkārtot jauno paroli</label>
                            <input type='password' id='newpasswordtwo' autocomplete='new-password' name='new-password' required>
                            
                            <input type='' id='lietotajsID' value='$userID' hidden>
                        </div>
                        <input type='submit' name='pieteikties' value='Apstiprināt' class='btn'>
                    </form>
                </div>
            </div>
            ";
        } else {
            echo "
            <div class='box'>
                <div class='info'>
                    <h3>Nav aktīvu lietotāju</h3>
                </div>
            </div>";
        }
    ?>
        
    </div>
    
</div>

</body>
</html>