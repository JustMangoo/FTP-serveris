<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT kursi | Lietotāju administrēšana</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <script src="admin-script.js" defer></script>

</head>
<body>
<?php
    require("../connectDB.php");
    require("navigation.php");
?>

<div class="title">
    <div class="name">
        <i class="fas fa-database"></i> Kursi
    </div>
    <button class="btn" id="newKurss">Pievienot jaunu</button>
</div>



<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Nosaukums</th>
            <th>Apraksts</th>
            <th>Attēls</th>
            <th></th>
        </tr>
        <tbody id="kursi"></tbody>
    </table>

    <div class="modal">
        <div class="apply">
            <div class="close_modal"><i class="fas fa-times"></i></div>
            <h2>Pieteikums</h2>
            <form id="kursaPievForma">
                <div class="formElements">
                    <label>Nosaukums <span>*</span>:</label>
                    <input type="text" id="nosaukums" required>
                    <label>Apraksts <span>*</span>:</label>
                    <input type="text" id="apraksts" required>
                    <label>Attels <span>*</span>:</label>
                    <input type="text" id="attels">
                    <label>Statuss:</label>
                    <input type="checkbox" id="kurss-statuss" name="kurss-statuss" checked/>
                    
                    <input type="hidden" id="kursaID">
                </div>
                <input type="submit" name="pievKursu" value="Saglabāt" class="btn">
            </form>
        </div>
    </div>


</div>

</body>
</html>