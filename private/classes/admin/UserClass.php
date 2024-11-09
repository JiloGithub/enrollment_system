<?php

class UserClass extends Database
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
    public function create_user()
    {
        Request::method('add-user', function () {


            $data = [
                'USERNAME' => Input::Validate('username'),
                'EMAIL' => Input::Validate('email'),
                'PASSWORD' => Hash::make(Input::Validate('password')),
                'STATUS' => 'Staff',
            ];


            $query = $this->save('users', $data);

            if ($query) {
                Redirect::to('admin/users', 'Add Successfully!', 'success');
            } else {
                Redirect::to('admin/users', 'Add Failed!', 'danger');
            }
        });
    }
    public function fetch_user()
    {
        $query = $this->find('users', $this->where('STATUS', 'Staff'));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_user()
    {
        Request::method('update-user', function () {

            $data = [
                'USERNAME' => Input::Validate('username'),
                'EMAIL' => Input::Validate('email'),
                'PASSWORD' => Hash::make(Input::Validate('password')),
            ];
            if (Input::Validate('password') == Input::Validate('c_password')) {
                $query = $this->update('users', $data, $this->where('USER_ID', Input::Validate('user_id')));

                if ($query) {
                    Redirect::to('admin/users', 'Update Successfully!', 'success');
                } else {
                    Redirect::to('admin/users', 'Update Failed!', 'danger');
                }
            } else {
                Redirect::to('admin/users', 'Password not match!', 'danger');
            }
        });
    }


    public function delete_user()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('users', $this->where('USER_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/users', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/users', 'Delete Failed!', 'danger');
            }
        }
    }
}
