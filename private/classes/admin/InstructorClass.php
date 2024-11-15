<?php

class InstructorClass extends Database
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
    public function create_instructor()
    {
        Request::method('add-instructor', function () {


            $data = [
                'INSTRUCTOR' => Input::Validate('instructor'),
                'MOBILE_NO' => Input::Validate('mobile_no'),
            ];


            $query = $this->save('instructors', $data);

            if ($query) {
                Redirect::to('admin/instructor.php', 'Add Successfully!', 'success');
            } else {
                Redirect::to('admin/instructor.php', 'Add Failed!', 'danger');
            }
        });
    }
    public function fetch_instructor()
    {
        $query = $this->getAll('instructors');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_instructor()
    {
        Request::method('update-instructor', function () {


            $data = [
                'INSTRUCTOR' => Input::Validate('instructor'),
                'MOBILE_NO' => Input::Validate('mobile_no'),
                'STATUS' => Input::Validate('status'),
            ];


            $query = $this->update('instructors', $data, $this->where('INSTRUCTOR_ID', Input::Validate('instructor_id')));

            if ($query) {
                Redirect::to('admin/instructor.php', 'Update Successfully!', 'success');
            } else {
                Redirect::to('admin/instructor.php', 'Update Failed!', 'danger');
            }
        });
    }


    public function delete_instructor()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('instructors', $this->where('INSTRUCTOR_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/instructor.php', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/instructor.php', 'Delete Failed!', 'danger');
            }
        }
    }
}
