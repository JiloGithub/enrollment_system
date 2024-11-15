<?php

class ViewRecordClass extends Database
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
    public function fetch_student()
    {

        $query = $this->find('students', $this->where('STUDENT_ID', $_GET['student_id']));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function fetch_jhs_subject()
    {

        $query = $this->find('subjects', $this->where('YEAR_LEVEL', $_GET['year_level']));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function fetch_shs_subject()
    {
        if (isset($_GET['semester']) && isset($_GET['strand'])) {
            $query = $this->find('shs_subjects', $this->where('YEAR_LEVEL', $_GET['year_level']), $this->where('SEMESTER', $_GET['semester']), $this->where('STRAND', $_GET['strand']));
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
        }

        return isset($data) ? $data : false;
    }
    public function jhs_fetch_grades()
    {

        $query = $this->find('grades', $this->where('STUDENT_ID', $_GET['student_id']), $this->where('YEAR_LEVEL', $_GET['year_level']));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function shs_fetch_grades()
    {
        if (isset($_GET['semester'])) {
            $query = $this->find('shs_grades', $this->where('STUDENT_ID', $_GET['student_id']), $this->where('YEAR_LEVEL', $_GET['year_level']), $this->where('SEMESTER', $_GET['semester']));
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
        }

        return isset($data) ? $data : false;
    }
    public function add_jhs_grades()
    {
        Request::method('add-jhs-record', function () {


            $data = [
                'STUDENT_ID' => Input::Validate('student_id'),
                'SUBJECT_NAME' => Input::Validate('subject'),
                'FIRST_GRADING' => Input::Validate('1st_grading'),
                'SECOND_GRADING' => Input::Validate('2nd_grading'),
                'THIRD_GRADING' => Input::Validate('3rd_grading'),
                'FOURTH_GRADING' => Input::Validate('4th_grading'),
                'FINAL' => Input::Validate('final_grade'),
                'REMARKS' => Input::Validate('remarks'),
                'YEAR_LEVEL' => Input::Validate('year_level'),
            ];

            $query = $this->find('grades', $this->where('STUDENT_ID', $data['STUDENT_ID']), $this->where('SUBJECT_NAME', $data['SUBJECT_NAME']), $this->where('YEAR_LEVEL', $data['YEAR_LEVEL']));
            if ($query->rowCount() > 0) {
                Redirect::to('admin/view-record.php?student_id=' . $data['STUDENT_ID'] . '&year_level=' . $data['YEAR_LEVEL'], 'Record has already placed!', 'warning');
            } else {
                $query = $this->save('grades', $data);

                if ($query) {
                    Redirect::to('admin/view-record.php?student_id=' . $data['STUDENT_ID'] . '&year_level=' . $data['YEAR_LEVEL'], 'Added record Successfully!', 'success');
                } else {
                    Redirect::to('admin/view-record.php?student_id=' . $data['STUDENT_ID'] . '&year_level=' . $data['YEAR_LEVEL'], 'Added record Failed!', 'danger');
                }
            }
        });
    }
    public function add_shs_grades()
    {
        Request::method('add-shs-record', function () {


            $data = [
                'STUDENT_ID' => Input::Validate('student_id'),
                'SUBJECT' => Input::Validate('subject'),
                'FIRST_GRADING' => Input::Validate('1st_grading'),
                'SECOND_GRADING' => Input::Validate('2nd_grading'),
                'FINAL' => Input::Validate('final_grade'),
                'REMARKS' => Input::Validate('remarks'),
                'YEAR_LEVEL' => Input::Validate('year_level'),
                'SEMESTER' => Input::Validate('semester'),
                'STRAND' => Input::Validate('strand'),
            ];

            $query = $this->find('shs_grades', $this->where('STUDENT_ID', $data['STUDENT_ID']), $this->where('SUBJECT', $data['SUBJECT']), $this->where('YEAR_LEVEL', $data['YEAR_LEVEL']), $this->where('SEMESTER', $data['SEMESTER']));
            if ($query->rowCount() > 0) {
                Redirect::to('admin/view-record.php?student_id=' . $data['STUDENT_ID'] . '&year_level=' . $data['YEAR_LEVEL'] . '&semester=' . $data['SEMESTER'] . '&strand=' . $data['STRAND'], 'Record has already placed!', 'warning');
            } else {
                $query = $this->save('shs_grades', $data);

                if ($query) {
                    Redirect::to('admin/view-record.php?student_id=' . $data['STUDENT_ID'] . '&year_level=' . $data['YEAR_LEVEL'] . '&semester=' . $data['SEMESTER'] . '&strand=' . $data['STRAND'], 'Added record Successfully!', 'success');
                } else {
                    Redirect::to('admin/view-record.php?student_id=' . $data['STUDENT_ID'] . '&year_level=' . $data['YEAR_LEVEL'] . '&semester=' . $data['SEMESTER'] . '&strand=' . $data['STRAND'], 'Added record Failed!', 'danger');
                }
            }
        });
    }
}
