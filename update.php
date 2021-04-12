<?php
include './configure.php';
if(isset($_POST['submit']))
{
    $p_name=$_POST['p_name'];
    $url=$_POST['url'];
    $t=$_POST['opt'];
    $type='';
    foreach($t as $val)
       $type=$type.$val.",";
    $type = rtrim($type, ", ");
    $rat=$_POST['rating'];
    $query="update prob set url='$url',type='$type',rating='$rat' where p_name='$p_name' ";
    $res=mysqli_query($con,$query);
    if($res)
    echo '<script>Successfully Updated</script>';
    else
    echo '<script>Error Occured while updating</script>';
    header('location:show.php');
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
    <!-- <div class="topnav">
  <a  href="home.php" target="bottom">Home</a>
  <a class="active" href="insert.php" target="bottom">Insert</a>
  <a href="show.php" target="bottom">Show</a>
</div> -->
    <br>
    <br>
        <?php
           if(isset($_GET['p_name'])){
               $p_name = $_GET['p_name'];
               $query = "select * from prob where p_name='$p_name' ";
               $query = mysqli_query($con, $query);
               $query = mysqli_fetch_array($query);
               $url = $query['url'];
               $rat = $query['rating'];
               $type = $query['type'];
               $arr = explode(",", $type, 5);
               $total = [
                   'Array', 'String', 'LinkedList', 'Stack and Queue', 'Tree and BST', 'Heap', 'Recursion', 'Hashing', 'Graph', 'Greedy', 'Dynamic Programming', 'Divide and Conquer', 'Backtracking', 'Bit Magic'
                ];
            }
        ?>
        <form action="update.php" method="POST">

        <h3> Problem name:<?php echo $query['p_name']; ?></h3>
        <input style="display: none;" type="text"  name="p_name" size="15" value="<?php echo $query['p_name']; ?>" /> <br> <br>
        <label> URL: </label>
        <input type="url" name="url" id="url" placeholder="https://example.com" pattern="https://.*" size="60" required value="<?php echo $query['url']; ?>"> <br> <br>
        <label>Problem type</label><br>
        To multiple select:-<br>
        For windows: Hold down the control (ctrl) button to select multiple options<br>
        For Mac: Hold down the command button to select multiple options<br>
        <select name='opt[]' multiple>
           <?php
           for ($i=0; $i <count($total) ; $i++) { 
               if(in_array($total[$i],$arr))
               echo "<option value=$total[$i] selected>$total[$i]</option>";
               else
               echo "<option value=$total[$i]> $total[$i] </option>";

           }
           ?>
        </select>
        <br>
        <br>
        <label>
            Difficulty rating :
        </label>
        <select name='rating'>
            <?php
            for ($i = 1; $i <= 5; $i++) {
                if ($rat == $i)
                    echo "<option value=$i selected>$i</option>";
                else
                    echo "<option value=$i>$i</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <button class="btn" type="submit" name="submit" value="submit">Update</button>
    </form>
    
</body>
</html>





<!-- <select name='opt[]' multiple>
           //<?php
           //for ($i=0; $i <count($total) ; $i++) { 
               //if(str_contains($type,$total[$i]))
               //echo "<option value='$total[$i]' selected>$total[$i]</option>";
               //else
              // echo "<option value='$total[$i]'> $total[$i] </option>";
               
            //}
            //?>
        </select> -->