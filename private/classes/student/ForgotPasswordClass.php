<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'public/phpmailer/src/Exception.php';
require 'public/phpmailer/src/PHPMailer.php';
require 'public/phpmailer/src/SMTP.php';

class ForgotPasswordClass extends Database
{
    public function passcode($passcode, $email)
    {

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'storosarionhs.sd@gmail.com';
        $mail->Password = 'elpcikycbjwfaipc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('storosarionhs.sd@gmail.com', 'Sto. Rosario H.S.');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Forgot Password';
        $mail->Body = "<strong>$passcode</strong> is your passcode.<br><br>
        ";
        $mail->send();
    }

    public function send_password($password, $email)
    {

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'storosarionhs.sd@gmail.com';
        $mail->Password = 'elpcikycbjwfaipc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('storosarionhs.sd@gmail.com', 'Sto. Rosario H.S.');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'New Password';
        $mail->Body = "<strong>$password</strong> is your new password.<br><br>
        ";
        $mail->send();
    }
    public function send_email()
    {
        Request::method('submit', function () {
            $passcode = Hash::number(6);

            $query = $this->find('students', $this->where('ST_EMAIL', Input::Validate('email')));
            if ($query->rowCount() > 0) {

                $data = [
                    'ST_PASSCODE' => $passcode,
                ];
                $query = $this->update('students', $data, $this->where('ST_EMAIL', Input::Validate('email')));

                if ($query) {

                    $this->passcode($passcode, Input::Validate('email'));
                    Redirect::to('enter-passcode.php');
                }
            } else {
                Redirect::to('forgot-password.php', 'Email not found!', 'danger');
            }
        });
    }

    public function send_passcode()
    {
        Request::method('submit', function () {
            $password = Hash::unique(6);

            $query = $this->find('students', $this->where('ST_PASSCODE', Input::Validate('passcode')));
            $email =  $query->fetch(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {

                $data = [
                    'ST_PASSCODE' => '',
                    'ST_PASSWORD' => Hash::make($password),
                ];
                $query = $this->update('students', $data, $this->where('ST_PASSCODE', Input::Validate('passcode')));

                if ($query) {

                    $this->send_password($password, $email->ST_EMAIL);
                    Redirect::to('index.php', 'Your password has sent to your gmail!', 'success');
                }
            } else {
                Redirect::to('enter-passcode.php', 'Passcode not found!', 'danger');
            }
        });
    }
}
