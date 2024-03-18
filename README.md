<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/github_username/repo_name">
    <img src="Images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Jooksuvõistlus</h3>
</div>

## Sisukord

## [Projekti kohta](#projekti-kohta)
### [Tehtud koos](#tehtud-koos)
### [Osa ja õigused](#osa-ja-õigused)
### [Sõltuvused](#sõltuvused)
### [Veebisaidi link](#veebisaidi-link)

## [Kood](#kood)
### [Faili struktuur](#faili-struktuur)

## [Autorid](#autorid)

# Projekti kohta

Sait on loodud peamiselt koolides või muudes kohtades toimuvate võistluste korraldamiseks.


### Tehtud koos

* [![JS][JS.js]][JS-url]
* [![PHP][PHP.js]][PHP-url]
* [![HTML5][HTML5.js]][HTML5-url]
* [![CSS][CSS.js]][CSS-url]


| Osa           | Õigused       
| ------------- |:-------------:
| Admin         | jooksja lisamine, jooksja muutmine, taimer käivitamine, taimer peatamine ja tulemuste vaatamine
| Kasutaja      | jooksja lisamine ja tulemuste vaatamine
  


### Sõltuvused

* Veebibrauser (Google Chrome, Firefox)
* Wi-Fi
* Andmebaas

# Veebisaidi link
[Jooksuvõistlus](https://artursuskevits22.thkit.ee/Jooks2/autasustamise.php)

### Saidi vaatamine ilma kontole sisse logimata

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/6532983a-6242-4cae-9785-52f3adbfeb56)

### saate registreerida uue kasutaja, kui te ei ole varem kasutajat loonud.

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/46f63028-8fb4-447c-ac3e-1eca20ed12bc)

### logi sisse

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/3fd46adf-a468-44bc-894e-5aaa4ab5dd57)


### sait, kui oled sisse logitud tavakasutajana, kus saab lisada uusi jooksjaid esilehele.

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/739d7ba9-beb8-4c53-9fad-c0ba3ef92af0)

### Keskmine kasutaja saab vaadata ka parimaid tulemusi

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/c88e65a8-1115-437d-9e68-dcc74ce4dc12)

### sait, kui oled sisse logitud adminina, kus saab vahetada kasutajaid esilehel

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/d2ed7bb5-5e80-46ef-b061-ec562e6281c7)

### Administraator saab käivitada taimeri

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/102798d3-2b91-4b54-9219-786d24128484)

### Samuti saab taimer peatada

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/d9ba078a-f290-43e2-ae50-4a57125012a7)

### Ja kõik on sama, mis tavalisel kasutajal

![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/0c23f262-671a-47e9-ab0c-ecec001c2346)
![pilt](https://github.com/MaksimTse/Jooksuvoistlus/assets/120181800/6e3ea2cc-8ba4-4c4a-b7d2-1cdcd6a31895)


# Kood
### See kood on veebileht üritusel osalejate haldamiseks, sealhulgas uute osalejate registreerimiseks, andmete kuvamiseks ja navigeerimiseks.

See projekt sisaldab järgmist funktsionaalsust:

1. Käivitage PHP-seanss kasutajaandmete salvestamiseks.
2. Andmebaasiga ühendamine conf.php faili kaudu.
3. Esitatud vormi andmete kontrollimine ja SQL päringu täitmine uute liikmete lisamiseks.
4. Funktsioon kasutaja staatuse kontrollimiseks (isAdmin()).
5. Erinevate elementide kuvamine sõltuvalt kasutaja staatusest.
6. JavaScripti kasutamine tabeli sorteerimiseks ja modaalse akna kontrollimiseks.

### Faili struktuur
* index.php: Veebilehe põhifail.
* conf.php: Andmebaasi konfiguratsioonifail.
* registration.php: Osalejate registreerimisvorm.
* login.php: Kasutaja sisselogimise vorm.
* logout.php: Logout.
* jookja.css: Stiilide fail lehekülje kujundamiseks.
* logo.png: ürituse logo.
* jooksjad.jpg: Üritusel osalemist propageeriv pilt.

```<?php
    session_start();
    require "conf.php";
    global $yhendus;

    if(isset($_REQUEST["nimi"]) && !empty($_REQUEST["nimi"]) && isset($_REQUEST["perenimi"]) && !empty($_REQUEST["perenimi"])){
        global $yhendus;
        $kask=$yhendus->prepare("Insert INTO jooksjad (eesnimi,perenimi) Values(?,?)");
        $kask->bind_param("ss", $_REQUEST["nimi"], $_REQUEST["perenimi"]);
        $kask->execute();
        header("Location: $_SERVER[PHP_SELF]");
        $yhendus->close();
        exit();
    }

    function isAdmin(){
        return isset($_SESSION['status']) && $_SESSION['status'];
    }
    if (isset($_SESSION["login"]) && isset($_SESSION["!login"]) && isset($_SESSION['status'])) {

        // Display the Registration form only when a user is logged in
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
```


## Autorid

Tšepelevitš Maksim

<p align="right">(<a href="#readme-top">Tagasi üles</a>)</p>

[product-screenshot]: images/screenshot.png
[JS.js]: https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black
[JS-url]: https://www.javascript.com/
[HTML5.js]: https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white
[HTML5-url]: https://html.com/
[PHP.js]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[PHP-url]: https://www.php.net/
[CSS.js]: https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white
[CSS-url]: https://www.free-css.com/
