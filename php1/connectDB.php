<?php
    $servera_vards = "localhost";
    $lietotajvards = "grobina1_daugats";
    $parole = "jx6!Gb9Ke";
    $db_nosaukums = "grobina1_daugats";

    $savienojums = mysqli_connect($servera_vards, $lietotajvards, $parole, $db_nosaukums);

    /*
    if(!$savienojums){
        die("Pieslēgties neizdevās: ".mysqli_connect_error());
    }else{
        echo "Savienojums izveidots!";
    }
    */

    function encryptData($data) {
        $cipherMethod = 'AES-128-CBC';
        $key = 'Your32ByteEncryptionKeyHere';
        $iv = 'Your16ByteIVHere';

        return openssl_encrypt($data, $cipherMethod, $key, 0, $iv);
    }
    
    function decryptData($data) {
        $cipherMethod = 'AES-128-CBC';
        $key = 'Your32ByteEncryptionKeyHere';
        $iv = 'Your16ByteIVHere';

        return openssl_decrypt($data, $cipherMethod, $key, 0, $iv);
    }
?>