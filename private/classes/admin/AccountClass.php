<?php

class AccountClass extends Database
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
    public function update_account()
    {
        Request::method('update', function () {




            if (Input::Validate('password') == '') {
                $data = [
                    'USERNAME' => Input::Validate('username'),
                ];
                $query = $this->update('users', $data, $this->where('USER_ID', Input::Validate('user_id')));

                if ($query) {
                    Session::put('username', $data['USERNAME']);
                    Redirect::to('admin/manage-account', 'Update Successfully!', 'success');
                } else {
                    Redirect::to('admin/manage-account', 'Update Failed!', 'danger');
                }
            } else {
                $data = [
                    'USERNAME' => Input::Validate('username'),
                    'PASSWORD' => Hash::make(Input::Validate('password')),
                ];

                if (Input::Validate('password') == Input::Validate('c_password')) {
                    $query = $this->update('users', $data, $this->where('USER_ID', Input::Validate('user_id')));

                    if ($query) {

                        Session::put('username', $data['USERNAME']);
                        Session::put('password', $data['PASSWORD']);
                        Redirect::to('admin/manage-account', 'Update Successfully!', 'success');
                    } else {
                        Redirect::to('admin/manage-account', 'Update Failed!', 'danger');
                    }
                } else {
                    Redirect::to('admin/manage-account', 'Password not match!', 'danger');
                }
            }
        });
    }
}
