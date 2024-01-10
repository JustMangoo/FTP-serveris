<?php
    require('../../connectDB.php');
    
    $select_lietotaji_SQL = "SELECT * FROM kursi_lietotaji ORDER BY lietotajs_id ASC";

    $select_lietotaji_result = mysqli_query($savienojums, $select_lietotaji_SQL);

    if(!$select_lietotaji_result){
        #die("Kļūda!".mysqli_error($savienojums));
    }

    while($row = mysqli_fetch_array($select_lietotaji_result)){
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

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>