<?php
    require('../../connectDB.php');

    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($savienojums, $_POST['id']);
        $select_kurss_SQL = "SELECT * FROM kursi WHERE kursa_id = $id";
        $select_kurss_result = mysqli_query($savienojums, $select_kurss_SQL);

        if(!$select_kurss_result){
            die("Kļūda!".mysqli_error($savienojums));
        }

        $json = array();
    
        while($row = mysqli_fetch_array($select_kurss_result)){
            $json[] = array(
                'nosaukums' => $row['kursa_nosaukums'],
                'apraksts' => $row['kursa_apraksts'],
                'attels' => $row['kursa_attels'],
                'statuss' => $row['kursa_statuss'],
                'id' => $row['kursa_id']
            );
        }

        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
?>