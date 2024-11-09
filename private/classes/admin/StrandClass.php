<?php

class StrandClass extends Database
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
    public function create_strand()
    {
        Request::method('add-strand', function () {


            $data = [
                'STRAND' => Input::Validate('strand'),
                'DESCRIPTION' => Input::Validate('description'),
            ];


            $query = $this->save('strands', $data);

            if ($query) {
                Redirect::to('admin/strand', 'Add Successfully!', 'success');
            } else {
                Redirect::to('admin/strand', 'Add Failed!', 'danger');
            }
        });
    }
    public function fetch_strand()
    {
        $query = $this->getAll('strands');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_strand()
    {
        Request::method('update-strand', function () {


            $data = [
                'STRAND' => Input::Validate('strand'),
                'DESCRIPTION' => Input::Validate('description'),
            ];


            $query = $this->update('strands', $data, $this->where('STRAND_ID', Input::Validate('strand_id')));

            if ($query) {
                Redirect::to('admin/strand', 'Update Successfully!', 'success');
            } else {
                Redirect::to('admin/strand', 'Update Failed!', 'danger');
            }
        });
    }


    public function delete_strand()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('strands', $this->where('STRAND_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/strand', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/strand', 'Delete Failed!', 'danger');
            }
        }
    }
}
