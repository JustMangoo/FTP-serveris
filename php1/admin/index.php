<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT kursi | Administrēšana</title>
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
    <i class="fas fa-home"></i> Pieteikumi
    </div>
</div>

<div class="container">
    <div class="info-admin">

    <?php
        if (isset($_SESSION["lietotajvards_LYXQT"])) {
            $activeUsername = $_SESSION["lietotajvards_LYXQT"];

            $lietotajs_SQL = "SELECT loma FROM kursi_lietotaji WHERE lietotajvards = ?";
            
            if ($stmt = mysqli_prepare($savienojums, $lietotajs_SQL)) {
                mysqli_stmt_bind_param($stmt, "s", $activeUsername);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                if ($row = mysqli_fetch_assoc($result)) {
                    $userRole = $row["loma"];
                } else {
                    $userRole = "Nezināma loma";
                }
                mysqli_stmt_close($stmt);
            }

            echo "
            <div class='box'>
                <div class='info'>
                    <h3>Sveicināti, " . htmlspecialchars($activeUsername) . "!</h3>
                    <p>Tava loma: " . htmlspecialchars($userRole) . "</p>
                </div>
            </div>";
        } else {
            echo "
            <div class='box'>
                <div class='info'>
                    <h3>Nav aktīvu lietotāju</h3>
                </div>
            </div>";
        }

        /* Neapstiprinātie Pieteikumi */

        $totalNeapPiet = 0;

        $NeapPiet_SQL = "SELECT COUNT(*) as total FROM kursu_pieteikumi WHERE piet_statuss != 'Apstiprināts'";
        $result = mysqli_query($savienojums, $NeapPiet_SQL);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $totalNeapPiet = $row["total"];
        }

        /* Pieteikumi kopā */

        $totalPiet = 0;

        $pieteikumi_SQL = "SELECT COUNT(*) as total FROM kursu_pieteikumi";
        $result = mysqli_query($savienojums, $pieteikumi_SQL);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $totalPiet = $row["total"];
        }

        /* Aktīvie kursi */

        $totalCourses = 0;

        $kursi_SQL = "SELECT COUNT(*) as total FROM kursi";
        $result = mysqli_query($savienojums, $kursi_SQL);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $totalCourses = $row["total"];
        }
    ?>
        
        <div class="box">
            <i class="fas fa-edit"></i>
            <div class="info">
                <h3>
                    <?php echo htmlspecialchars($totalNeapPiet); ?>
                </h3>
                <p>Neapstiprināti pieteikumi</p>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-chalkboard-teacher"></i>
            <div class="info" id="piet-count">
                <h3>
                    <?php echo htmlspecialchars($totalPiet); ?>
                </h3>
                <p>Pieteikumi kopā</p>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-book"></i>
            <div class="info">
                <h3>
                    <?php echo htmlspecialchars($totalCourses); ?>
                </h3>
                <p>Aktīvās apmācības</p>
            </div>
        </div>

    </div>

    <div class="sakums-tables">

        <div class="jaunakie-piet">
        <h3>Jaunākie pieteikumi</h3>
            <table>
                <tr>
                    <th>Vārds, uzvārds</th>
                    <th>Apmācību kurss</th>
                    <th>Statuss</th>
                </tr>
                <tbody id="jaun-piet-table"></tbody>
            </table>
        </div>

        <div class="piepr-kursi">
        <h3>Pieprasītākie apmācību kursi</h3>
            <table>
                <tr>
                    <th>Kurss</th>
                    <th>Pieteikumi</th>
                </tr>
                <tbody id="piepr-kursi-table"></tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>