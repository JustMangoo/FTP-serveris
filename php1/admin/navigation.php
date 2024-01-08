<?php
    session_start();
    if(!isset($_SESSION['lietotajvards_LYXQT'])){
        header("Refresh:0; url=login.php");
        exit();
    }
?>
<div id="menu-btn" class="fas fa-bars"></div>

<header class="header">
    <a href="#" class="logo"> <i class="fa fa-puzzle-piece"></i> IT kursi </a>

    <nav class="navbar">
        <a href="index.php"> <i class="fas fa-home"></i>Sākums </a>
        <a href="pieteikumi.php"> <i class="fas fa-tasks"></i>Pieteikumi </a>
        <a href="kursi.php"> <i class="fas fa-database"></i>Kursi </a>
        <a href="lietotaji.php"> <i class="fas fa-user"></i>Lietotāji </a>
        <a href="zurnalfaili.php"> <i class="fas fa-cogs"></i>Žurnālfaili</a>
        <a href="profils.php"> <i class="fas fa-id-card"></i>Mans profils </a>
        <a href="logout.php"> <i class="fas fa-power-off"></i>Izlogoties </a>
        <a href="../" target="_blank"> <i class="fas fa-sign-out-alt"></i>Uz klientu lapu </a>
    </nav>

    <p class="credit"><span>IT kursi &copy; 2023</span><br>
        Visas tiesības aizsargātas
    </p>

</header>