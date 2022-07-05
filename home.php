<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Webshop - Witcher</title>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" type="text/css" href="yes.css">
</head>
<body>
<div id="page-container">
    <nav>
        <ul>
            <li><a href="history.html">Birodalmak</a></li>
            <li><a href="charatcters.html">Karakterek</a></li>
            <li><a id="nav-icon" href="main.html"><img src="img/icon.png" alt="icon"></a></li>
            <li><a href="adapt.html">Adaptációk</a></li>
            <li><a id="active" href="logout.php">Kijelentkezés</a></li>
        </ul>
    </nav>
    <div id="content-wrap">

        <!-- Regisztráció-->
        <div>
            <?php
            if(!isset($_SESSION["person"])){
                echo "Bejelentkezés szükséges!";
                die;
            }
            else
            echo "Bejelentkezve mint $_SESSION[person]";
            ?>
        </div>

        <?php
            if (isset($_SESSION["person"])){
             echo "<div class=\"tabla\" id=\"order\">
        <h1>Póló rendelés</h1>
        <form method=\"post\"><table>
            <tr>
                <th>fazon</th>
                <td>
                    <input type=\"radio\" id=\"female\" name = \"gender\" value=\"female\" checked>
                    <label for=\"female\">Női</label>
                    <input type=\"radio\" id=\"male\" name = \"gender\" value=\"male\">
                    <label for=\"male\">Férfi</label>
                </td>
            </tr>
            <tr>
                <th><label for=\"color\">szín</label></th>
                <td><select id=\"color\" name=\"color\">
                    <option value=\"white\">  fehér</option>
                    <option value=\"black\">  fekete</option>
                    <option value=\"blue\">   kék</option>
                    <option value=\"green\">  zöld</option>
                    <option value=\"red\">    piros</option>
                </select></td>
            </tr>
            <tr>
                <th>extrák</th>
                <td>
                    <input type=\"checkbox\" id=\"torok\" name=\"torok\" value=\"torok\" checked>
                    <label class=\"ws_extra\" for=\"torok\">Török pamut</label>
                    <input type=\"checkbox\" id=\"ing\" name=\"ing\" value=\"ing\">
                    <label class=\"ws_extra\" for=\"ing\">Ingnyakas</label>
                </td>
            </tr>

            <tr>
                <th></th>
                <td><button type=\"submit\">Rendelés</button></td>
            </tr>
        </table></form></div>";
            }
        ?>


    </div>
    <!--Footer -->
    <footer>

        <ul id="footerLeft">
            <li><u>Készítette:</u></li>
            <li><ul>
                    <li>Vizi Kristóf</li>
                    <li>Bende László</li></ul></li>
        </ul>

        <ul id="footerCenter">
            <li><a href="https://www.facebook.com/thewitcher/"><img src="img/fb.png" alt="fblogo"></a></li>
            <li><a href="https://www.instagram.com/witchernetflix/"><img src="img/insta.png" alt="instalogo"></a></li>
        </ul>


        <ul id="footerRight">
            <li><a href="#top"><img src="img/totop.png" alt="btlogo"></a></li>
        </ul>
    </footer>
</div>
</body>
</html>