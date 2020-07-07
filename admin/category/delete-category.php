<?php
$cat_id = $_GET['cat_id'];
$con = mysqli_connect('localhost','root', '','cmpi_db');
$sql = "DELETE FROM categories WHERE id='$cat_id'";
$result = mysqli_query($con,$sql);
if($result===true)
{
    echo "<h1 class='text-success text-center'>Record Deleted Successfully!</h1>";
}
else{
    echo "Error!";
}
$con->close();
?>
<a class="btn btn-primary" href="index.php?id=category/show-category">Back to Category List</a>
