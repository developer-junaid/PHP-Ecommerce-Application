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


        $update_status = "update categories set status='$status' where id='$id' ";
        mysqli_query($con, $update_status);
       }
   }
   
   // FETCH Categories Data from Database
   $query = "select * from categories order by categories asc";
   $result= mysqli_query($con, $query);

   
?>

   <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>Status</th>
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
                                            <td><?php 
                                            if ($row['status'] == 1){
                                                echo "<a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a>";
                                            }else{
                                                echo "<a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a>";
                                            }
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
