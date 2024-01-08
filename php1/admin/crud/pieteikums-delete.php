<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $delete_pieteikums_SQL = "DELETE FROM kursu_pieteikumi WHERE piet_id = $id";
        $delete_pieteikums_result = mysqli_query($savienojums, $delete_pieteikums_SQL);

        if(!$delete_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        echo "Veiksmīgi dzēsts!";
    }
?>