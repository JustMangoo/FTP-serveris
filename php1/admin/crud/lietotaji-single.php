<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($savienojums, $_POST['id']);
        $select_lietotajs_SQL = "SELECT * FROM kursi_lietotaji WHERE lietotajs_id = $id";
        $select_lietotajs_result = mysqli_query($savienojums, $select_lietotajs_SQL);

        if(!$select_lietotajs_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        $json = array();
    
        while($row = mysqli_fetch_array($select_lietotajs_result)){
            $json[] = array(
                'lietotajvards' => $row['lietotajvards'],
                'vards' => $row['vards'],
                'uzvards' => $row['uzvards'],
                'epasts' => $row['epasts'],
                'loma' => $row['loma'],
                'reg_datums' => $row['reg_datums'],
                'id' => $row['lietotajs_id']
            );
        }

        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
?>