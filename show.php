

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
  <a href="about.php" target="bottom">About</a>
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
<th>Status</th> 
</tr>
<?php

include './configure.php';
if(!isset($_POST['submit1']))
{
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
      <td><a href="update.php?p_name=<?php echo $res['p_name'];?>"><i class='material-icons'>edit</i></a></td>
      <td><a href="delete.php?p_name=<?php echo $res['p_name'];?>"><i class='material-icons'>delete</i></a></td> 
      <?php
      if($res['status']=='on')
      echo "<td><span class='material-icons-outlined'><img src='./1x/ri.png' alt='Done'></span></td>" ;
      else
      echo "<td><span class='material-icons-outlined'><img src='./1x/wr.png
      ' alt='Done'></span></td>" ;
      ?>
</tr>
<?php
$count++;
  }
}
?>
</table>   
<form method="GET" action="show1.php">
  <!-- <input type="text" placeholder='Enter Problem name'name="p_name" id='sel' size="15"/> <br>    -->
  <select name='opt[]' id='sel' multiple>
    <option value="Array" >Array</option>
    <option value="String" >String</option>
    <option value="LinkedList" >Linked List</option>
    <option value="Stack and Queue" >Stack and Queue</option>
    <option value="Tree and BST" >Tree and BST</option>
    <option value="Heap" >Heap</option>
    <option value="Recursion" >Recursion</option>
    <option value="Hashing" >Hashing</option>
    <option value="Graph" >Graph</option>
<option value="Greedy" >Greedy</option>
<option value="Dynamic Programming" >Dynamic Programming</option>
<option value="Divide and Conquer">Divide and Conquer</option>
<option value="Backtracking" >Backtracking</option>
<option value="Bit Magic" >Bit Magic</option>
</select>   
<br>
<select name='rating' id='sel'>  
  <option value="0">Rating</option>    
  <option value="1">1</option>    
  <option value="2">2</option>  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>    
</select>
  <button style="margin:2px auto;width:130px" id='btn' class="btn" type="submit" name="submit" value="submit">Show</button>
  <br>
  <button id='btn' style="margin:2px auto;width:130px" type='reset'>Reset</button> 
</form>     
</body>
</html>