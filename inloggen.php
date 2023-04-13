<?php
$email = htmlspecialchars($_POST['e-mail']);
$wachtwoord = htmlspecialchars($_POST['wachtwoord']);
$bestand = fopen("gebruiker.txt","r");

//makes sure the session isnt started yet
$_SESSION["loggedin"] = false;

if(!$bestand){
    echo "Kon geen bestand openen!";
}

while(!feof($bestand)){
    $account = fgets($bestand);
    $account = explode("*",$account);
    
    //if login info is correct then start session
    if($account[1] == $email && $account[2] == $wachtwoord){
        session_start();
        $_SESSION["USER"] = $email;
        $_SESSION["STATUS"] = 1;
        $_SESSION["ID"] = $_COOKIE["PHPSESSID"];
        $_SESSION["loggedin"] = true;
        
        //says that you're logged in
        echo "
        <script>
        alert('U bent ingeloged als $email.');
        location.href='index.php';
        </script>";
    }
}

//warns if something went wrong
echo "
<script>
alert('wachtwoord of gebruikersnaam is ongeldig');
location.href='inloggen.html';
</script>";
?>



<?php
/*
session_start();

$email = htmlspecialchars($_POST['e-mail']);
$wachtwoord= htmlspecialchars($_POST['wachtwoord']);
$bestand=fopen("gebruiker.txt","r");
$_SESSION["loggedin"] = false;

if(!$bestand){
    echo "Kon geen bestand openen!";
}

while(!feof($bestand));{
    
    $account = fgets($bestand);
    $account = explode("*", $account);
    
    if($account[1] == $email && $account[2] == $wachtwoord){
        session_start();
        $_SESSION["USER"] = $email;
        $_SESSION["STATUS"] = 1;
        $_SESSION["ID"] = $_COOKIE["PHPSESSID"];
        $_SESSION["loggedin"] = true;
        
        header("Location: welcome.php");
        
        //echo "
        //<script>
        //alert('U bent ingelogd als $email.');
        //location.href='welkom.php';
        //</script>
        //";
    }
}

header("Location: inloggen.html");

//echo "
//<script>
//alert('wachtwoord of gebruikersnaam ongeldig.');
//location.href='inloggen.html';
//</script>
//";*/
?>