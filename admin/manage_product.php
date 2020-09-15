<?php
   require('header.inc.php'); 
   $categories_id = '';
   $price = '';
   $qty = '';
   $image = '';
   $name = '';

 $msg = '';
if (isset($_GET['id']) && $_GET['id']!='' ){
      $id = get_safe_value($con, $_GET['id']);
      $result = mysqli_query($con, "select * from product where id='$id'");
      $check = mysqli_num_rows($result);
      if ($check > 0){
         $row = mysqli_fetch_assoc($result);
         // $categories = $row['categories'];
      }else{
         header('location:product.php'); // Redirect 
         die();
      }
 }


if (isset($_POST['submit'])){
   $categories_id = get_safe_value($con, $_POST['categories_id']);
   $name = get_safe_value($con, $_POST['name']);
   $price = get_safe_value($con, $_POST['price']);
   $qty = get_safe_value($con, $_POST['qty']);


   $result = mysqli_query($con, "select * from product where name='$name'");
   $check = mysqli_num_rows($result);
   if ($check > 0){
      if (isset( $_GET['id']) && $_GET['id']!='' ){
         $getData = mysqli_fetch_assoc($result);
         if ($id == $getData['id']){
            
         }else{
            $msg = "Product already exist!";
         }

      }else{
            $msg = "Product already exist!";
      }

   }

   if ($msg == ''){
      if (isset( $_GET['id']) && $_GET['id']!='' ){
         mysqli_query($con, "update product set categories_id='$categories_id',name='$name',price='$price',qty='$qty' where id='$id' ");
      }else{
         mysqli_query($con, "insert into product(categories_id, name,price,qty, status) values('$categories_id','$name','$price','$qty','1' )");
      }
      header('location:product.php'); // Redirect 
      die();
   }
}
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Product Form</strong> </div>
                        <form action="" method='POST'>
                           <div class="card-body card-block">
                             
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Categories</label>
                                 <select name="categories_id" class="form-control" id="">
                                    <option value="">Select Category</option>
                                    <?php
                                    $res = mysqli_query($con, "select id, categories from categories order by categories asc" );
                                             while( $row=mysqli_fetch_assoc($res) ){
                                                echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                             }
                                    ?>
                                 </select>
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Name</label>
                                 <input type="text" required name='name' placeholder="Enter product name" class="form-control" value="<?php echo $name ?>">
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Price</label>
                                 <input type="text" required name='price' placeholder="Enter product price" class="form-control" value="<?php echo $price ?>">
                              </div>


                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Quantity</label>
                                 <input type="text"  name='qty' placeholder="Enter product quantity" class="form-control" required value="<?php echo $qty ?>">
                              </div>


                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Image</label>
                                 <input type="file"  name='image'  class="form-control" >
                              </div>


                              <button id="payment-button" type="submit" name='submit' class="btn btn-lg btn-info btn-block">
                                 <span id="payment-button-amount">Add</span>
                              </button>
                              <div style='color:red'><?php echo $msg ?></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php
   require('footer.inc.php');
?>
