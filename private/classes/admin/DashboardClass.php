<?php

class DashboardClass extends Database
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
    public function total_of_enrolled()
    {
        $query = $this->find('students', $this->where('ST_STATUS', 'Enrolled'));
        $count = $query->rowCount();
        if ($count = $query->rowCount()) {
            return $count;
        } else {
            return false;
        }
    }
    public function total_of_dropped()
    {
        $query = $this->find('students', $this->where('ST_STATUS', 'Dropped'));
        $count = $query->rowCount();
        if ($count = $query->rowCount()) {
            return $count;
        } else {
            return false;
        }
    }
    public function total_of_instructor()
    {
        $query = $this->find('instructors', $this->where('STATUS', 'Active'));
        $count = $query->rowCount();
        if ($count = $query->rowCount()) {
            return $count;
        } else {
            return false;
        }
    }
    public function total_of_users()
    {
        $query = $this->find('users', $this->where('STATUS', 'Staff'));
        $count = $query->rowCount();
        if ($count = $query->rowCount()) {
            return $count;
        } else {
            return false;
        }
    }
}
