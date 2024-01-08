<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT kursi | Pieteikumu administrēšana</title>
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
        <i class="fas fa-tasks"></i> Pieteikumi
    </div>
    <button class="btn" id="new">Pievienot jaunu</button>
</div>



<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Vārds</th>
            <th>Uzvārds</th>
            <th>E-pasts</th>
            <th>Tālrunis</th>
            <th>Kurss</th>
            <th>Statuss</th>
            <th></th>
        </tr>
        <tbody id="pieteikumi"></tbody>
    </table>

    <div class="modal">
        <div class="apply">
            <div class="close_modal"><i class="fas fa-times"></i></div>
            <h2>Pieteikums</h2>
            <form id="pieteikumaForma">
                <div class="formElements">
                    <label>Vārds <span>*</span>:</label>
                    <input type="text" id="vards" required>
                    <label>Uzvārds <span>*</span>:</label>
                    <input type="text" id="uzvards" required>
                    <label>E-pasta adrese <span>*</span>:</label>
                    <input type="email" id="epasts" required>
                    <label>Tālrunis <span>*</span>:</label>
                    <input type="tel" pattern="[0-9]{8}" id="talrunis" required>
                    <label>Komentārs:</label>
                    <input type="text" id="komentars">
                    <label>Kurss:</label>
                    <?php
                        $kursi_SQL = "SELECT * FROM kursi";
                        $atlasa_kursus = mysqli_query($savienojums, $kursi_SQL);
                        $kursi = "";

                        while($kurss = mysqli_fetch_array($atlasa_kursus)){
                            $kursi = $kursi."<option value='{$kurss['kursa_id']}'>{$kurss['kursa_nosaukums']}</option>";
                        }
                    ?>
                    <select id="kurss" required>
                        <?php echo $kursi; ?>
                    </select>
                    <label>Statuss:</label>
                    <select id="statuss" required>
                        <option value="Jauns">Jauns</option>
                        <option value="Atvērts">Atvērts</option>
                        <option value="Apstiprināts">Apstiprināts</option>
                    </select>
                    
                    <input type="" id="kursaID">
                </div>
                <input type="submit" name="pieteikties" value="Saglabāt" class="btn">
            </form>
        </div>
    </div>


</div>

</body>
</html>