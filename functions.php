<?php
session_start();

function Login(){
        $accounts = [];
         // beolvasás fájlból
        $file = fopen("accounts.txt", "r");
            $accounts2 = [];
            while (($line = fgets($file)) !== false)
        $accounts2[] = unserialize($line);
        fclose($file);

        if (isset($_POST["regisztracio"])) {
            // beírt adatok lekérése
            $username = $_POST["uname"]; 
            $email = $_POST["email"];
            $password = $_POST["psw"];
            $password2 = $_POST["psw-repeat"];

            // már foglalt felhasználónév
            foreach ($accounts2 as $account) {
                if ($account["uname"] === $username)
                    die("<b>HIBA:</b> A felhasználónév már foglalt!");
            }

            // már foglalt email
            foreach ($accounts2 as $account) {
                if ($account["email"] === $email)
                    die("<b>HIBA:</b> Az email már foglalt!");
            }

            // 6 karakternél rövidebb jelszó
            if (strlen($password) < 6) 
                die("<b>HIBA:</b> A jelszó túl rövid!");

            // a két jelszó nem egyezik meg
            if ($password !== $password2) 
                die("<b>HIBA:</b> A két jelszó nem egyezik meg!");

            // sikeres reg
            $accounts[] = ["uname" => $username, "email" => $email , "psw" => $password];
            echo "Sikeres regisztráció! <br/> Üdvözöljük $username!<br><br>
                    <a href='home.php'>Tovább a webshopra</a>";;
            $_SESSION["person"] = $username;

        }

        elseif (isset($_POST["login"])){
            $username = $_POST["uname-lgn"];
            $password = $_POST["psw-lgn"];
            $logged = false;

            foreach ($accounts2 as $account){
                if ($account["uname"] == $username && $account["psw"] == $password){
                    $logged = true;
                    $_SESSION["person"] = $username;
                    echo "Üdvözöljük $username!<br><br>
                    <a href='home.php'>Tovább a webshopra</a>";
                    break;
                }
            }

            if (!$logged){
                echo "A bejelentkezés sikertelen. Hibás felhasználónév vagy jelszó.";
            }
        }

        //kiiratas fajlba
        $file = fopen("accounts.txt", "a");
        foreach ($accounts as $account)
            fwrite($file, serialize($account) . "\n");
        fclose($file);

    }

    function Order(){

    }
    ?>