<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $p_vards = $_POST['vards'];
        $p_uzvards = $_POST['uzvards'];
        $p_epasts = $_POST['epasts'];
        $p_talrunis = $_POST['talrunis'];
        $p_komentars = $_POST['komentars'];
        $p_kurss = $_POST['kurss'];
        $p_statuss = $_POST['statuss'];
        
        $add_pieteikums_SQL = "INSERT INTO kursu_pieteikumi(piet_vards, piet_uzvards, piet_epasts, piet_talrunis, piet_komentars, piet_kurss, piet_statuss) VALUES ('$p_vards', '$p_uzvards', '$p_epasts', '$p_talrunis','$p_komentars', '$p_kurss', '$p_statuss')";

        $add_pieteikums_result = mysqli_query($savienojums, $add_pieteikums_SQL);

        if(!$add_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Pieteikums pievienots!";
    }
?>