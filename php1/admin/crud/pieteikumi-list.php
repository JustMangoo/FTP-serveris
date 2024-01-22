<?php
    require('../../connectDB.php');
    
    $select_pieteikumi_SQL = "SELECT *, kursa_nosaukums FROM kursu_pieteikumi LEFT JOIN kursi ON kursu_pieteikumi.piet_kurss = kursa_id ORDER BY piet_id DESC";

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
            'vards' => decryptData($row['piet_vards']),
            'uzvards' => decryptData($row['piet_uzvards']),
            'epasts' => decryptData($row['piet_epasts']),
            'talrunis' => decryptData($row['piet_talrunis']),
            'komentars' => $row['piet_komentars'],
            'kurss' => $row['piet_kurss'],
            'kursa_nos' => $row['kursa_nosaukums'],
            'statuss' => $row['piet_statuss'],
            'id' => $row['piet_id']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>