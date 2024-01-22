<?php
    require('../../connectDB.php');
    session_start();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $p_vards = encryptData($_POST['vards']);
        $p_uzvards = encryptData($_POST['uzvards']);
        $p_epasts = encryptData($_POST['epasts']);
        $p_talrunis = encryptData($_POST['talrunis']);
        $p_komentars = $_POST['komentars'];
        $p_kurss = $_POST['kurss'];
        $p_statuss = $_POST['statuss'];
        
        $add_pieteikums_SQL = "INSERT INTO kursu_pieteikumi(piet_vards, piet_uzvards, piet_epasts, piet_talrunis, piet_komentars, piet_kurss, piet_statuss) VALUES ('$p_vards', '$p_uzvards', '$p_epasts', '$p_talrunis','$p_komentars', '$p_kurss', '$p_statuss')";

        $add_pieteikums_result = mysqli_query($savienojums, $add_pieteikums_SQL);
        
        #LOGING
        $id_SQL = "SELECT piet_id FROM kursu_pieteikumi ORDER BY piet_id DESC LIMIT 1";
        $id_result = mysqli_query($savienojums, $id_SQL);
        while($row = mysqli_fetch_assoc($id_result)){
            $NewID = $row['piet_id'];
        }

        $log_user = $_SESSION["lietotajvards_LYXQT"];
        $log_msg = "Pievienots pieteikums (ID:".$NewID.")";
        $logs_SQL = "INSERT INTO zurnalfaili(lietotajs, darbiba) VALUES ('$log_user', '$log_msg')";
        $logs_result = mysqli_query($savienojums, $logs_SQL);

        if(!$add_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Pieteikums pievienots!";
    }
?>