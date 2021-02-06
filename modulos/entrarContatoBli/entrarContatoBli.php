<?php
    $arrayConsulta          = json_decode($_REQUEST["arrayConsulta"]);
    $to = $arrayConsulta[1];
    $subject = $arrayConsulta[0];
    $txt = $arrayConsulta[2];
    $headers = "From: alexandreti123456@gmail.com";

    mail($to,$subject,$txt,$headers);
?>