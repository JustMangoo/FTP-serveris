<?php
    require('../../connectDB.php');
    
    $select_SQL = "SELECT * FROM zurnalfaili ORDER BY laiks DESC";

    $select_result = mysqli_query($savienojums, $select_SQL);

    if(!$select_result){
        #die("Kļūda!".mysqli_error($savienojums));
    }

    while($row = mysqli_fetch_array($select_result)){
        $json[] = array(
            'laiks' => $row['laiks'],
            'lietotajs' => $row['lietotajs'],
            'darbiba' => $row['darbiba'],
            'id' => $row['loga_id'],
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>