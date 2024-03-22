<?php

$to = "joaquinjuarez17@hotmail.com";
$subject = "Test mail";
$message = "Ok I get it";
$headers = "From: joaquinjuarez177@gmail.com";

$res =  mail($to, $subject,$message,$headers);
if($res){
    echo "Email sent";
}