<?php  include "header.php";?>
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
                <h2>Category List</h2>
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
$query="SELECT * FROM category ORDER BY category_id DESC LIMIT {$offset},{$limit}";
$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);
if($count>0){


?>      
                    <table class="data display datatable">
                    <thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
              <th>No. of Posts</th>
                        
							<th>Action</th>
						</tr>
                        </thead>

                        <tbody>
                
	
                        <?php
$i=1;
while ($row = mysqli_fetch_assoc($result)) { 
?>
                
                    <tr class="even gradeC">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['post'] ?></td>
                
                    <td><a href="catedit.php?id=<?php echo $row['category_id']; ?>">Edit</a> || <a onclick="return confirm('Are You Sure?')"href='delete-category.php?id=<?php echo $row['category_id']; ?>'>Delete</a></td>
                    
                  </tr>
                <?php   } ?>
            
					</tbody>
                     <?php   } ?>
				</table>
                <?php 
                  include 'config.php';
                  $query2="SELECT * FROM category";
                  $result2=mysqli_query($conn,$query2) or dir("Query failed.");
                  if(mysqli_num_rows($result2)){
                    $total_records=mysqli_num_rows($result2);
                    $total_page=ceil($total_records/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page_number>1){
                      echo '<li><a href="catlist.php?page='.($page_number-1).'">prev</a></li>';
                    }
                    
                    for ($i=1; $i <=$total_page ; $i++) { 

                      if($i == $page_number){
                        $active="active";
                      }else{
                        $active="";
                      }
                      echo '<li class='.$active.'><a href="catlist.php?page='.$i.'">'.$i.'</a></li>';
                      # code...
                    }
                    if($total_page>$page_number){
                    echo '<li><a href="catlist.php?page='.($page_number+1).'">next</a></li>';
                    echo "</ul>";
                  }
                }



                   ?>





                
                </div>
            </div>
        </div>
               <?php  include "footer.php";?>