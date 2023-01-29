
<?php
include "header.php";?>

  <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>All Users</h2>
                <div class="block"> 
                     <?php
include 'config.php';
$limit=3;
if(isset($_GET['page'])){
$page_number=$_GET['page'];
}else{
  $page_number=1;
}
$offset=($page_number-1) * $limit;
$query="SELECT * FROM users ORDER BY user_id DESC LIMIT {$offset},{$limit}";
$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);
if($count>0){


?>
      
                    <table class="data display datatable">
                    <thead>
						<tr>
              <th>S.No.</th>
							<th>DB ID.</th>
							<th>FULL Name</th>
              <th>USER Name</th>
              <th>ROLE</th>
							<th>Action</th>
						</tr>
                        </thead>
                         <tbody>
                        <?php 
                $i=1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                
                   
                    <tr class="even gradeC">
                    <td class='id'><?php echo $i++ ?></td>
                    <td class='id'><?php echo $row['user_id'] ?></td>
                    <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                      <?php
if($row['role']==1){
echo "Admin";
}else{
echo "Moderator";
}
?> 
                      

                    </td>
                    <td><a href="useredit.php?id=<?php echo $row['user_id']; ?>">Edit</a> || <a onclick="return confirm('Are You Sure?')"href='delete-user.php?id=<?php echo $row['user_id']; ?>'>Delete</a></td>
                  
                  </tr>
                
                <?php  } ?>
                  </tbody>
                  <?php } ?>
				</table>
                <?php 
                  include 'config.php';
                  $query2="SELECT * FROM users";
                  $result2=mysqli_query($conn,$query2) or dir("Query failed.");
                  if(mysqli_num_rows($result2)){
                    $total_records=mysqli_num_rows($result2);
                    $total_page=ceil($total_records/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page_number>1){
                      echo '<li><a href="userlist.php?page='.($page_number-1).'">prev</a></li>';
                    }
                    
                    for ($i=1; $i <=$total_page ; $i++) { 

                      if($i == $page_number){
                        $active="active";
                      }else{
                        $active="";
                      }
                      echo '<li class='.$active.'><a href="userlist.php?page='.$i.'">'.$i.'</a></li>';
                      # code...
                    }
                    if($total_page>$page_number){
                    echo '<li><a href="userlist.php?page='.($page_number+1).'">next</a></li>';
                    echo "</ul>";
                  }
                }



                   ?>




        </div>
            </div>
        </div>
            <?php  include "footer.php";?>