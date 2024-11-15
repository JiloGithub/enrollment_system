<?php

class GradesClass extends Database
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
    public function fetch_jhs_grades()
    {
        $query = $this->find('grades', $this->where('STUDENT_ID', Session::get('student_id')), $this->where('YEAR_LEVEL', Session::get('student_year_level')));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }


    public function first_semester()
    {
        $query = $this->find('shs_grades', $this->where('STUDENT_ID', Session::get('student_id')), $this->where('YEAR_LEVEL', Session::get('student_year_level')), $this->where('SEMESTER', 'First'));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function second_semester()
    {
        $query = $this->find('shs_grades', $this->where('STUDENT_ID', Session::get('student_id')), $this->where('YEAR_LEVEL', Session::get('student_year_level')), $this->where('SEMESTER', 'Second'));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
}
