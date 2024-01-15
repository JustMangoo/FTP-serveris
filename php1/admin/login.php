<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT kursi</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
    require("../connectDB.php");
?>

<div class="modal modalActive">
    <div class="apply">
        <h2>Ielogoties sistēmā</h2>
        <p class="kluda">
            <?php
                if(isset($_POST["ielogoties"])){
                    session_start();
                    $Lietotajvards = mysqli_real_escape_string($savienojums, $_POST["lietotajs"]);
                    $Parole = mysqli_real_escape_string($savienojums, $_POST["parole"]);

                    $lietotaja_atrasana_SQL = "SELECT * FROM kursi_lietotaji WHERE lietotajvards = '$Lietotajvards' AND statuss = 1";
                    $atrasanas_rezultats = mysqli_query($savienojums, $lietotaja_atrasana_SQL);

                    if(mysqli_num_rows($atrasanas_rezultats) == 1){
                        while($ieraksts = mysqli_fetch_assoc($atrasanas_rezultats)){
                            if(password_verify($Parole, $ieraksts["parole"])){
                                $_SESSION["lietotajvards_LYXQT"] = $ieraksts["lietotajvards"];
                                header("location:./");
                                
                            }else{
                                echo "Nepareizs lietotājs vai parole!";
                            }
                        }
                    }else{
                        echo "Nepareizs lietotājs vai parole!";
                    }
                }
            ?>
        </p>
        <form action="" method="post">
            <label>Lietotājvārds:</label>
            <input type="text" name="lietotajs" required>
            <label>Parole:</label>
            <input type="password" name="parole" required>
            <input type="submit" name="ielogoties" value="Ielogoties" class="btn">
        </form>
    </div>
</div>
</body>
</html>