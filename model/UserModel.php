<?php


$path = realpath($_SERVER["DOCUMENT_ROOT"] . '\final-project\dataincludes\DataAccess.php');
require_once $path;
class UserModel
{


    
    public $firstname;
    public $lastname;
    public $gender;
    public $dob;
    public $phone;
    public $email;
    public $userName;
    public $pass;

    public function setUserInformation($firstname, $lastname,$gender,$dob, $phone,$email,$userName,$pass)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
        $this->dob = $dob ;
        $this->phone = $phone;
        $this->email = $email;
        $this->username = $userName;
        $this ->pass = $pass; 
        
    }

    function insertUser($firstname ,$lastname,$gender,$dob, $phone, $email, $userName, $pass )
    {

        try {
            //this function will be needing to insert user in login table

            $sql1 = "SELECT * from db_users WHERE username = '" . $userName . "';";
            echo "sql running ". $sql1;
            $db =  new DataAccess();
            // Check if same username exists or not
            $result =  $db->getData($sql1);

            $count=$result->num_rows;
            echo "COUTN IS HERE";
            echo $count;
            echo "COUTN IS HERE";
            if ($count > 0)
            {
                return 2;
            }
            else{
                $sql = "INSERT INTO db_users (firstname,lastname,gender,dob,phone,email,username,password) 
                    VALUES ('" . $firstname . "','" . $lastname . "','" . $gender . "','" . $dob . "','" . $phone . "','" . $email . "','" . $userName . "','" . $pass . "')";
                $db2 =  new DataAccess();
                $db2->executeQuery($sql);
                return 1;
                
            }
            while ($row = $result->fetch_assoc()) {
                echo "---------------";
                echo $row['classtype']."<br>";
            }


            
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    function deleteUser($userName)
    {

        try {
            //this function will be needing to insert user in login table
            $sql = "delete from db_user  where username='" . $userName . "'";
            $db =  new DataAccess();
            $db->executeQuery($sql);
            $sql1 = "delete from login  where username='" . $userName . "'";
            var_dump($sql1);
            $db1 =  new DataAccess();
            $db1->executeQuery($sql1);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function getTotalNumberOfUser()
    {
        $sql = "SELECT * FROM user";
        $db = new DataAccess();

        $result = $db->getData($sql);

        return $result->num_rows;
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM db_user";
        $db = new DataAccess();

        $result = $db->getData($sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $db_users[] =  array(
                    "firstname" => $row["firstname"],
                    "lastname" => $row["lastname"],
                    "gender" => $row["gender"],
                    "email" => $row["email"],
                    "dob" => $row["date of birth"],
                    "phone" => $row["phone"],
                    "username" => $row["username"],
                    "pass" => $row["pass"]
                );
            }
            return $db_users;
        } else {
            echo "0 results";
        }
    }
}
