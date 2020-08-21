<?php
   require('header.inc.php'); 
   $categories = '';
   $msg = '';

   // Edit Categories login
   if (isset( $_GET['id']) && $_GET['id']!='' ){
      $id = get_safe_value($con, $_GET['id']);
      $result = mysqli_query($con, "select * from categories where id='$id'");
      $check = mysqli_num_rows($result);

      if ($check > 0){
         $row = mysqli_fetch_assoc($result);
         $categories = $row['categories'];
      }else{
         header('location:categories.php'); // Redirect 
         die();
      }


     

   }

   // Add Categories Login
   if (isset($_POST['submit'])){
      $categories = get_safe_value($con, $_POST['categories']);

      $result = mysqli_query($con, "select * from categories where categories='$categories'");
      $check = mysqli_num_rows($result);

      if ($check > 0){
         if (isset( $_GET['id']) && $_GET['id']!='' ){
            $getData = mysqli_fetch_assoc($result);

            if ($id == $getData['id']){
               
            }else{
               $msg = "Categories already exist!";
            }

         }else{
            $msg = "Categories already exist!";
         }

      }


      if ($msg == ''){

         if (isset( $_GET['id']) && $_GET['id']!='' ){
            mysqli_query($con, "update categories set categories='$categories' where id='$id' ");
         }else{
         mysqli_query($con, "insert into categories(categories, status) values('$categories','1' )");
         }

         header('location:categories.php'); // Redirect 
         die();
      }

   }


?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Categories Form</strong> </div>
                        <form action="" method='POST'>
                           <div class="card-body card-block">
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Categories</label>
                                 <input type="text" id="categories" required name='categories' placeholder="Enter categories name" class="form-control" value=" <?php echo $categories ?> ">
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
