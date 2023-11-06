<?php
// Vérifie si les champs 'email' et 'password' ne sont pas vides et valide le captcha de Google

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $secret = "6LdfuvsoAAAAAPmDkqgEtqN6Fk5J2bjXSIFoj3z1";
    $response = htmlspecialchars($_POST['g-recaptcha-response']);
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $request = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
    $get = file_get_contents($request);
    $decode = json_decode($get, true);
    if ($decode['success']) {
        echo "ok";
    } else {
        echo "error";
    }
}