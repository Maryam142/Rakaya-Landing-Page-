<?php

if (isset($_POST['submit'])) {
    $name =     $_POST['name'];
    $subject =  $_POST['subject'];
    $message =  $_POST['message'];
    $email =    $_POST['email'];

    if (empty($name) || empty($subject) || empty($message) || empty($email)) {
        http_response_code(400);
        print json_encode(['error' => 1, 'msg' => 'هناك مشكلة في ارسال الرسالة، يرجى تعبئة كافة الحقول']);
        exit;
    }

    $mail->setFrom($email, $name);
    $mail->addAddress('rakayateam2@gmail.com');
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();

    if (mail($email, $subject, $message, $name)) {
        http_response_code(200);
        print json_encode(['error' => 0, 'msg' => 'شكرًا لك، تم ارسال رسالتك']);
    } else {
        http_response_code(500);
        print json_encode(['error' => 1, 'msg' => 'عذرًا حدث خطا، لم يتم ارسال رسالتك']);
    }
}
