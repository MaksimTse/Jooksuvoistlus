<?php
// Alusta sessiooni, mis võimaldab andmeid kasutaja päringute vahel säilitada.
session_start();
// Nõuab ühendust andmebaasiga ja muid konfiguratsiooniseadeid.
require "conf.php";
// Globaalse ühenduse deklareerimine andmebaasiga.
global $yhendus;

// Kontrollib, kas vormist on saadetud andmed.
if(isset($_REQUEST["nimi"]) && !empty($_REQUEST["nimi"]) && isset($_REQUEST["perenimi"]) && !empty($_REQUEST["perenimi"])){
    // Lisab vormist saadud andmed andmebaasi.
    global $yhendus;
    $kask=$yhendus->prepare("Insert INTO jooksjad (eesnimi,perenimi) Values(?,?)");
    $kask->bind_param("ss", $_REQUEST["nimi"], $_REQUEST["perenimi"]);
    $kask->execute();
    // Pärast andmete edukat töötlemist suunatakse tagasi samale lehele.
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}

// Funktsioon, mis kontrollib, kas kasutajal on administraatori staatus.
function isAdmin(){
    return isset($_SESSION['status']) && $_SESSION['status'];
}

// Kui kasutaja on sisse logitud ja tal on administraatori staatus, lisatakse registreerimisvorm.
if (isset($_SESSION["login"]) && isset($_SESSION["!login"]) && isset($_SESSION['status'])) {
    include('registration.php');
}
?>




<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Jooksuvõistlus</title>
        <link rel="stylesheet" type="text/css" href="jookja.css">

    </head>
    <script>
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.querySelector("table");
            switching = true;

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < rows.length - 1; i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];

                    if (isNaN(x.innerHTML)) {
                        shouldSwitch = x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase();
                    } else {
                        shouldSwitch = parseFloat(x.innerHTML) > parseFloat(y.innerHTML);
                    }

                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        break;
                    }
                }
            }
        }

            function openModal() {
            document.getElementById('languageModal').style.display = 'block';
        }

            function closeModal() {
            document.getElementById('languageModal').style.display = 'none';
        }
    </script>


    <body>
    <header>

        <img src="logo.png" id="logo" alt="logo" width="100" height="100">
        <?php
        if(isset($_SESSION['login'])){
            ?>
            <h1 id="loginname"><?="$_SESSION[login]"?></h1>
            <a href="logout.php"   class="logi">Logi välja</a>
            <?php
        } else {
            ?>
            <a id="lingid4" href="login.php">Logi sisse</a>

            <?php
        }
        ?>
        <?php
        if(isset($_SESSION['login'])){
            ?>
            <a id="lingid2" href="logout.php"></a>
            <?php
        } else {
            ?>
            <a id="lingid3" href="registration.php">Registreerimine</a>

            <?php
        }
        ?>
        <?php
        if(isset($_SESSION['login'])){
            ?>
            <?php
        }

        ?>
        <?php
        if (isset($_SESSION["login"]))
        {
        ?>
        <nav id="navmenu2">
            <?php if (isAdmin()){?>
            <a href="start.php" id="lingid2">Start</a>
            <a href="lopp.php" id="lingid2">Lõpp</a>
            <?php }?>
            <a href="autasustamise.php" id="lingid2">Autasustamise</a>
            <?php if (isAdmin()){?>
                <a href="adminleht.php" id="lingid2">Halduspaneel</a>
            <?php }?>
        </nav>
            <?php
        }
        ?>
    </header>
    <?php if (isset($_SESSION["login"]))
    {
    ?>
    <nav>
    <div id="regdiv">
    <h1 id="tere">Jooksuvõistlus</h1>
    </div>

    <div id="languageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="Lisa_jooksja">Lisa jooksja</h2>
            <form action="  ?">
                <label for="nimi">Nimi:</label>
                <input type="text" name="nimi" id="nimi">
                <label for="perenimi">Perenimi:</label>
                <input type="text" name="perenimi" id="perenimi">
                <input type="submit" name="jkskls" id="jkskls" value="Lisa jooksja">
            </form>
        </div>
    </div>

    <table>
        <tr>
            <th id="cursor" onclick="sortTable(0)">Nimi</th>
            <th id="cursor" onclick="sortTable(1)">Perenimi</th>
            <th>Alustamisaeg</th>
            <th>Lõpetamisaeg</th>
            <th id="cursor" onclick="sortTable(2)">Tulemus</th>
        </tr>
    <?php
    global $yhendus;
    $kask=$yhendus->prepare("SELECT id, eesnimi, perenimi,alustamisaeg,lopetamisaeg,result from jooksjad ORDER BY result;");
    $kask->bind_result($id,$nimi,$perenimi,$alustamiaeg,$lopitamisaeg,$result);
    $kask->execute();
    while ($kask->fetch()) {
        echo "<tr>";
        $tantsupaar = htmlspecialchars($nimi);
        echo "<td>" . $nimi . "</td>";
        echo "<td>" . $perenimi . "</td>";
        echo "<td>" . $alustamiaeg . "</td>";
        echo "<td>" . $lopitamisaeg . "</td>";
        echo "<td>" . $result . "</td>";
        echo "</tr>";
    }
    ?>
    </table>
    <br>
    <input type="button" id="lisabtn" name="lisabtn" value="Lisa jooksja" onclick="openModal()">
    <?php
    }
    ?>
        <table>
            <td>
                Jooksu maraton "Kõrgemale tõustes"
                <br>

                Tere tulemast jooksu maratonile "Kõrgemale tõustes"! See põnev maraton pakub ainulaadset võimalust kõigil jooksjatel proovida oma jõudu, ületades distantsi kaunite maastike ja inspireeriva atmosfääri keskel.
