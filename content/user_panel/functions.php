<?php // Ovo je datoteka u kojoj su definirane sve funkcije.

/* #################### FUNKCIJE ZA RAD S BAZOM #################### */

// Funkcija otvara konekciju prema bazi podataka.
function open_connection()
{
    // Podaci potrebni za spajanje na MySQL host. Ovdje su definirani podaci za korisnika nad bazom koji ima SVA prava!
    $dbhost = 'localhost';
    $dbuser = 'arsiadan_dwa';
    $dbpass = 'D0br4_Sh1fr4';

    // Spajanje na MySQL host sa gore zadanim podacima
    $connection = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');

    // Odabir baze. Ukoliko baza ne postoji javlja se greška.
    $dbname = 'arsiadan_dwa-projekt';
    mysql_select_db($dbname) or die('Error opening database');
    
    mysql_query("SET NAMES utf8;"); // Fix za hrvatske znakove (neki ludi bug u PHP-u)
}

// Funkcija zatvara konekciju prema bazi.
function close_connection()
{
    mysql_close() or die('Error closing connection');
}

/* #################### FUNKCIJE ZA RAD SA SESSION-IMA #################### */         

function validate_user() // Funkcija koja se poziva nakon uspješnog logiranja korisnika
{
    $_SESSION['valid'] = true;
    $_SESSION['username'] = $username; // Pamti korisničko ime trenutno ulogiranog korisnika.
}

function logout()
{
    $_SESSION = array(); // Uništava sve podatke koji su do tad bili zapisanu u $_SESSION.           
    session_destroy(); // Uništava session.
}
