<?php
   use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
   require 'phpmailer/src/Exception.php';
   require 'phpmailer/src/PHPMailer.php';
   $mail = new PHPMailer(true);
   $mail->CharSet = 'UTF-8';
   $mail->setlanguage('ru', 'phpmailer/language/');
   $mail->IsHTML(true);
   //Om Kozo nucbMO
   $mail->setFrom('info@fls.guru', 'Фрилансер по жизни');
   //Кому отправить 

   $mail->addAddress('vasapeckin28@gmail.com');

   //Tema nucbMa
   $mail->Subject = 'Привет! Это "Фрилансер по жизни"';
   //Рука
   $hand = "Правая";
  if($_POST['hand'] == "left"){
      $hand = "Левая";
  }
  //Тело письма
$body = '<h1>Bстречайте супер письмо!</h1>';

if(trim(!empty($_POST['name']))){
   $body.='<p><strong>Имя: </strong> '.$_POST['name'].'</p>';
if(trim(!empty($_POST['email']))){
   $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
if(trim(!empty($_POST['hand']))){
   $body.='<p><strong>Pyкa:</strong> ' $hand.'</p>';
}
if(trim(!empty($_POST['age']))){
   $body.='<p><strong>BoзpacT:</strong> '.$_POST['age'].'</p>';
}
if(trim(!empty($_POST['message']))){
   $body.='<p><strong>Coобщение: </strong> '.$_POST['message']. '</p>';
}
//Прикрепить файл
if (!empty($_FILES['image'][' tmp_name'])) {
    //путь загрузки файла
    $filePath =__DIR__ . "/files/". $_FILES['image']['name'];
    //zpysum paün
    if (copy($_FILES['image']['tmp_name'], $filePath)){
       $fileAttach = $filePath;
      $body.='<p><strong>ФOTO B приложении </strong>';
      $mail->addAttachment($fileAttach);
    }
}
 $mail->Body = $body;
 //Omправляем

 if (!$mail->send ()) {
    $message = 'Ошибка';
  } else {
    $message  'Данные отправлены!';
  }
 $response = ['message' => $message];
 header('Content-type: application/json');
 echo json_encode($response);
 ?>