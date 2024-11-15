<?php

class UpdateInfoClass extends Database
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
    public function strand()
    {
        $query = $this->getAll('strands');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function update_student()
    {
        Request::method('update-info', function () {

            $file = new File;
            $file->file('profile');
            $image = $file->name();
            if ($file->file('profile') !== '') {
                if ($file->validate()) {
                    $data = [
                        'ST_PROFILE' => $image,
                        'ST_ADDRESS' => Input::validate('address'),
                        'ST_GENDER' => Input::validate('gender'),
                        'ST_BIRTHDATE' => Input::validate('birthdate'),
                        'ST_CIVIL_STATUS' => Input::validate('civil_status'),
                        'ST_PLACEBIRTH' => Input::validate('place_of_birth'),
                        'ST_NATIONALITY' => Input::validate('nationality'),
                        'ST_RELIGION' => Input::validate('religion'),
                        'ST_CONTACT_NO' => Input::validate('contact_number'),
                        'ST_GDNAME' => Input::validate('guardian'),
                        'ST_GD_CONTACT_NO' => Input::validate('guardian_contact_number'),
                        'ST_YEAR_LEVEL' => Input::validate('year_level'),
                        'ST_SEMESTER' => Input::validate('semester'),
                        'ST_TRACK_STRAND' => Input::validate('strand'),
                    ];

                    $query = $this->update('students', $data, $this->where('STUDENT_ID', Session::get('student_id')));

                    if ($query) {
                        $file->upload();
                        $file->delete(Input::Validate('current_profile'));
                        Session::put('student_profile', $data['ST_PROFILE']);
                        Session::put('student_year_level', $data['ST_YEAR_LEVEL']);
                        Redirect::to('update-info.php', 'Update Successfully!', 'success');
                    } else {
                        Redirect::to('update-info.php', 'Update Failed!', 'danger');
                    }
                }
            }
            $data = [
                'ST_PROFILE' => Input::Validate('current_profile'),
                'ST_ADDRESS' => Input::validate('address'),
                'ST_GENDER' => Input::validate('gender'),
                'ST_BIRTHDATE' => Input::validate('birthdate'),
                'ST_CIVIL_STATUS' => Input::validate('civil_status'),
                'ST_PLACEBIRTH' => Input::validate('place_of_birth'),
                'ST_NATIONALITY' => Input::validate('nationality'),
                'ST_RELIGION' => Input::validate('religion'),
                'ST_CONTACT_NO' => Input::validate('contact_number'),
                'ST_GDNAME' => Input::validate('guardian'),
                'ST_GD_CONTACT_NO' => Input::validate('guardian_contact_number'),
                'ST_YEAR_LEVEL' => Input::validate('year_level'),
                'ST_SEMESTER' => Input::validate('semester'),
                'ST_TRACK_STRAND' => Input::validate('strand'),
            ];

            $query = $this->update('students', $data, $this->where('STUDENT_ID', Session::get('student_id')));

            if ($query) {
                Session::put('student_profile', $data['ST_PROFILE']);
                Session::put('student_year_level', $data['ST_YEAR_LEVEL']);
                Redirect::to('update-info.php', 'Update Successfully!', 'success');
            } else {
                Redirect::to('update-info.php', 'Update Failed!', 'danger');
            }
        });
    }
}
