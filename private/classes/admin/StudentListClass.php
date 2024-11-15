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
                Redirect::to('admin/new-enrollment.php', 'Confirm Successfully!', 'success');
            } else {
                Redirect::to('admin/new-enrollment.php', 'Confirm Failed!', 'danger');
            }
        });
    }
    public function fetch_all_students()
    {
        $query = $this->find('students', $this->where('ST_STATUS', 'Enrolled'));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function fetch_students()
    {
        $query = $this->find('students', $this->where('STUDENT_ID', $_GET['student_id']));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_info()
    {
        Request::method('update-info', function () {


            $data = [
                'ST_FNAME' => Input::validate('firstname'),
                'ST_LNAME' => Input::validate('lastname'),
                'ST_MI' => Input::validate('middlename'),
                'ST_EXT_NAME' => Input::validate('extension_name'),
                'ST_ADDRESS' => Input::validate('address'),
                'ST_GENDER' => Input::validate('gender'),
                'ST_BIRTHDATE' => Input::validate('birthdate'),
                'ST_CIVIL_STATUS' => Input::validate('civil_status'),
                'ST_PLACEBIRTH' => Input::validate('place_of_birth'),
                'ST_NATIONALITY' => Input::validate('nationality'),
                'ST_RELIGION' => Input::validate('religion'),
                'ST_CONTACT_NO' => Input::validate('contact_number'),
                'ST_GDNAME' => Input::validate('guardian'),
                'ST_GD_CONTACT_NO' => Input::validate('guardian_contact_number'),
            ];

            $query = $this->update('students', $data, $this->where('STUDENT_ID', $_GET['student_id']));

            if ($query) {
                Redirect::to('admin/view-student.php?student_id=' . $_GET['student_id'], 'Update Successfully!', 'success');
            } else {
                Redirect::to('admin/view-student.php?student_id=' . $_GET['student_id'], 'Update Failed!', 'danger');
            }
        });
    }
    public function dropped_student()
    {
        Request::method('dropped-student', function () {



            $data = [
                'ST_STATUS' => 'Dropped',
            ];
            $query = $this->update('students', $data, $this->where('STUDENT_ID', Input::validate('student_id')));

            if ($query) {
                Redirect::to('admin/student-list.php', 'Dropped student Successfully!', 'success');
            } else {
                Redirect::to('admin/student-list.php', 'Dropped student Failed!', 'danger');
            }
        });
    }
}
