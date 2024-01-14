<?php
    require('../../connectDB.php');
    session_start();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $delete_pieteikums_SQL = "DELETE FROM kursu_pieteikumi WHERE piet_id = $id";
        $delete_pieteikums_result = mysqli_query($savienojums, $delete_pieteikums_SQL);

        #LOGING
        $log_user = $_SESSION["lietotajvards_LYXQT"];
        $log_msg = "Dzēsts pieteikums (ID:".$id.")";
        $logs_SQL = "INSERT INTO zurnalfaili(lietotajs, darbiba) VALUES ('$log_user', '$log_msg')";
        $logs_result = mysqli_query($savienojums, $logs_SQL);

        if(!$delete_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Veiksmīgi dzēsts!";
    }
?>