<?php

class StudentListClass extends Database
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
    public function confirm_student()
    {
        Request::method('confirm-student', function () {


            $data = [
                'ST_STATUS' => 'Enrolled',
            ];
            $query = $this->update('students', $data, $this->where('STUDENT_ID', Input::validate('student_id')));

            if ($query) {
                Redirect::to('admin/new-enrollment', 'Confirm Successfully!', 'success');
            } else {
                Redirect::to('admin/new-enrollment', 'Confirm Failed!', 'danger');
            }
        });
    }
    public function fetch_students()
    {
        $query = $this->find('students', $this->where('ST_STATUS', 'Enrolled'));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
}
