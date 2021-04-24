<!DOCTYPE html
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>home page</title>
    <link rel="stylesheet" href="home.css">
    <style>
  .image
  {
  
  width: 160px;
  height: 160px;
  display: block;
  margin: 13px auto;
}
input{
  width: 250px;
  height: 30px;
  border-radius: 13px ;
  display: block;
  margin: 15px auto;
  color: black;
  font-size: 22px;
  padding: 23px;
  text-align: center;
}
#solved{
  height: 75px; 
  width:150px;
  text-align: center;
  display: block;
  margin: 15px auto;
  font-size: 30px;
}
    </style>
</head>
<body>
<div class="topnav">
  <a class="active" href="home.php" target="bottom">Home</a>
  <a href="insert.php" target="bottom">Insert</a>
  <a href="show.php" target="bottom">Show</a>
  <a href="about.php" target="bottom">About Us</a>
</div>
<img src="person.png" class="image" alt="Profile Picture">
<input type="text" disabled  id="fname">
<input type="text" disabled   id="lname">
<!-- <input type="text" disabled value="2019-2023"> -->
<input type="text" value="Nirma University"disabled>
<?php
include './configure.php';
$query="select * from prob";
  $query=mysqli_query($con,$query);
  $cn=0;
  $cp=0;
  while($res= mysqli_fetch_array($query))
  {
    if($res['status']==="on"){
      $cp++;
    }else
    $cn++;
  }
  $c=$cn+$cp;
echo "<input type='text'  id='solved' value='{$cp}/{$c}' disabled>";


?>
<script>
  let fname=localStorage.getItem('fname');
  let lname=localStorage.getItem('lname');
  document.querySelector('#fname').value=fname;
  document.querySelector('#lname').value=lname;
</script>
</body>
</html>