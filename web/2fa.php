<?

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';


// use PragmaRX\Google2FA\Google2FA;



// $google2fa = new Google2FA();
    
// $secretKey =  $google2fa->generateSecretKey();
// $companyName = 'Kartee';
// $companyEmail = 'tatoshik92@yandex.ru';

//  $qrCodeUrl = $google2fa->getQRCodeUrl(
//     $companyName,
//     $companyEmail,
//     $secretKey
// );

// echo  $qrCodeUrl;

$google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());


//$secret = $google2fa->generateSecretKey();

//echo $secret;

$inlineUrl = $google2fa->getQRCodeInline(
    'Kartee',
    'tatoshik92@yandex.ru',
    'LEAXEFT6DNGQP2DX'
);

?>

<?=$inlineUrl?>

<form action="" method="POST">
<input type="text" name="pass">
</form>

<?


if(!empty($_POST['pass'])){
    $valid = $google2fa->verifyKey('LEAXEFT6DNGQP2DX', $_POST['pass']);

    if($valid){
        echo 'УРа';
    }else{
        echo 'Код не верный';
    }
}

?>