<?php

class LoginClass extends Database
{

    public function index()
    {
        Request::method('login', function () {


            $query = $this->find('users', $this->where('EMAIL', Input::Validate('email')));

            if ($result = $query->fetch(PDO::FETCH_OBJ)) {
                if (Hash::check(Input::Validate('password'), $result->PASSWORD)) {


                    Session::put('admin_id', $result->USER_ID);
                    Session::put('admin_status', $result->STATUS);
                    Session::put('admin_username', $result->USERNAME);
                    Session::put('admin_email', $result->EMAIL);
                    Session::put('admin_password', $result->PASSWORD);

                    Redirect::to('admin/dashboard.php');
                } else {
                    Redirect::to('admin/index.php', 'Email or Password is incorrect!', 'danger');
                }
            } else {
                Redirect::to('admin/index.php', 'Email not found!', 'danger');
            }
        });
    }
}
