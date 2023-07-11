<?php


class CreateDb
{
    public $servername; 
    public $username;
    public $password;
    public $bdname;
    public $tablename;
    public $con;


    //Class constructor
    public function __construct(
        $dbname="Newdb",
    $tablename="Productdb",
    $servername="localhost",
    $username="root",
    $password=""
    )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

    //Create conenction
    $this->con = mysqli_connect($servername, $username, $password);

    //Check connection
    if (!$this->con){
        die("Connection failed:".mysqli_connect_error());
    }

    //Query
    $sql="CREATE DATABASE IF NOT EXISTS $dbname";

    //Execute query
    if (mysqli_query($this->con, $sql)){

        $this->con = mysqli_connect($servername, $username, $password, $dbname);

        //sql to create a new table
        $sql="CREATE TABLE IF NOT EXISTS $tablename
              (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
               title VARCHAR (25) NOT NULL,
               description VARCHAR(100),
               product_oldprice INT,
               product_price INT,
               category VARCHAR(25),
               stock INT,
               img VARCHAR(100)
              
               
               
               );";
        if(!mysqli_query($this->con, $sql)){

            echo "Error creating table:" .mysqli_error($this->con);
        }
        }else{
            return false;
        }
    }

        //get product from the database
        public function getData(){
            $sql = "SELECT * FROM  $this->tablename";

            $result = mysqli_query($this->con, $sql);

            if (mysqli_num_rows($result) > 0){
                return $result;
            }
        }
    }

