<?php

class ProgramClass extends Database
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
    public function create_program()
    {
        Request::method('add-program', function () {


            $data = [
                'PROGRAM' => Input::Validate('program'),
                'DESCRIPTION' => Input::Validate('description'),
            ];


            $query = $this->save('programs', $data);

            if ($query) {
                Redirect::to('admin/program.php', 'Add Successfully!', 'success');
            } else {
                Redirect::to('admin/program.php', 'Add Failed!', 'danger');
            }
        });
    }
    public function fetch_program()
    {
        $query = $this->getAll('programs');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_program()
    {
        Request::method('update-program', function () {


            $data = [
                'PROGRAM' => Input::Validate('program'),
                'DESCRIPTION' => Input::Validate('description'),
            ];


            $query = $this->update('programs', $data, $this->where('PROGRAM_ID', Input::Validate('program_id')));

            if ($query) {
                Redirect::to('admin/program.php', 'Update Successfully!', 'success');
            } else {
                Redirect::to('admin/program.php', 'Update Failed!', 'danger');
            }
        });
    }


    public function delete_program()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('programs', $this->where('PROGRAM_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/program.php', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/program.php', 'Delete Failed!', 'danger');
            }
        }
    }
}
