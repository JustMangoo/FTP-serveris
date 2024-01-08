<?php
    require('../../connectDB.php');

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

        if(!$update_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Kurss rediģēts!";
    }
?>