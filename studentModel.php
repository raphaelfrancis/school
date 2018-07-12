<?php
class studentModel
{
   private $host="localhost";
   private $user="root";
   private $pass="";
   public $db="college";

   public function connect()
   {
    $con = mysqli_connect($this->host,$this->user,$this->pass,$this->db); 
    return $con;
   }
  
   public function insertdata($table,$data)
   {
           $string = "INSERT INTO ".$table." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  

           if($insertdata=mysqli_query($this->connect(), $string))  
           {  
                return $insertdata;
           }  
           else  
           {  
                echo mysqli_error($this->con);  
           }   
  }

  public function deletedata($table,$studentid)
  {
       $deletequery = "DELETE FROM $table WHERE id ='$studentid'";

       $result = mysqli_query($this->connect(), $deletequery);

       return $result;
  }

  public function updatedata($table,$data,$updateid)
  {
        foreach($data as $key=>$val)
        {
           $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE id=".$updateid;

        $updateresult = mysqli_query($this->connect(), $sql);

        return $updateresult;

  }

  public function selectdata($table,$pagenumber)
  {
          $limitperpage = "4";

          $studentdata = array();  

          $query = "SELECT * FROM ".$table." "; 

          $norows = mysqli_query($this->connect(), $query);
		   
	  $count = mysqli_num_rows($norows);
		   
	  $pageoffset = $count/$limitperpage;

          $numberoflinks = ceil($pageoffset);

          $page1 = ($pagenumber-1)*$limitperpage;

          $result = "SELECT * FROM ".$table." limit $page1,$limitperpage"; 
		   
          $finalresult = mysqli_query($this->connect(), $result);
          while($row = mysqli_fetch_array($finalresult))  
          {
                $studentdata['data'][] = $row;
          } 
          $studentdata["offset"] = $numberoflinks;
          
          return $studentdata; 
  }

  public function singledata($table,$singleid)
  {
          $singledata = "select * from $table where id = '$singleid'";

          $result = mysqli_query($this->connect(), $singledata);

          while($row = mysqli_fetch_assoc($result))  
          {  
                $arrays[] = $row;
        }  
           return $arrays;
  }

  public function editsingledata($table,$singleid)
  {
          $singledata = "select * from $table where id = '$singleid'";

          $editresult = mysqli_query($this->connect(), $singledata);

          while($row = mysqli_fetch_assoc($editresult))  
           {  
                $editstudentdata[] = $row;  
           } 
           return $editstudentdata;
  }

}
?>