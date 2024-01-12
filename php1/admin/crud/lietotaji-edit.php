<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $l_lietotajvards = $_POST['lietotajvards'];
        $l_vards = $_POST['vards'];
        $l_uzvards = $_POST['uzvards'];
        $l_epasts = $_POST['epasts'];
        $l_loma = $_POST['loma'];
        
        $update_lietotajs_SQL = "UPDATE kursi_lietotaji SET 
        lietotajvards = '$l_lietotajvards',
        vards = '$l_vards',
        uzvards = '$l_uzvards',
        epasts = '$l_epasts',
        loma = '$l_loma'";

        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $update_lietotajs_SQL .= ", password = '$hashedPassword'";
        }

        $update_lietotajs_SQL .= " WHERE lietotajs_id = $id";
        $update_lietotajs_result = mysqli_query($savienojums, $update_lietotajs_SQL);

        if(!$update_lietotajs_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Lietotajs rediģēts!";
    }
?>