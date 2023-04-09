<?php
include "config.php";
include_once "header_admin.php";

?>
<head>
    <style>
        table.table td .add{
            display:none;
        }
        </style>

</head>

<div class="container mt-5">
    <h6></h6>
    <div class="row">
        <a href="admin_insert_product.php" class="badge bg-primary text-white ml-auto p-2 mr-5">
            Add item
        </a>
        <table class="table text-center mt-1 table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Sale price</th>
                    <th>List price</th>
                    <th>Quantity</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <?php
            $query="SELECT * FROM products";
            $result=$conn->query($query);
            if($result->num_rows > 0)
            {
                while($rows = $result->fetch_assoc())
                {
                    $id= $rows['id'];
                    $image= $rows['image'];
                    $name=$rows['name'];
                    $category=$rows['category'];
                    $sale_price=$rows['sale_price'];
                    $list_price=$rows['list_price'];
                    $qty=$rows['quantity'];
            ?>
            <tbody>
                <tr>
                    <form method="POST"  enctype="multipart/form-data">
                        <!-- image -->
                        <td>
                            <img src="<?php echo $image?>" name="" class="" style="width:100px">
                        </td>
                        <!-- id -->
                        <td>
                            <input type="text" class="form-control form-control-sm" name="id" value="<?php echo $id;?>" disabled>
                        </td>
                        <!-- name -->
                        <td>
                            <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $name;?>" disabled>
                        </td>
                        <!-- category -->
                        <td>
                            <input type="text" class="form-control form-control-sm" name="category" value="<?php echo $category;?>" disabled>
                        </td>
                        <!-- sale price -->
                        <td>
                            <input type="text" class="form-control form-control-sm" name="sale_price" value="<?php echo $sale_price;?>" disabled>
                        </td>
                        <!-- list price -->
                        <td>
                            <input type="text" class="form-control form-control-sm" name="list_price" value="<?php echo $list_price;?>" disabled>
                        </td>
                        <!-- quantity -->
                        <td>
                            <input type="text" class="form-control form-control-sm" name="quantity" value="<?php echo $qty;?>" disabled>
                        </td>
                        <!-- action -->
                        <td>
                            <div class="btn-group">
                                <button type="submit" name="submit" class="add btn" title="save" data-toggle="tooltip">
                                    <a href="id=<?php echo $id?>">
                                    <i class="material-icons text-warning">Update</i>
                                    </a>
                                </button>
                </form>
                                    <a  class="edit btn" title="Edit" data-toggle="tooltip">
                                    <i class="material-icons text-warning">Edit</i>
                                    </a>
                                    <a  href="?action=delete&id=<?php echo $id;?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this data ?')">
                                    <i class="material-icons text-danger">Delete</i>
                                    </a>
                            </div>
                        </td>
                </tr>
            </tbody>
            <?php }} ?>
        </table>
    </div>

</div>
 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>