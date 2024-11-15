<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../public/phpmailer/src/Exception.php';
require '../public/phpmailer/src/PHPMailer.php';
require '../public/phpmailer/src/SMTP.php';

class NewEnrollmentClass extends Database
{

    public function index()
    {
        $this->admin_auth();
    }
    public function new_student()
    {
        $query = $this->find('students', $this->where('ST_STATUS', 'New'));
        $count = $query->rowCount();
        if ($count = $query->rowCount()) {
            return $count;
        } else {
            return false;
        }
    }
    public function confirmation($firstname, $lastname, $email, $password)
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
        $mail->Subject = 'Online Enrollment';
        $mail->Body = "$firstname $lastname<br><br>
        Welcome to Sto. Rosario National High School! <br><br>
        To enroll, proceed to online enrollment portal at http://localhost/enrollment/index.php using the following<br>
        login creadentials: <br><br>
        Username: $email <br>
        Password: $password <br>
        ";
        $mail->send();
    }
    public function confirm_student()
    {
        Request::method('confirm-student', function () {

            $password = Hash::unique(6);

            $data = [
                'ST_STATUS' => 'Enrolled',
                'ST_PASSWORD' =>  Hash::make($password),
            ];
            $query = $this->update('students', $data, $this->where('STUDENT_ID', Input::validate('student_id')));

            if ($query) {

                $this->confirmation(Input::validate('student_firstname'), Input::validate('student_lastname'), Input::validate('student_email'), $password);
                Redirect::to('admin/new-enrollment.php', 'Approved Successfully!', 'success');
            } else {
                Redirect::to('admin/new-enrollment.php', 'Approved Failed!', 'danger');
            }
        });
    }
    public function fetch_students()
    {
        $query = $this->find('students', $this->where('ST_STATUS', 'New'));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
}