<br>
                Kuupäev ja koht:
<br>
                Kuupäev: 15. september 2024
                Koht: Linnapark "Rohelised avarused", Spordi tänav 10, Uuslinn
<br>
                Distantsid:
<br>
                Maraton (42.195 km): Ideaalne kogenud jooksjatele, kes on valmis tõsiseks väljakutseks.
                Poolmaraton (21.0975 km): Sobib nii kogenud jooksjatele kui ka algajatele, kes soovivad proovida oma jõudu lühemal distantsil.
                10 km: Suurepärane valik algajatele jooksjatele või neile, kes eelistavad lühemaid distantsi.
<br>
                Sündmuse kava:
<br>
                7:00 - Osalejate registreerimine
                8:00 - Maratoni ja poolmaratoni start
                8:15 - 10 km jooksu start
                12:00 - Võitjate autasustamine ja sündmuse lõpp
<br>
                Registreerimine:
                Osalejate registreerimine on avatud kuni 10. septembrini 2024. Registreeruge kiiresti, et saada võimalus osaleda selles ainulaadses sündmuses! Registreerimiseks külastage meie veebisaiti aadressil www.korgemale-toustes-maraton.ee/registreerimine.
<br>
                Võtke meiega ühendust:
                Kui teil on küsimusi või vajate täiendavat teavet, võtke julgelt ühendust telefonil +123456789 või e-posti teel info@korgemale-toustes-maraton.ee.
<br>
                Liituge meiega ja tõuske kõrgemale koos "Kõrgemale tõustes" jooksu maratoniga!
            </td>
        </table>
    <br>
    <div>
        <?php if (!isset($_SESSION["login"]))
        {
        ?>
                <p id="jookshadtext">Registreerida ja osaleda meie võistluses</p>
    <img id="jooksjad" src="jooksjad.jpg" ALT="ESHKEREEEEEEEE" WIDTH="1000" HEIGHT="600">
            <?php
        }
        ?>
    </div>
    </body>
    </html>