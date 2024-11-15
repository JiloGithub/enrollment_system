<?php

class SectionClass extends Database
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
    public function create_section()
    {
        Request::method('add-section', function () {


            $data = [
                'SECTION' => Input::Validate('section'),
                'YEAR_LEVEL' => Input::Validate('year_level'),
            ];


            $query = $this->save('sections', $data);

            if ($query) {
                Redirect::to('admin/section.php', 'Add Successfully!', 'success');
            } else {
                Redirect::to('admin/section.php', 'Add Failed!', 'danger');
            }
        });
    }
    public function fetch_section()
    {
        $query = $this->getAll('sections');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_section()
    {
        Request::method('update-section', function () {


            $data = [
                'SECTION' => Input::Validate('section'),
                'YEAR_LEVEL' => Input::Validate('year_level'),
            ];


            $query = $this->update('sections', $data, $this->where('SECTION_ID', Input::Validate('section_id')));

            if ($query) {
                Redirect::to('admin/section.php', 'Update Successfully!', 'success');
            } else {
                Redirect::to('admin/section.php', 'Update Failed!', 'danger');
            }
        });
    }


    public function delete_section()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('sections', $this->where('SECTION_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/section.php', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/section.php', 'Delete Failed!', 'danger');
            }
        }
    }

    public function fetch_program()
    {
        $query = $this->getAll('programs');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
}
