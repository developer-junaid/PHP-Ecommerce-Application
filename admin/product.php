<?php
   require('header.inc.php');
   
   // Get Status data from categories
   if (isset ($_GET['type']) && $_GET['type']!='' ){
       $type = get_safe_value($con, $_GET['type']);
       
       // If Status is provided
       if ($type == 'status'){
        $id = get_safe_value($con, $_GET['id']);
        $operation = get_safe_value($con, $_GET['operation']);

        // If it is active
        if ($operation == 'active'){
            $status = '1';
        }else{
            $status = '0';
        }


        $update_status_sql = "update product set status='$status' where id='$id' ";
        mysqli_query($con, $update_status_sql);
       }

       // If Delete is provided
       if ($type == 'delete'){
         $id = get_safe_value($con, $_GET['id']);
         $delete_sql = "delete from product where id='$id' ";
         mysqli_query($con, $delete_sql);
        }
   }
   
   // FETCH Categories Data from Database
   $query = "select product.*, categories.categories from product, categories where product.categories_id=categories.id order by product.id desc";
   $result= mysqli_query($con, $query);

   
?>

   <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products </h4>
                           <h4 class="box-title" style='font-size:15px;'> <a style='color: black; text-decoration: underline;' href="manage_product.php">Add Product</a>  </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>Name</th>
                                       <th>Image</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th></th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php 
                                     $i = 1;
                                     while($row = mysqli_fetch_assoc($result)){ ?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['categories'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['image'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><?php echo $row['qty'] ?></td>

                                            <td><?php 
                                            if ($row['status'] == 1){
                                                echo "<span class='badge badge-complete'> <a style='color: white;' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                            }else{
                                                echo "<span class='badge badge-pending'> <a style='color: white;' href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                            }
                                            echo "<span class='badge badge-edit'> <a style='color: white;' href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                                            echo "<span class='badge badge-delete'> <a style='color: white;' href='?type=delete&id=".$row['id']."'>Delete</a></span>";

                                        ?></td>
                                        </tr>
                                    <?php 
                                    $i++;
                                }  ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
<?php
   require('footer.inc.php');
?>
