<?php

//code for some css on the page

echo '<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <style>
            body{font-family: Verdena; font-size: 20px; border: 0 solid black;
            text-align: center; width: 100%; padding: 20px;}
        </style>
    </head>
    <body class="dark-grey">';


//if something is submitted then do this
if(isset($_POST["submit"])) {
    $fotoNaam = basename($_FILES["foto"]["name"]);
    global $uploadsMap;
    
    
    function upload(){    
        global $uploadsMap;
        $uploadsMap = "uploads/";
        $uploadsMap = $uploadsMap . basename($_FILES["foto"]["name"]);
        $fotoType = pathinfo($uploadsMap, PATHINFO_EXTENSION);
        // Check if the image already exists (not really needed but does work)
        //if (file_exists($uploadsMap)) {
        //    echo "Deze foto bestaat al.";
        //    return false;
        //}
        // falidate file size
        if ($_FILES["foto"]["size"] > 50000000 ) {
            echo "Deze foto is te groot";
            return false;
        }
        //falidate file format
        if($fotoType != "jpg" &&
        $fotoType != "png" &&
        $fotoType != "jpeg" &&
        $fotoType != "gif" ) {
            echo "Foto moet jpg, jpeg, png of gif zijn. ";
            return false;
        }
        return true;
    }
    // move picture from temp-map to UploadsMap
    if (upload()) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadsMap)) {
            echo "foto is geupload. <br>";
            
            // save user
            $bestand=fopen("gebruiker.txt","ab");
            
            if(!$bestand){
                echo "Kon geen bestand openen!";
            }
            
            //gets the uploaded info
            $naam = htmlspecialchars($_POST['naam']);
            $email = htmlspecialchars($_POST['e-mail']);
            $wachtwoord = htmlspecialchars($_POST['password']);
            $profielFoto = $fotoNaam;
            $profiel = $naam."*".$email."*".$wachtwoord."*".$profielFoto."\n";
            
            fwrite($bestand,$profiel,strlen($profiel));
            if(fclose($bestand)) {
                echo "Account is aangemaakt.";
            }
            
            else {
                echo "Probleem bij het uploaden. Foto niet geupload.";
            }
        }
    }
}

//end of css
echo '<a href="inloggen.html"><input type="button" naam="terug" value=" Terug "  /></a>    
    </body>
    </html>';

?>









