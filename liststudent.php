<?php
 

 include 'studentController.php';
 $studentdata = new studentController();

if(isset($_GET["page"]))
{
  
  $page = $_GET["page"];
  $listdata = $studentdata->getstudentdata($page);
  $pageoffset = $listdata["offset"];
  

}
else
{
  $page = 1;
  $listdata = $studentdata->getstudentdata($page);
  $pageoffset = $listdata["offset"];
}
?>

<html>
<head><h1><center>VIEW STUDENT DETAILS</center></h1></head>
<body>
   <table border=1>
      <tr><td>NAME</td><td>AGE</td><td>GENDER</td><td>ADDRESS</td><td>ROLL NO</td><td>ACTION</td></tr>
      <?php
      foreach($listdata['data'] as $data)
      {
        ?>
         <tr>
            <td><?php echo $data["Name"];?></td>
            <td><?php echo $data["age"];?></td>
            <td><?php echo $data["gender"];?></td>
            <td><?php echo $data["address"];?></td>
            <td><?php echo $data["rollno"];?></td>
            <td><a href="viewindividualdata.php?singleid=<?php echo $data["id"];?>">VIEW</a></td>
         </tr>
       <?php
      }
    
      ?>
   </table>
   
   <?php
      for($i=1;$i<=$pageoffset;$i++)
      {
      ?>
      <a href="liststudent.php?page=<?php echo $i;?>" style="text-decoration:none;"><?php echo $i;?></a>
      <?php
      }
   ?>
   <a href="view.php">BACK</a>
</body>
</html>