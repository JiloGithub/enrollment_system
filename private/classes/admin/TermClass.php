<?php

class TermClass extends Database
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
    public function create()
    {
        Request::method('add-term', function () {


            $data = [
                'TERM' => Input::Validate('term'),
                'STATUS' => Input::Validate('status'),
                'DATE' => date('M d, Y'),
            ];


            $query = $this->save('term', $data);

            if ($query) {
                Redirect::to('admin/academic-term', 'Add Successfully!', 'success');
            } else {
                Redirect::to('admin/academic-term', 'Add Failed!', 'danger');
            }
        });
    }
    public function read()
    {
        $query = $this->getAll('term');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_term()
    {
        Request::method('update-term', function () {


            $data = [
                'TERM' => Input::Validate('term'),
                'STATUS' => Input::Validate('status'),
                'DATE' => date('M d, Y'),
            ];


            $query = $this->update('term', $data, $this->where('TERM_ID', Input::Validate('term_id')));

            if ($query) {
                Redirect::to('admin/academic-term', 'Update Successfully!', 'success');
            } else {
                Redirect::to('admin/academic-term', 'Update Failed!', 'danger');
            }
        });
    }
    public function delete_term()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('term', $this->where('TERM_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/academic-term', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/academic-term', 'Delete Failed!', 'danger');
            }
        }
    }
}
