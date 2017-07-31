<?php
require('../textlocal.php');

$username016 = "maryjeansophia1995@gmail.com ";
$username018 = "asifsalam00@gmail.com" ;
$username024 = "krramya643@gmail.com";
$username035 = "lnagalakshmi13@gmail.com";
$username005 = "salumitaskeen@gmail.com";
$username006 = "zainhoorulain@gmail.com";
$userpassword = "Bismilla123";

$textlocal = new Textlocal($username, $userpassword);



$numbers = array();
$sender = 'AAI-SMS';
$message = '    ';

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>