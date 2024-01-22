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

        $id_SQL = "SELECT piet_statuss FROM kursu_pieteikumi WHERE piet_id = $id";
        $id_result = mysqli_query($savienojums, $id_SQL);
        while($row = mysqli_fetch_assoc($id_result)){
            $oldStatus = $row['piet_statuss'];
        }
        
        $update_pieteikums_SQL = "UPDATE kursu_pieteikumi SET 
        piet_vards = '$p_vards',
        piet_uzvards = '$p_uzvards',
        piet_epasts = '$p_epasts',
        piet_talrunis = '$p_talrunis',
        piet_komentars = '$p_komentars',
        piet_kurss = '$p_kurss',
        piet_statuss = '$p_statuss' WHERE piet_id = $id";
        $update_pieteikums_result = mysqli_query($savienojums, $update_pieteikums_SQL);

        #LOGING
        if($oldStatus === $p_statuss){
            $log_msg = "Rediģēts pieteikums (ID:".$id.")";
        }else{
            $log_msg = "Rediģēts pieteikums (ID:".$id.") Statuss mainīts uz &#34;$p_statuss&#34;";
        }

        $log_user = $_SESSION["lietotajvards_LYXQT"];
        $logs_SQL = "INSERT INTO zurnalfaili(lietotajs, darbiba) VALUES ('$log_user', '$log_msg')";
        $logs_result = mysqli_query($savienojums, $logs_SQL);

        if(!$update_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Pieteikums rediģēts!";
    }
?>