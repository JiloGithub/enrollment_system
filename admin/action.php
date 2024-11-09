<?php
// include '../private/config/autoload.php';

if (isset($_GET['delete_id'])) {
    // $query = $this->delete('term', $this->where('TERM_ID', $_GET['delete_id']));
    if ($query) {
        echo json_encode(array('status' => 200));
        return false;
    }
}
