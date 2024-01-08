<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $k_nosaukums = $_POST['nosaukums'];
        $k_apraksts = $_POST['apraksts'];
        $k_attels = $_POST['attels'];
        $k_statuss = $_POST['kurss-statuss'];
        
        $add_kurss_SQL = "INSERT INTO kursi(kursa_nosaukums, kursa_apraksts, kursa_attels, kursa_statuss)
         VALUES ('$k_nosaukums', '$k_apraksts', '$k_attels', '$k_statuss')";

        $add_kurss_result = mysqli_query($savienojums, $add_kurss_SQL);

        if(!$add_kurss_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Kurss pievienots!";
    }
?>