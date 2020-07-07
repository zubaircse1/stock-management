<?php
    $con = mysqli_connect('localhost','root', '','cmpi_db');
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con,$sql);
    $message = '';

    if(isset($_POST['btn']))
    {
//        print_r($_POST);
        $id= $_POST['id'];
        $category_name = $_POST['category_name'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $q = "UPDATE categories SET category_name='$category_name',description='$description', status='$status' WHERE id='$id'";
        $res = mysqli_query($con, $q);
        if($res===true)
        {
            $message = "Update Successful!";
            $sql = "SELECT * FROM categories";
            $result = mysqli_query($con,$sql);
        }
        else{
            $message = "Error";
        }
    }

    
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Show Category</h1>
        <br><br>
        <?php echo $message; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-sm table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php
            while($row = $result->fetch_assoc())
            {
                ?>
                <tr>
                    <td><?php echo  $row['id']; ?></td>
                    <td><?php echo  $row['category_name']; ?></td>
                    <td><?php echo  $row['description']; ?></td>
                    <td><?php echo  $row['status']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="index.php?id=category/edit-category&cat_id=<?php echo  $row['id']; ?>"> <span class="glyphicon glyphicon-edit"></span> </a>
                        <a class="btn btn-danger" href="index.php?id=category/delete-category&cat_id=<?php echo  $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php
            }
            $con->close();
            ?>
        </table>
    </div>
</div>