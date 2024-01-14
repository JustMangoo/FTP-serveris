<?php
    require('../../connectDB.php');
    session_start();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $delete_lietotajs_SQL = "UPDATE kursi_lietotaji SET 
        statuss = '0'
        WHERE lietotajs_id = $id";
        $delete_lietotajs_result = mysqli_query($savienojums, $delete_lietotajs_SQL);

        #LOGING
        $log_user = $_SESSION["lietotajvards_LYXQT"];
        $log_msg = "Dzēsts lietotājs (ID:".$id.")";
        $logs_SQL = "INSERT INTO zurnalfaili(lietotajs, darbiba) VALUES ('$log_user', '$log_msg')";
        $logs_result = mysqli_query($savienojums, $logs_SQL);

        if(!$delete_lietotajs_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Veiksmīgi dzēsts!";
    }
?>