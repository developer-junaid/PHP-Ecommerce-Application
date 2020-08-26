<?php
   require('header.inc.php');
   
   // Get Status data from categories
   if (isset ($_GET['type']) && $_GET['type']!='' ){
       $type = get_safe_value($con, $_GET['type']);
       
       
       // If Delete is provided
       if ($type == 'delete'){
         $id = get_safe_value($con, $_GET['id']);
         $delete_sql = "delete from contact_us where id='$id' ";
         mysqli_query($con, $delete_sql);
        }
   }
   
   // FETCH Categories Data from Database
   $query = "select * from contact_us order by id desc";
   $result= mysqli_query($con, $query);

   
?>

   <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Contact Us </h4>
                         </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Query</th>
                                       <th>Date</th>
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
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['mobile'] ?></td>
                                            <td><?php echo $row['comment'] ?></td>
                                            <td><?php echo $row['added_on'] ?></td>

                                            <td><?php 
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
