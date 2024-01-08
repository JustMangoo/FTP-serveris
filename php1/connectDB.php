<?php
    $servera_vards = "localhost";
    $lietotajvards = "grobina1_daugats";
    $parole = "jx6!Gb9Ke";
    $db_nosaukums = "grobina1_daugats";

    $savienojums = mysqli_connect($servera_vards, $lietotajvards, $parole, $db_nosaukums);

    /*
    if(!$savienojums){
        die("Pieslēgties neizdevās: ".mysqli_connect_error());
    }else{
        echo "Savienojums izveidots!";
    }
    */
?>