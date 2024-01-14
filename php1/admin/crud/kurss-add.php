<?php
    require('../../connectDB.php');
    session_start();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $k_nosaukums = $_POST['nosaukums'];
        $k_apraksts = $_POST['apraksts'];
        $k_attels = $_POST['attels'];
        $k_statuss = $_POST['kurss-statuss'];
        
        $add_kurss_SQL = "INSERT INTO kursi(kursa_nosaukums, kursa_apraksts, kursa_attels, kursa_statuss)
         VALUES ('$k_nosaukums', '$k_apraksts', '$k_attels', '$k_statuss')";

        $add_kurss_result = mysqli_query($savienojums, $add_kurss_SQL);

        #LOGING
        $id_SQL = "SELECT kursa_id FROM kursi ORDER BY kursa_id DESC LIMIT 1";
        $id_result = mysqli_query($savienojums, $id_SQL);
        while($row = mysqli_fetch_assoc($id_result)){
            $NewID = $row['kursa_id'];
        }

        $log_user = $_SESSION["lietotajvards_LYXQT"];
        $log_msg = "Pievienots kurss (ID:".$NewID.")";
        $logs_SQL = "INSERT INTO zurnalfaili(lietotajs, darbiba) VALUES ('$log_user', '$log_msg')";
        $logs_result = mysqli_query($savienojums, $logs_SQL);

        if(!$add_kurss_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Kurss pievienots!";
    }
?>