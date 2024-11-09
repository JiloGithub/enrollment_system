<?php

class ScheduleClass extends Database
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
    public function create_schedule()
    {
        Request::method('add-schedule', function () {


            $data = [
                'SC_INSTRUCTOR' => Input::Validate('instructor'),
                'SC_DAY' => Input::Validate('day'),
                'SC_FROM' => Input::Validate('from'),
                'SC_TO' => Input::Validate('to'),
                'SC_ROOM' => Input::Validate('room'),
                'SC_YEAR_LEVEL' => Input::Validate('year_level'),
            ];

            $query = $this->find('schedules', $this->where('SC_INSTRUCTOR', $data['SC_INSTRUCTOR']));
            if ($query->rowCount() > 0) {
                Redirect::to('admin/schedule', 'Instructor is already have!', 'warning');
            } else {
                $query = $this->save('schedules', $data);

                if ($query) {
                    Redirect::to('admin/schedule', 'Add Successfully!', 'success');
                } else {
                    Redirect::to('admin/schedule', 'Add Failed!', 'danger');
                }
            }
        });
    }
    public function fetch_schedule()
    {
        $query = $this->getAll('schedules');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function fetch_instructor()
    {
        $query = $this->getAll('instructors');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_schedule()
    {
        Request::method('update-schedule', function () {


            $data = [
                'SC_INSTRUCTOR' => Input::Validate('instructor'),
                'SC_DAY' => Input::Validate('day'),
                'SC_FROM' => Input::Validate('from'),
                'SC_TO' => Input::Validate('to'),
                'SC_ROOM' => Input::Validate('room'),
                'SC_YEAR_LEVEL' => Input::Validate('year_level'),
            ];

            $query = $this->find('schedules', $this->where('SC_INSTRUCTOR', $data['SC_INSTRUCTOR']));
            if ($query->rowCount() > 0) {
                Redirect::to('admin/schedule', 'Instructor is already have!', 'warning');
            } else {
                $query = $this->update('schedules', $data, $this->where('SCHEDULE_ID', Input::Validate('schedule_id')));

                if ($query) {
                    Redirect::to('admin/schedule', 'Update Successfully!', 'success');
                } else {
                    Redirect::to('admin/schedule', 'Update Failed!', 'danger');
                }
            }
        });
    }


    public function delete_schedule()
    {
        if (isset($_GET['delete_id'])) {
            $query = $this->delete('schedules', $this->where('SCHEDULE_ID', $_GET['delete_id']));
            if ($query) {
                Redirect::to('admin/schedule', 'Delete Successfully!', 'success');
            } else {
                Redirect::to('admin/schedule', 'Delete Failed!', 'danger');
            }
        }
    }
}
