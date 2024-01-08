<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($savienojums, $_POST['id']);
        $select_pieteikums_SQL = "SELECT * FROM kursu_pieteikumi WHERE piet_id = $id";
        $select_pieteikums_result = mysqli_query($savienojums, $select_pieteikums_SQL);

        if(!$select_pieteikums_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        $json = array();
    
        while($row = mysqli_fetch_array($select_pieteikums_result)){
            $json[] = array(
                'vards' => $row['piet_vards'],
                'uzvards' => $row['piet_uzvards'],
                'epasts' => $row['piet_epasts'],
                'talrunis' => $row['piet_talrunis'],
                'komentars' => $row['piet_komentars'],
                'kurss' => $row['piet_kurss'],
                'statuss' => $row['piet_statuss'],
                'id' => $row['piet_id']
            );
        }

        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
?>