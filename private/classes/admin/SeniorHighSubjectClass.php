
<?php

class SeniorHighSubjectClass extends Database
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
                'SEMESTER' => Input::Validate('semester'),
                'STRAND' => Input::Validate('strand'),

            ];


            $query = $this->save('shs_subjects', $data);

            if ($query) {
                Redirect::to('admin/shs-subject.php', 'Add Successfully!', 'success');
            } else {
                Redirect::to('admin/shs-subject.php', 'Add Failed!', 'danger');
            }
        });
    }

    public function fetch_subject()
    {
        $query = $this->getAll('shs_subjects');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function fetch_strand()
    {
        $query = $this->getAll('strands');
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
                'SEMESTER' => Input::Validate('semester'),
                'STRAND' => Input::Validate('strand'),

            ];


            $query = $this->update('shs_subjects', $data, $this->where('SUBJECT_ID', Input::Validate('subject_id')));

            if ($query) {
                Redirect::to('admin/shs-subject.php', 'Update Successfully!', 'success');
            } else {
                Redirect::to('admin/shs-subject.php', 'Update Failed!', 'danger');
            }
        });
    }


    public function delete_subject()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('shs_subjects', $this->where('SUBJECT_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/shs-subject.php', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/shs-subject.php', 'Delete Failed!', 'danger');
            }
        }
    }
}
