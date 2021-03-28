<?php
include './configure.php';
if(isset($_POST['submit']))
{
  $p_name=$_POST['problemname'];
  $url=$_POST['url'];
  $t=$_POST['opt'];
  $type='';
  foreach($t as $val)
     $type=$type.$val.",";
  $type = rtrim($type, ", ");
  $rat=$_POST['rating'];
  $query="insert into prob(p_name,url,type,rating) values('$p_name','$url','$type','$rat')";
  $res=mysqli_query($con,$query);
  if($res)
  {
    echo "<script> alert('Data Entered Successfully')</script>";
  }
  else
  {
    echo "<script> alert('Error occured while inserting Data')</script>";
  }
}
?>
<Html>  
<head>   
<title>  
Registration Page  
</title>  
</head> 
<link rel="stylesheet" href="insert.css"> 
<body bgcolor="Lightyellow">  
<div class="topnav">
  <a  href="home.php" target="bottom">Home</a>
  <a class="active" href="insert.php" target="bottom">Insert</a>
  <a href="show.php" target="bottom">Show</a>
</div>
<br>  
<br>  
<form action="insert.php" method="POST">  
<label> Problem name: </label>         
<input type="text" name="problemname" size="15"/> <br> <br>  
<label> URL: </label>     
<input type="url" name="url" id="url" placeholder="https://example.com" pattern="https://.*" size="60"required> <br> <br>  
<label>Problem type</label><br>
To multiple select:-<br>
For windows: Hold down the control (ctrl) button to select multiple options<br>
For Mac: Hold down the command button to select multiple options<br>
<select name='opt[]' multiple>
<option value="Array" >array</option>
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
<br>  
<label>   
Difficulty rating :  
</label>   
<select name='rating'>  
<option value="1">1</option>    
<option value="2">2</option>  
<option value="3">3</option>  
<option value="4">4</option>  
<option value="5">5</option>    
</select>  
<br>
<br>  
<button class="btn" type="submit" name="submit" value="submit">Submit</button>
<button type='reset'>Reset</button> 
</form>  
</body>  
</html>  