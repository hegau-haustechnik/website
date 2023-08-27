<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;

$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['Vorname','E-Mail'])->areRequired()->maxLength(500);
$validator->field('E-Mail')->isEmail();
$validator->field('Mitteilung')->maxLength(6000);


$pp->requireReCaptcha();
//TODO Axo please change secret key of recaptcha
$pp->getReCaptcha()->initSecretKey('6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');

//TODO Axo change receiver email
$pp->sendEmailTo('jyrgal.91@gmail.com'); // ← Your email here

echo $pp->process($_POST);
