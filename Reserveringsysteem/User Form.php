<?php
/**@var $db */

require_once "includes/database.php";

// Checkt of het formulier gesubmit is
if (isset($_POST['submit'])) {
    // 'Post back' met de data van het formulier
    $voornaam = mysqli_real_escape_string($db, $_POST['voornaam']);
    $achternaam = mysqli_real_escape_string($db, $_POST['achternaam']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $datum = mysqli_real_escape_string($db, $_POST['datum']);
    $tijd = mysqli_real_escape_string($db, $_POST['tijd']);


    $errors = [];
    if ($voornaam == '') {
        $errors['voornaam'] = 'Het veldnaam met uw voornaam mag niet leeg zijn.';
    }
    if ($achternaam == '') {
        $errors['achternaam'] = 'Het veldnaam met uw achternaam mag niet leeg zijn.';
    }
    if ($datum == '') {
        $errors['datum'] = 'Het veldnaam met de datum mag niet leeg zijn.';
    }
    if ($tijd == '') {
        $errors['time'] = 'Het veldnaam met de tijd mag niet leeg zijn.';
    }
    print_r($errors);
    if (empty($errors)) {
        $query = "INSERT INTO reservering (Voornaam, achternaam, email, datum, tijd)
     VALUES('$voornaam','$achternaam','$email','$datum','$tijd') ";
        $result = mysqli_query($db, $query);
        if ($result) {
            $success = '<p class = "error-msg">Uw reservering is voltooid</p>';
        } else {
            $errors['db'] = mysqli_error($db);
        }

    }
}
?>

<!doctype html>
<html lang = "nl">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport"
          content = "width = device-width, user-scalable = no, initial-scale = 1.0, maximum-scale = 1.0, minimum-scale = 1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie = edge">
    <link rel="stylesheet" type="text/css" href="css/Southside vintage style.css"/>
    <title>User Form</title>
</head>
<body>
<form action = "" method = "post">
    <div class="img2">
        <header>Reserveren</header>
        <div class="form-control">
        <label for = "voornaam">Voornaam</label>
        <input id = "voornaam" type = "text" name = "voornaam" value = "<?=  isset($voornaam) ? htmlentities($voornaam): ''  ?>">
    </div>
    <div class="form-control">
        <label for = "achternaam">Achternaam</label>
        <input id = "achternaam" type = "text" name = "achternaam" value = "<?=  isset($achternaam) ? htmlentities($achternaam): ''  ?>">
    </div>
    <div class="form-control">
        <label for = "email">E-mail</label>
        <input id = "email" type = "email" name = "email" value = "<?=  isset($email) ? htmlentities($email): ''  ?>">
    </div class="form-control">
    <div class="form-control">
        <label for = "datum">Datum</label>
        <input id = "datum" type = "date" name = "datum" value = "<?=  isset($datum) ? htmlentities($datum): ''  ?>">
    </div>
    <div class="form-control">
        <label for = "tijd">Tijd</label>
        <input id = "tijd" type="time" name = "tijd" value = "<?=  isset($tijd) ? htmlentities($tijd): ''  ?>">
    </div>
    <div class="form-control" class = "data-submit">
        <input type = "submit" name = "submit" value = "Save"/>
    </div>
    </div>
</body>
</html>
