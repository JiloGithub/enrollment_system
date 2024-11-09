<?php

class SubjectClass extends Database
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
    public function create_subject()
    {
        Request::method('add-subject', function () {


            $data = [
                'SUBJECT' => Input::Validate('subject'),
                'YEAR_LEVEL' => Input::Validate('year_level'),
                'UNIT' => Input::Validate('unit'),
            ];


            $query = $this->save('subjects', $data);

            if ($query) {
                Redirect::to('admin/subject', 'Add Successfully!', 'success');
            } else {
                Redirect::to('admin/subject', 'Add Failed!', 'danger');
            }
        });
    }
    public function fetch_subject()
    {
        $query = $this->getAll('subjects');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_subject()
    {
        Request::method('update-subject', function () {


            $data = [
                'SUBJECT' => Input::Validate('subject'),
                'YEAR_LEVEL' => Input::Validate('year_level'),
                'UNIT' => Input::Validate('unit'),
            ];


            $query = $this->update('subjects', $data, $this->where('SUBJECT_ID', Input::Validate('subject_id')));

            if ($query) {
                Redirect::to('admin/subject', 'Update Successfully!', 'success');
            } else {
                Redirect::to('admin/subject', 'Update Failed!', 'danger');
            }
        });
    }


    public function delete_subject()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('subjects', $this->where('SUBJECT_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/subject', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/subject', 'Delete Failed!', 'danger');
            }
        }
    }
}
