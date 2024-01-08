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
        
        $update_pieteikums_SQL = "UPDATE kursu_pieteikumi SET 
        piet_vards = '$p_vards',
        piet_uzvards = '$p_uzvards',
        piet_epasts = '$p_epasts',
        piet_talrunis = '$p_talrunis',
        piet_komentars = '$p_komentars',
        piet_kurss = '$p_kurss',
        piet_statuss = '$p_statuss' WHERE piet_id = $id";
        $update_pieteikums_result = mysqli_query($savienojums, $update_pieteikums_SQL);

        if(!$update_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Pieteikums rediģēts!";
    }
?>