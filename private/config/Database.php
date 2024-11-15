<?php


class Database
{
    protected $localhost = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "enrollment_system_db";
    protected $conn;


    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->localhost;dbname=$this->database", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function admin_auth()
    {
        if (!isset($_SESSION["admin_id"])) {
            header('location:index.php');
            exit;
        }
    }
    public function student_auth()
    {
        if (!isset($_SESSION["student_id"])) {
            header('location:index.php');
            exit;
        }
    }

    public function getAll($TableName)
    {
        $sql = "SELECT * FROM `$TableName`";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function save($TableName, $data)
    {
        $column = implode(',', array_keys($data));
        $placeholder = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO `$TableName` (" . $column . ") VALUES (" . $placeholder . ")";

        // return $sql;
        $stmt = $this->conn->prepare($sql);
        $i = 1;
        foreach ($data as $value) {
            $stmt->bindValue($i, $value);
            $i++;
        }

        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }



    public function update($TableName, $data, $WhereClause, $WhereClause2 = null)
    {


        $sql = "UPDATE `$TableName` SET ";
        $columns = [];

        foreach ($data as $column => $value) {
            $columns[] = "$column = ?";
        }
        $sql .= implode(', ', $columns);
        $sql .= " WHERE " . $WhereClause . "";

        if ($WhereClause2 !== null) {
            $sql .= " AND " . $WhereClause2 . "";
        }


        $stmt = $this->conn->prepare($sql);
        $i = 1;
        foreach ($data as $column => $value) {
            $stmt->bindValue($i, $value);
            $i++;
        }
        $stmt->execute();
        return $stmt;
    }

    public function delete($TableName, $WhereClause)
    {

        $sql = "DELETE FROM `$TableName` WHERE $WhereClause";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function find($TableName, $data, $data2 = null, $data3 = null, $data4 = null, $data5 = null)
    {
        $sql = "SELECT * FROM `$TableName` WHERE $data";

        if ($data2 !== null) {
            $sql .= " AND $data2";
        }

        if ($data3 !== null) {
            $sql .= " AND $data3";
        }
        if ($data4 !== null) {
            $sql .= " AND $data4";
        }
        if ($data5 !== null) {
            $sql .= " AND $data5";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function where($column, $data)
    {
        return $column . ' = ' . "'" . $data . "'";
    }
    public function left_join($table1, $table2, $matching, $WhereClause = null)
    {
        $sql = "SELECT * FROM $table1 LEFT JOIN $table2 ON $matching";
        if ($WhereClause !== null) {
            $sql .= " WHERE $WhereClause";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}
