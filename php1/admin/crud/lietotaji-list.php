<?php
    require('../../connectDB.php');
    
    $select_pieteikumi_SQL = "SELECT * FROM kursi_lietotaji ORDER BY lietotajs_id DESC";

    /* "SELECT kursu_pieteikumi.*, kursi.nosaukums AS kursa_nosaukums 
                          FROM kursu_pieteikumi
                          LEFT JOIN kursi ON kursu_pieteikumi.piet_kurss = kursi.id
                          ORDER BY piet_id DESC"; */
    $select_pieteikumi_result = mysqli_query($savienojums, $select_pieteikumi_SQL);

    if(!$select_pieteikumi_result){
        #die("Kļūda!".mysqli_error($savienojums));
    }

    while($row = mysqli_fetch_array($select_pieteikumi_result)){
        $json[] = array(
            'lietotajvards' => $row['lietotajvards'],
            'vards' => $row['vards'],
            'uzvards' => $row['uzvards'],
            'epasts' => $row['epasts'],
            'reg_datums' => $row['reg_datums'],
            'loma' => $row['loma'],
            'id' => $row['piet_id']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>