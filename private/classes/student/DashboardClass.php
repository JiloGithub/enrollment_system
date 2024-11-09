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
    public function subjects()
    {
        $query = $this->find('subjects', $this->where('YEAR_LEVEL', Session::get('student_year_level')));
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
}
