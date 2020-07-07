<?php
    $con = mysqli_connect('localhost','root', '','cmpi_db');
    $message = "";
    if(isset($_POST['btn']))
    {
        $category_name = $_POST['category_name'];
        $description = $_POST['description'];

        $sql = "INSERT INTO categories(category_name,description) VALUES('$category_name','$description')";
        $result = mysqli_query($con,$sql);
        if($result==true)
        {
            $message =  "Category Saved!";
        }
        else{
            $message = "Error : ".mysqli_error($con);
        }
        $con->close();
    }
?>

<div class="row">
    <div class="col-lg-12">
        <br>
        <p class="text-center text-success"><?php echo $message; ?></p>
        <h1 class="page-header">Add Category</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="category_name">Category Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" name="category_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Description:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" placeholder="Enter Description" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>