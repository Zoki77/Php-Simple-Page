<?php
    if($_SESSION['valid'] == TRUE) // Provjera je li korisnik stvarno ulogiran
    {
        // Staviti redirect na User Panel? News page?
        header("Location: start.php?page=search");
    }
    else
    {
        header("Location: welcome.html");
    }
?>
