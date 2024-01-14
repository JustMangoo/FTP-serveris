<?php
    require('../../connectDB.php');
    session_start();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $l_lietotajvards = $_POST['lietotajvards'];
        $l_vards = $_POST['vards'];
        $l_uzvards = $_POST['uzvards'];
        $l_epasts = $_POST['epasts'];
        $l_loma = $_POST['loma'];
        $l_parole = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        
        $check_SQL = "SELECT * FROM kursi_lietotaji WHERE lietotajvards = '$l_lietotajvards' AND statuss = 1";
        $check_result = mysqli_query($savienojums, $check_SQL);

        if(mysqli_num_rows($check_result) > 0 || mysqli_num_rows($check_result) < 0){
            echo "Lietotajs jau pastāv";
        }else{
            $add_SQL = "INSERT INTO kursi_lietotaji(lietotajvards, vards, uzvards, epasts, parole, loma) VALUES ('$l_lietotajvards', '$l_vards', '$l_uzvards', '$l_epasts','$l_parole', '$l_loma')";
            $add_result = mysqli_query($savienojums, $add_SQL);

            #LOGING
            $id_SQL = "SELECT lietotajs_id FROM kursi_lietotaji ORDER BY lietotajs_id DESC LIMIT 1";
            $id_result = mysqli_query($savienojums, $id_SQL);
            while($row = mysqli_fetch_assoc($id_result)){
                $NewID = $row['lietotajs_id'];
            }

            $log_user = $_SESSION["lietotajvards_LYXQT"];
            $log_msg = "Pievienots lietotājs (ID:".$NewID.")";
            $logs_SQL = "INSERT INTO zurnalfaili(lietotajs, darbiba) VALUES ('$log_user', '$log_msg')";
            $logs_result = mysqli_query($savienojums, $logs_SQL);

            if(!$add_result){
                die("Kļūda!".mysqli_error($savienojums));
            }

            echo "Lietotajs pievienots!";
        }
    }
?>