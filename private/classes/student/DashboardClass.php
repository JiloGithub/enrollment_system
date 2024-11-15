<?php

class DashboardClass extends Database
{

    public function index()
    {
        $this->student_auth();
    }
    public function student()
    {
        $query = $this->find('students', $this->where('STUDENT_ID', Session::get('student_id')));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function jhs_subjects()
    {
        $query = $this->find('subjects', $this->where('YEAR_LEVEL', Session::get('student_year_level')));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function shs_subjects_first_semester()
    {
        $query = $this->find('shs_subjects', $this->where('SEMESTER', 'First'), $this->where('YEAR_LEVEL', Session::get('student_year_level')));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function shs_subjects_second_semester()
    {
        $query = $this->find('shs_subjects', $this->where('SEMESTER', 'Second'), $this->where('YEAR_LEVEL', Session::get('student_year_level')));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
}
