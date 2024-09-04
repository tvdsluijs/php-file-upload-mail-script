<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

// SMTP Configuratie
$smtpHost = "smtp.gmail.com";
$smtpUsername = "[your_email@gmail.com]";
$smtpPassword = "[your_email_password]";
$smtpPort = 587;

$mailtoEmail = "[your_email]";
$mailToName = "[your_name]";

$uploadDir = "upload/";

// Basis URL van de website
$baseUrl = "https://[your url]/" . $uploadDir;

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (!empty($_FILES["files"]["name"][0])) {
    $uploadedFiles = $_FILES["files"];
    $uploadedFileNames = [];
    $uploadedFileUrls = [];

    foreach ($uploadedFiles["tmp_name"] as $key => $tmpName) {
        $fileName = basename($uploadedFiles["name"][$key]);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $filePath)) {
            $uploadedFileNames[] = $fileName;
            $uploadedFileUrls[] = '<a href="' . $baseUrl . $fileName . '">' . $fileName . "</a>";
        } else {
            echo "Fout bij het uploaden van $fileName.<br>";
        }
    }

    if (!empty($uploadedFileUrls)) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUsername;
            $mail->Password = $smtpPassword;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $smtpPort;

            $mail->setFrom($smtpUsername, "Upload Notificatie");
            $mail->addAddress($mailtoEmail, $mailToName);
            $mail->isHTML(true);
            $mail->Subject = "Nieuwe bestanden geüpload";
            $mail->Body = "De volgende bestanden zijn geüpload:<br>" . implode("<br>", $uploadedFileUrls);

            $mail->send();
            echo "E-mail notificatie verzonden.";
        } catch (Exception $e) {
            echo "E-mail kon niet worden verzonden. Fout: {$mail->ErrorInfo}";
        }
    } else {
        echo "Geen bestanden geüpload.";
    }
}
