<?php
    require('../../connectDB.php');
    session_start();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $k_nosaukums = $_POST['nosaukums'];
        $k_apraksts = $_POST['apraksts'];
        $k_attels = $_POST['attels'];
        $k_statuss = $_POST['kurss-statuss'];
        
        $update_pieteikums_SQL = "UPDATE kursi SET 
        kursa_nosaukums = '$k_nosaukums',
        kursa_apraksts = '$k_apraksts',
        kursa_attels = '$k_attels',
        kursa_statuss = '$k_statuss' WHERE kursa_id = $id";
        $update_pieteikums_result = mysqli_query($savienojums, $update_pieteikums_SQL);

        #LOGING
        $log_user = $_SESSION["lietotajvards_LYXQT"];
        $log_msg = "Rediģēts kurss (ID:".$id.")";
        $logs_SQL = "INSERT INTO zurnalfaili(lietotajs, darbiba) VALUES ('$log_user', '$log_msg')";
        $logs_result = mysqli_query($savienojums, $logs_SQL);

        if(!$update_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Kurss rediģēts!";
    }
?>