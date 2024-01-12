<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $l_lietotajvards = $_POST['lietotajvards'];
        $l_vards = $_POST['vards'];
        $l_uzvards = $_POST['uzvards'];
        $l_epasts = $_POST['epasts'];
        $l_loma = $_POST['loma'];
        $l_parole = password_hash($_POST['parole'], PASSWORD_DEFAULT);
        
        
        $add_lietotajs_SQL = "INSERT INTO kursi_lietotaji(lietotajvards, vards, uzvards, epasts, parole, loma) VALUES ('$l_lietotajvards', '$l_vards', '$l_uzvards', '$l_epasts','$l_parole', '$l_loma')";

        $add_lietotajs_result = mysqli_query($savienojums, $add_lietotajs_SQL);

        if(!$add_lietotajs_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Lietotajs pievienots!";
    }
?>