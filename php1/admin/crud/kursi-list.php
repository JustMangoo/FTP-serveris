<?php
require('../../connectDB.php');

$select_kursi_SQL = "SELECT kursi.*, COUNT(kursu_pieteikumi.piet_id) AS pieteikumu_skaits 
                     FROM kursi 
                     LEFT JOIN kursu_pieteikumi ON kursi.kursa_id = kursu_pieteikumi.piet_kurss
                     GROUP BY kursi.kursa_id
                     ORDER BY kursa_id DESC";

$select_kursi_result = mysqli_query($savienojums, $select_kursi_SQL);

if (!$select_kursi_result) {
    #die("Kļūda!" . mysqli_error($savienojums));
}

while ($row = mysqli_fetch_array($select_kursi_result)) {
    $json[] = array(
        'nosaukums' => $row['kursa_nosaukums'],
        'apraksts' => $row['kursa_apraksts'],
        'attels' => $row['kursa_attels'],
        'pieteikumi' => $row['pieteikumu_skaits'],
        'statuss' => $row['kursa_statuss'],
        'id' => $row['kursa_id']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;
?>
