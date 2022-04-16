<?php

/*
TODO:
    .write insert_user method
    .write check_user method
    .write update_password method
    .write delete_user method
*/
$path = realpath($_SERVER["DOCUMENT_ROOT"] . '\final-project\dataincludes\DataAccess.php');
require_once $path;

class LoginModel
{
    public $userName;
    public $pass;
    // public $permissionType;




    // function __construct($id, $password)
    // {
    //     $this->id = $id;
    //     $this->password = $password;
    // }

    function setuserName($userName)
    {
        $this->username = $userName;
    }
    function setPassword($pass)
    {
        $this->password = $pass;
    }
    // function permissionType($permissionType)
    // // {
    // //     $this-> permissionType = $permissionType
    // // }
    function setLoginInfo($userName, $pass)
    {

        $this->username = $userName;
        $this->password = $pass;
        // $this->permissionType = $permissionType;
    }



    function insertUser($userName, $pass)
    {
        //echo "i am in insert ";

        try {
            //this function will be needing to insert user in login table
            $sql = "insert into login (username,password,) values ('" . $userName . "','" . $pass . "',');";
            var_dump($sql);
            $db =  new DataAccess();

            $db->executeQuery($sql);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    // public function  deleteUser($id)
    // {
    //     try {
    //         //this function will be needing to insert user in login table
    //         $sql = "delete from login  where id='" . $id . "'";
    //         $db =  new DataAccess();
    //         $db->executeQuery($sql);
    //     } catch (Exception $e) {
    //         echo 'Caught exception: ',  $e->getMessage(), "\n";
    //     }
    // }

    public function getLatestAutoId() //this will get latest auto id of login table
    {
        $sql = "SELECT MAX(autoId) AS autoId FROM login";
        $db =  new DataAccess();
        $result = $db->getData($sql);


        while ($row = $result->fetch_assoc()) {
            $data =  $row['autoId'];
        }
        return $data;
    }


    function validateLogin($userName, $pass)
    {
        try {

            //echo $id . " " .  $password;
            //this method will find if the user exists or not
            $sql = "SELECT * FROM db_users WHERE username='" . $userName . "' AND password='" . $pass . "'";
            $db =  new DataAccess();
            $result = $db->getData($sql);
            

            //these are for testing 
            while ($row = mysqli_fetch_assoc($result)) {
            echo "username: " . $row["username"] . " - Pass: " . $row["password"] . "<br>";
            }


            echo "I am in validateLogin";

            if ($result->num_rows > 0) {
                echo "I am in row 1 er beshi";
            
                return 1;
            } else {
                return 2;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    // // function getPermissionType($userName, $pass)
    // // {
    // //     try {
    // //         //this method will find if the user exists or not
    // //         $sql = "SELECT permission FROM login WHERE username='" . $userName . "' AND password='" . $pass . "'";
    // //         $db =  new DataAccess();
    // //         $result = $db->getData($sql);
    // //         // if ($result->num_rows == 1) {

    // //         //     while ($row = $result->fetch_assoc())
    // //         //      {
    // //         //         $permissionType .=  $row['permission'] . ""; //don't put space between "" here. It ruined a lot of my time
    // //         //         // echo "permission " . $row["permission"];
    // //         //         //$permissionType = (string) $row["permission"];
    // //         //     }

    // //         //     //echo "I am in Permisson stuff";
    // //         //     //echo $permissionType;
    // //         //     //echo gettype($permissionType);
    // //         //     return $permissionType;
    // //         // } else {
    // //         //     return false;
    // //         // }
    // //     } 
    //     catch (Exception $e)
    //      {
    //         echo 'Caught exception: ',  $e->getMessage(), "\n";
    //     }
    // }

    public function changePassword($userName, $pass)
    {
        try
         {
            $sql = "UPDATE `login` SET `password`= '{$pass}' WHERE username = '{$userName}'";
            $db =  new DataAccess();

            $db->executeQuery($sql);
        } 
        catch (Exception $e)
         {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
