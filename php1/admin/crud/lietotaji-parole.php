<?php
    require('../../connectDB.php');
    session_start();
    $response = array('message' => '');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $newPasswordOne = $_POST['newpasswordone'];
        $newPasswordTwo = $_POST['newpasswordtwo'];
        $oldPassword  = $_POST["password"];
        $message = 'empty';



        $fetch_password_SQL = "SELECT parole FROM kursi_lietotaji WHERE lietotajs_id = $id";
        $fetch_password_result = mysqli_query($savienojums, $fetch_password_SQL);
        
        if ($fetch_password_result) {
            $row = mysqli_fetch_assoc($fetch_password_result);
            $currentPassword = $row['parole'];

            if (password_verify($oldPassword, $currentPassword)) {
                if ($newPasswordOne === $newPasswordTwo) {
                    $hashedPassword = password_hash($newPasswordOne, PASSWORD_DEFAULT);
                    $update_password_SQL = "UPDATE kursi_lietotaji SET parole = '$hashedPassword' WHERE lietotajs_id = $id";
                    $update_password_result = mysqli_query($savienojums, $update_password_SQL);

                    if(!$update_password_result){
                        die("Kļūda!" . mysqli_error($savienojums));
                    }
                    $message = 'Parole veiksmīgi nomainīta!';

                    #LOGING
                    $log_user = $_SESSION["lietotajvards_LYXQT"];
                    $log_msg = "Nomainīta sava konta parole";
                    $logs_SQL = "INSERT INTO zurnalfaili(lietotajs, darbiba) VALUES ('$log_user', '$log_msg')";
                    $logs_result = mysqli_query($savienojums, $logs_SQL);
                } else {
                    $message = 'Jaunās paroles nesakrīt!';
                }
            } else {
                $message = 'Nepareiza vecā parole!';
            }
        } else {
            die("Kļūda!" . mysqli_error($savienojums));
        }
        echo $message;
    }
    
?>