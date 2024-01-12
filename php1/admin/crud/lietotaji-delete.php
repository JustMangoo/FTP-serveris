<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $delete_lietotajs_SQL = "UPDATE kursi_lietotaji SET 
        statuss = '0'
         WHERE lietotajs_id = $id";
        $delete_lietotajs_result = mysqli_query($savienojums, $delete_lietotajs_SQL);

        if(!$delete_lietotajs_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Veiksmīgi dzēsts!";
    }
?>