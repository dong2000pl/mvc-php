<?php
class DBConfig
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname="ctmember";
    private $result= NULL;
    private $conn=NULL;

    public function connect()
    {
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if (!$this->conn) 
            {
                die("Connection failed: " . $this->conn->connect_error);
            }
            return $this->conn;
    }  
    public function execute($sql)
    {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    public function getData()
    {
        if($this->result)
        {
            $data = mysqli_fetch_array($this->result);
        }
        else
        {
            $data = 0;
        }
        return $data;
    }  

    public function getAllData($table)
    {
    $sql = "SELECT * FROM $table";
            $this->execute($sql);
             if($this->num_row() == 0){
                $datas = 0;
            }
            else
            {
                while($data = $this->getData())
                {
                    $datas[] = $data;
                }
            }
            return $datas;
    }

    public function insertData($name, $born, $address)
    {
        $sql = "INSERT INTO member(name, born, address) 
                VALUES('$name', '$born', '$address')";
                return $this->execute($sql);
    }

    public function updateMember($id, $name, $born, $address)
     {
        $sql = "UPDATE member SET name = '$name',birthday = '$birthday', country = '$country'
                WHERE id = $id";
                return $this->execute($sql);
    }

    public function delete($id,$table)
    {
        $sql = "DELETE FROM $table WHERE id = '$id'";
        return $this->execute($sql);
    }

     public function num_row(){
            if($this->result){
                $num = mysqli_num_rows($this->result);
            }
            else{
                $num = 0;
            }
            return $num;
        }
}
?>