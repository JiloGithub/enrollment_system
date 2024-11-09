<?php
include 'private/config/autoload.php';

Request::method('year_level', function () {


    if ($_POST['year_level'] == 'Grade 11' || $_POST['year_level'] == 'Grade 12') {
        $db = new Database();
        $query = $db->getAll('strands');

?>


        <label class="col-sm-2 col-form-label">Track/Strand :</label>
        <div class="col-sm-4 align-items-center d-flex">
            <select class="form-control form-select" name="strand">
                <option selected disabled hidden>-- Select --</option>

                <?php while ($row = $query->fetch(PDO::FETCH_OBJ)) : ?>
                    <option><?= $row->STRAND; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
<?php
    } else {
        return false;
    }
});

?>