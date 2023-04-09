<?php
session_start();
if($_SESSION['admin']=="")
{
    header("location:admin_login.php");
}
include "config.php";
include_once 'header_admin.php';
$error="";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
 $pname=$_POST['p_name'];
$pquantity=$_POST['p_qt'];
$psell=$_POST['p_sell'];
$plist=$_POST['p_list'];
$pcategory=$_POST['p_category'];
$uploadfile=$_FILES['image']['name'];
$tmpname=$_FILES['image']['tmp_name'];
$folder="img/$uploadfile";
move_uploaded_file($tmpname,$folder);

if($pname!="" && $pquantity!="" && $psell!="" && $plist!="" && $pcategory!="" && $folder!="")
{
    $query="INSERT INTO products VALUES ('','$pname','$folder','$pcategory','$psell','$plist','$pquantity')";
    $conn->query($query);
    $error .="<div class='alert alert-success'>Product inserted successfully !!!!</div>";
}
else{
    $error .="<div class='alert alert-danger'>Please fill all the fields !!!!</div>"; 
}
}
if(isset($_GET['action']) && $_GET['action']=='logout')
{
    session_unset();
    header("location:admin_login.php");
}
?>

    <!-- form -->
    <div class="container mt-5 w-50 p-5 rounded shadow lg" style="background-color:#ffd333;">
    <span class="text-danger"><?php echo $error;?></span>
        <form  method="post" class="text-white" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Product Name</label>
                    <input type="text" name="p_name" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Product Quantity</label>
                    <input type="text" name="p_qt" class="form-control form-control-sm">
                </div>
            </div>
            <div class="row">
                
                <div class="form-group col-md-6">
                    <label for="">Sell price</label>
                    <input type="text" name="p_sell" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-6">
                    <label for="">List price</label>
                    <input type="text" name="p_list" class="form-control form-control-sm">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Category</label>
                    <input type="text" name="p_category" class="form-control form-control-sm">
                </div>
            </div>
            <label for="customFile">Product Image</label>
            <input type="file"  name ="image" >
           
            <!-- <input type="submit" class="btn btn-sm text-white shadow bg-dark" value="Add product"> -->
         
            <button type="submit" class="btn btn-dark ">Add</button>
        </form>
    </div>
    <script>
//  $(".custom-file-input").on("change",function(){
//     var fileName=$(this).val().split("\\").pop();
//     $(this).siblings(".custom-file-label").addClass("selected").html(filename);
//  })
    </script>
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
</body>
</html>