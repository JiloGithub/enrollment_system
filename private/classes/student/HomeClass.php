<?php

class HomeClass extends Database
{


    public function fetch_schedule()
    {
        $query = $this->getAll('schedules');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function teacher_schedule()
    {
        if (isset($_GET['id'])) {
            $query = $this->find('schedules', $this->where('SCHEDULE_ID', $_GET['id']));
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
            return isset($data) ? $data : false;
        }
    }
    public function login()
    {
        Request::method('login', function () {


            $query = $this->find('students', $this->where('ST_EMAIL', Input::Validate('email')));

            if ($result = $query->fetch(PDO::FETCH_OBJ)) {
                if (Hash::check(Input::Validate('password'), $result->ST_PASSWORD)) {


                    Session::put('student_id', $result->STUDENT_ID);
                    Session::put('student_status', $result->ST_STATUS);
                    Session::put('student_username', $result->ST_USERNAME);
                    Session::put('student_email', $result->ST_EMAIL);
                    Session::put('student_password', $result->ST_PASSWORD);
                    Session::put('student_profile', $result->ST_PROFILE);
                    Session::put('student_year_level', $result->ST_YEAR_LEVEL);
                    Session::put('student_strand', $result->ST_TRACK_STRAND);

                    Redirect::to('dashboard');
                } else {
                    Redirect::to('index', 'Email or Password is incorrect!', 'danger');
                }
            } else {
                Redirect::to('index', 'Email not found!', 'danger');
            }
        });
    }
}
