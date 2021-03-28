<?php
include './configure.php';
$p_name=$_GET['p_name'];
$query=" delete from prob where p_name='$p_name' ";
$query=mysqli_query($con,$query);
if($query)
{
    echo "<script>alert('Deleted Successfully')</script>";
}
else
{
    echo "<script>alert('Error Occured')</script>";
}
header('location:show.php')
?>