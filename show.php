

<!DOCTYPE html>
<html>
<head><title>task 3</title></head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    body 
    {
        background: linear-gradient(to top, #003366 20%, #ffffcc 100%);
        height: 100vh;
    }
    table { 
    padding: 13px;
    border: 2px solid black;
    margin: 30px auto; 
    width:1150px;
    border-radius: 13px;
    background: linear-gradient(to top left, #33ccff 20%, #ff6699 100%);
    font-size: 20px;
    }
    th, td {
    text-align: center;
    padding: 3px;
    }
    .topnav {
    overflow: hidden;
    background-color: #333;
  }
  
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }
  
  .topnav a.active {
    background-color: #4CAF50;
    color: white;
  }
</style>
<body>
<div class="topnav">
  <a  href="home.php" target="bottom">Home</a>
  <a  href="insert.php" target="bottom">Insert</a>
  <a class="active" href="show.php" target="bottom">Show</a>
</div>
<table border="1" align="center">
<tr>
<th>Sr. No.</th>
<th>Problem name</th>
<th>Type</th>
<th>Rating</th>
<th>URL</th>
<th>Update</th>
<th>Delete</th> 
</tr>
<?php

include './configure.php';
// if(isset($_GET['submit1']))
// {
  
  $query="select * from prob";
  $query=mysqli_query($con,$query);
  $count=1;
  while($res= mysqli_fetch_array($query))
  {
     ?>
<tr>
      <td><?php echo $count?></td>
      <td><?php echo $res['p_name']?></td>
      <td><?php echo $res['type']?></td>
      <td><?php echo $res['rating']?></td>
      <td><a href=<?php echo $res['url']?> target="_blank">open</a></td>
      <td><a href=""><i class='material-icons'>edit</i></a></td>
      <td><a href="delete.php?p_name=<?php echo $res['p_name'];?>"><i class='material-icons'>delete</i></a></td> 
</tr>
<?php
$count++;
}
// }
?>
</table>
</body>
</html>