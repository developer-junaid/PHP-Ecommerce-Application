<?php
   require('header.inc.php'); 
   $name = '';
   $price = '';
   $qty = '';
   $image = '';
   $msg = '';
   $image_required = 'required';





   // Edit Categories login
   if (isset( $_GET['id']) && $_GET['id']!='' ){
      $image_required = '';
      $id = get_safe_value($con, $_GET['id']);
      $result = mysqli_query($con, "select * from product where id='$id'");
      $check = mysqli_num_rows($result);

      if ($check > 0){
         $row = mysqli_fetch_assoc($result);
         
         $name = $row['name'];
         $price = $row['price'];
         $qty = $row['qty'];
         


      }else{
         header('location:product.php'); // Redirect 
         die();
      }
   }

   // Add Product Login
   if (isset($_POST['submit'])){
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

      

      // IMAGE VALIDATION
      if ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'  ){
         $msg = 'Please select only png, jpg and jpeg image';
      }


      if ($msg == ''){

         if (isset( $_GET['id']) && $_GET['id']!='' ){
            if ($_FILES['image']['name'] != ''){
                 // Image coding
            $image = rand(111111111, 999999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            $update_sql = "update product set name='$name',price='$price',qty='$qty',image='$image' where id='$id' ";
            }else{
               $update_sql = "update product set name='$name',price='$price',qty='$qty' where id='$id' ";
            }

            mysqli_query($con, $update_sql);
         }else{
      
            // Image coding
            $image = rand(111111111, 999999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);


      
            mysqli_query($con, "insert into product(name, price, qty, image, status) values('$name','$price','$qty','$image',1 )");
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
                       
                        <form action="" method='POST' enctype='multipart/form-data' >
                           <div class="card-body card-block">
                             
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Name</label>
                                 <input type="text" id="categories" required name='name' placeholder="Enter product name" class="form-control" value=" <?php echo $name ?> ">
                              </div>
                          
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Price</label>
                                 <input type="text" id="categories" required name='price' placeholder="Enter product price" class="form-control" value=" <?php echo $price ?> ">
                              </div>
                          
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Quantity</label>
                                 <input type="text" id="categories" required name='qty' placeholder="Enter product quantity" class="form-control" value=" <?php echo $qty ?> ">
                              </div>
                          
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Image</label>
                                 <input type="file" id="categories"  name='image'  class="form-control" <?php echo $image_required ?> >
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
