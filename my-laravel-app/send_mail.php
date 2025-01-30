<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer();

    // Gmail SMTP Ayarları
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ahmetardc8@gmail.com';
    $mail->Password = 'jtjo jnsf irnp ibpt';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($email, $name);
    $mail->addAddress('info@elselif.com');
    $mail->isHTML(true);
    $mail->Subject = "Contact Message from $name";
    $mail->Body = nl2br($message);
    $mail->AltBody = $message;

    // Gmail ile gönderim dene
    if ($mail->send()) {
        echo "Message has been sent successfully via Gmail.";
    } else {
        // Gmail başarısız oldu, Mailtrap ayarlarına geç
        $mail->clearAddresses(); // Önceki adresleri temizle
        $mail->Host = 'smtp.mailtrap.io';
        $mail->Username = 'a7a18d91bdfab9';
        $mail->Password = '505c480db6b369';
        $mail->Port = 587;

        if ($mail->send()) {
            echo "Message has been sent successfully via Mailtrap.";
        } else {
            echo "Message could not be sent. Error: " . $mail->ErrorInfo;
        }
    }
}
?>
