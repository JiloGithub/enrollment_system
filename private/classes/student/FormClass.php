<?php

class FormClass extends Database
{


    public function fetch_term()
    {
        $query = $this->getAll('term');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return isset($data) ? $data : false;
    }
    public function create_student()
    {
        Request::method('enrol_now', function () {


            $file = new File;
            $file->file('profile');
            $image = $file->name();
            if ($file->validate()) {

                $data = [
                    'ST_FNAME' => Input::validate('firstname'),
                    'ST_LNAME' => Input::validate('lastname'),
                    'ST_MI' => Input::validate('middlename'),
                    'ST_EXT_NAME' => Input::validate('extension_name'),
                    'ST_PROFILE' => $image,
                    'ST_ADDRESS' => Input::validate('address'),
                    'ST_GENDER' => Input::validate('gender'),
                    'ST_BIRTHDATE' => Input::validate('birthdate'),
                    'ST_AGE' => Input::validate('age'),
                    'ST_CIVIL_STATUS' => Input::validate('civil_status'),
                    'ST_PLACEBIRTH' => Input::validate('place_of_birth'),
                    'ST_NATIONALITY' => Input::validate('nationality'),
                    'ST_RELIGION' => Input::validate('religion'),
                    'ST_EMAIL' => Input::validate('email'),
                    'ST_CONTACT_NO' => Input::validate('contact_number'),
                    'ST_GDNAME' => Input::validate('guardian'),
                    'ST_GD_CONTACT_NO' => Input::validate('guardian_contact_number'),
                    'ST_YEAR_LEVEL' => Input::validate('year_level'),
                    'ST_SCHOOL_YEAR' => Input::validate('school_year'),
                    'ST_TRACK_STRAND' => Input::validate('strand'),
                    'ST_USERNAME' => Input::validate('username'),
                    'ST_PASSWORD' => Hash::make(Input::validate('password')),
                ];
                $query = $this->find('students', $this->where('ST_FNAME', $data['ST_FNAME']), $this->where('ST_LNAME', $data['ST_LNAME']), $this->where('ST_MI', $data['ST_MI']), $this->where('ST_EXT_NAME', $data['ST_EXT_NAME']));
                if ($query->rowCount() > 0) {
                    Redirect::to('enrollment-form', 'This Student is already exist!', 'warning');
                } else {
                    $query = $this->find('students', $this->where('ST_EMAIL', $data['ST_EMAIL']));
                    if ($query->rowCount() > 0) {
                        Redirect::to('enrollment-form', 'Email is already exist!', 'warning');
                    } else {

                        $query = $this->save('students', $data);
                        if ($query) {
                            $file->upload();
                            Redirect::to('index', 'Fill up successfully!', 'success');
                        } else {
                            Redirect::to('enrollment-form', 'Fill up failed!', 'danger');
                        }
                    }
                }
            }
        });
    }
}
