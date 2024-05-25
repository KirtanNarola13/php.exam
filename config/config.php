<?php
class Config
{
    public  $HOSTNAME = "127.0.0.1";
    public  $USERNAME = "root";
    public  $PASSWORD = "";
    public  $DATABASENAME = "kirtan";
    private $student = "students";
    private $language = "language";
    private $teacher = "teacher";
    public  $connect;

    public function connect()
    {
        $this->connect = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DATABASENAME);
        return $this->connect;
    }

    //insert student
    public function insertStudent($name, $age, $course)
    {

        $this->connect();
        $query = "INSERT INTO $this->student(name,age,course) values('$name', $age, '$course');";

        $res = mysqli_query($this->connect, $query);

        return $res;
    }
    //language insert
    public function insertLanguage($name)
    {

        $this->connect();
        $query = "INSERT INTO $this->language(name) values('$name');";

        $res = mysqli_query($this->connect, $query);

        return $res;
    }
    //teacher insert
    public function insertTeacher($name, $language_id)
    {

        $this->connect();
        $query = "INSERT INTO $this->teacher(name,language_id) values('$name',$language_id);";

        $res = mysqli_query($this->connect, $query);

        return $res;
    }
    //fatch student
    public function fatchStudent()
    {
        $this->connect();
        $query = "SELECT * FROM $this->student";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    public function fatchSingleStudent($id)
    {
        $this->connect();
        $query = "SELECT * FROM $this->student WHERE id = $id";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    //fatch language
    public function fatchLanguage()
    {
        $this->connect();
        $query = "SELECT * FROM $this->language";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    public function fatchSingleLanguage($id)
    {
        $this->connect();
        $query = "SELECT * FROM $this->language WHERE id = $id";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    //fatch teacher
    public function fatchTeacher()
    {
        $this->connect();
        $query = "SELECT * FROM $this->teacher";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    public function fatchSingleTeacher($id)
    {
        $this->connect();
        $query = "SELECT * FROM $this->teacher WHERE id = $id";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    //delete student
    public function deleteStudent($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->student WHERE id = $id";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    //delete language
    public function deleteLanguage($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->language WHERE id = $id";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    //delete teacher
    public function deleteTeacher($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->teacher WHERE id = $id";
        $res = mysqli_query($this->connect, $query);
        return $res;
    }
    //update student
    public function updateStudent($id, $name, $age, $course)
    {
        $this->connect();

        $singleStudent = $this->fatchSingleStudent($id);
        $result = mysqli_fetch_assoc($singleStudent);

        if ($result) {

            $query = "UPDATE $this->student SET name='$name',age=$age,course = '$course' WHERE id=$id;";

            $res = mysqli_query($this->connect, $query);

            return $res;
        } else {
            return false;
        }
    }
    //upate language
    public function updateLanguage($id, $name)
    {
        $this->connect();

        $languageData = $this->fatchSingleLanguage($id);
        $result = mysqli_fetch_assoc($languageData);

        if ($result) {

            $query = "UPDATE $this->language SET name='$name' WHERE id=$id;";

            $res = mysqli_query($this->connect, $query);

            return $res;
        } else {
            return false;
        }
    }
    //upate language
    public function updateTeacher($id, $name)
    {
        $this->connect();

        $teacherData = $this->fatchSingleTeacher($id);
        $result = mysqli_fetch_assoc($teacherData);

        if ($result) {

            $query = "UPDATE $this->teacher SET name='$name'  WHERE id=$id;";

            $res = mysqli_query($this->connect, $query);

            return $res;
        } else {
            return false;
        }
    }
}
