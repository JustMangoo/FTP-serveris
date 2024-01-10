<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $delete_lietotajs_SQL = "DELETE FROM kursi_litotaji WHERE lietotajs_id = $id";
        $delete_lietotajs_result = mysqli_query($savienojums, $delete_pieteikums_SQL);

        if(!$delete_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Veiksmīgi dzēsts!";
    }
?>