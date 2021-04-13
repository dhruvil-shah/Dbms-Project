<!DOCTYPE html>
<html>
<head><title>task 3</title></head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="insert.css">
<link rel="stylesheet" href="show.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
if(isset($_GET['submit'])){
  $query="select * from prob where ";
  if(isset($_GET['opt'])){
    $t=$_GET['opt'];
    foreach($t as $val){
        $query=$query."type like '%$val%' and ";
    }
    $query=substr($query, 0, -4);
    
  }
  if($_GET['rating']!=0){
      if(isset($_GET['opt']))
    $query=$query." and rating=".$_GET['rating'];
    else
    $query=$query."rating=".$_GET['rating'];

  }
  $query=$query.';';
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
      <td><a href="update.php?p_name=<?php echo $res['p_name'];?>"><i class='material-icons'>edit</i></a></td>
      <td><a href="delete.php?p_name=<?php echo $res['p_name'];?>"><i class='material-icons'>delete</i></a></td> 
</tr>
<?php
$count++;
  }
}
?>
