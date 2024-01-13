<?php
    session_start();
    if(!isset($_SESSION['lietotajvards_LYXQT'])){
        header("Refresh:0; url=login.php");
        exit();
    }

    $activeUsername = $_SESSION["lietotajvards_LYXQT"];
    $lietotajs_SQL = "SELECT loma FROM kursi_lietotaji WHERE lietotajvards = '$activeUsername'";

    if ($stmt = mysqli_prepare($savienojums, $lietotajs_SQL)) {
        mysqli_stmt_bind_param($stmt, "s", $activeUsername);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
                
        if ($row = mysqli_fetch_assoc($result)) {
            $userRole = $row["loma"];
        }
        mysqli_stmt_close($stmt);
    }

    $isAdmin = $userRole === 'admins';

?>
<div id="menu-btn" class="fas fa-bars"></div>

<header class="header">
    <a href="#" class="logo"> <i class="fa fa-puzzle-piece"></i> IT kursi </a>

    <nav class="navbar">
        <a href="index.php"> <i class="fas fa-home"></i>Sākums </a>
        <a href="pieteikumi.php"> <i class="fas fa-tasks"></i>Pieteikumi </a>
        <a href="kursi.php"> <i class="fas fa-database"></i>Kursi </a>
        <?php if ($isAdmin): ?>
            <a href="lietotaji.php"> <i class="fas fa-user"></i>Lietotāji </a>
            <a href="zurnalfaili.php"> <i class="fas fa-cogs"></i>Žurnālfaili</a>
        <?php endif; ?>
        <a href="profils.php"> <i class="fas fa-id-card"></i>Mans profils </a>
        <a href="logout.php"> <i class="fas fa-power-off"></i>Izlogoties </a>
        <a href="../" target="_blank"> <i class="fas fa-sign-out-alt"></i>Uz klientu lapu </a>
    </nav>

    <p class="credit"><span>IT kursi &copy; 2023</span><br>
        Visas tiesības aizsargātas
    </p>

</header>