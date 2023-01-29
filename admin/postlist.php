

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
                <h2>Post List</h2>
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

if($_SESSION['role'] == '1') {
  $query="SELECT post.post_id,post.title,post.description,post.post_img,post.post_date,post.category,category.category_name,users.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN users ON post.author = users.user_id
ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

   
       }elseif ($_SESSION['role'] == '0') {
        $query="SELECT post.post_id,post.title,post.description,post.post_img,post.post_date,post.category,category.category_name,users.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN users ON post.author = users.user_id
WHERE post.author = {$_SESSION['user_id']}
ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
         }
       $result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);

if($count>0){


?>
                  
            <table class="data display datatable" id="example">
					<thead>
						<tr>
              <th>S.No.</th>
							<th>Post Title</th>
              <th>Description</th>
							<th>Category</th>
							<th>Date</th>
							<th>Author</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
$i=1;
while ($row = mysqli_fetch_assoc($result)) { 
?>
						<tr class="odd gradeX">
							                 
                              <td class='id'><?php echo $i++ ?></td>
                              <td><?php echo $row['title'] ?></td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['category_name'] ?></td>
                              <td><?php echo $row['post_date'] ?></td>
                              <td><?php echo $row['username'] ?></td>
                               <td><img height="50" src="upload/<?php echo $row['post_img'] ?>"></td>
                               <td><a href="update-post.php?id=<?php echo $row['post_id']; ?>">Edit</a> || <a onclick="return confirm('Are You Sure?')"href='delete-post.php?id=<?php echo $row['post_id'] ?>&catid=<?php echo $row['post_id'] ?>'>Delete</a></td>


                              
						</tr>
						 <?php } ?>
						
					</tbody>
					 <?php } ?>
					 
				</table>
        <?php 
                  include 'config.php';
                  $query2="SELECT * FROM post";
                  $result2=mysqli_query($conn,$query2) or dir("Query failed.");
                  if(mysqli_num_rows($result2)){
                    $total_records=mysqli_num_rows($result2);
                    $total_page=ceil($total_records/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page_number>1){
                      echo '<li><a href="postlist.php?page='.($page_number-1).'">prev</a></li>';
                    }
                    
                    for ($i=1; $i <=$total_page ; $i++) { 

                      if($i == $page_number){
                        $active="active";
                      }else{
                        $active="";
                      }
                      echo '<li class='.$active.'><a href="postlist.php?page='.$i.'">'.$i.'</a></li>';
                      # code...
                    }
                    if($total_page>$page_number){
                    echo '<li><a href="postlist.php?page='.($page_number+1).'">next</a></li>';
                    echo "</ul>";
                  }
                }



                   ?>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <div id="site_info">
      <p>
         &copy; <?php echo date("Y");?> Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
	   
</body>
</html>
