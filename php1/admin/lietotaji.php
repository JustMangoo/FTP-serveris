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
        <i class="fas fa-user"></i> Lietotāji
    </div>
    <button class="btn" id="new">Pievienot jaunu</button>
</div>



<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Lietotājvārds</th>
            <th>Vārds</th>
            <th>Uzvārds</th>
            <th>E-pasts</th>
            <th>Loma</th>
            <th>Reģistrēts sistēmā</th>
            <th></th>
        </tr>
        <tbody id="lietotaji"></tbody>
    </table>

    <div class="modal">
        <div class="apply">
            <div class="close_modal"><i class="fas fa-times"></i></div>
            <h2>Lietotājs</h2>
            <form id="lietotajaForma">
                <div class="formElements">
                    <label>Lietotājvārds<span>*</span>:</label>
                    <input type="text" id="lietotajvards" required>
                    <label>Vārds<span>*</span>:</label>
                    <input type="text" id="vards" required>
                    <label>Uzvārds<span>*</span>:</label>
                    <input type="text" id="uzvards" required>
                    <label>E-pasts<span>*</span>:</label>
                    <input type="email" id="epasts" required>
                    <label>Loma<span>*</span>:</label>
                    <select id="loma" required>
                        <option value="moderators">Moderātors</option>
                        <option value="admins">Admin</option>
                    </select>
                    <div class="checkbox-label">
                        <label for="togglePasswordChange">Mainit paroli</label>
                        <input type="checkbox" id="togglePasswordChange" name="togglePasswordChange"> 
                    </div>
                    <input type="password" id="password" name="password" required disabled>
                    
                    <input type="" id="lietotajsID" hidden>
                </div>
                <input type="submit" name="pieteikties" value="Saglabāt" class="btn">
            </form>
        </div>
    </div>


</div>

</body>
</html>