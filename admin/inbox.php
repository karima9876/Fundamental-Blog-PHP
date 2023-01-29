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
              <h2>Inbox</h2>
<?php 
include 'config.php';
if(isset($_GET['seenid'])){
$seenid=$_GET['seenid'];  
$query="UPDATE contact SET status='1' WHERE id='$seenid'";
$result1=mysqli_query($conn,$query);
if($result1){
echo "<span class='success'>Message sent in the seenboxsuccessfull.</span>";
}else{

echo "<span class='error'>Something went wrong.</span>";
}
}
?>
                <div class="block"> 
                	  <?php
include 'config.php';
$query="SELECT * FROM contact WHERE status='0' ORDER BY id DESC";
$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);
if($count>0){


?>      


                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
              <th>Name</th>
              <th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
$i=1;
while ($row = mysqli_fetch_assoc($result)) { 
?>
						<tr class="odd gradeX">
							<td><?php echo $i++ ?></td>
                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['body'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td>
                    <a href="viewmsg.php?msgid=<?php echo $row['id']; ?>">View</a> ||
                    <a href="replymsg.php?msgid=<?php echo $row['id']; ?>">Reply</a> ||
                    <a onclick="return confirm('Are You Sure to move!')" href="?seenid=<?php echo $row['id']; ?>">Seen</a> ||
                     </td>
							 
						</tr>
						 <?php   } ?>
					</tbody>
					 <?php   } ?>
				</table>
				
				</div>
            </div>
            <div class="box round first grid">
                <h2>Seen Message</h2>
                <?php 
include 'config.php';
if(isset($_GET['delid'])){
$delid=$_GET['delid'];  
$query="DELETE FROM contact WHERE id='$delid'";
$result1=mysqli_query($conn,$query);
if($result1){
echo "<span class='success'>Message DELETE successfull.</span>";
}else{

echo "<span class='error'>Something went wrong.</span>";
}
}
?>
                <div class="block"> 
                    

<table class="data display datatable" id="example">
          <thead>
            <tr>
              <th>Serial No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Message</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
include 'config.php';
$query="SELECT * FROM contact WHERE status='1' ORDER BY id DESC";
$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);
if($count>0){

$i=1;
while ($row = mysqli_fetch_assoc($result)) { 
?>
            <tr class="odd gradeX">
              <td><?php echo $i++ ?></td>
                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['body'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td>
                    <a onclick="return confirm('Are You Sure?')" href="?delid=<?php echo $row['id']; ?>">Delete</a> ||
                     </td>
               
            </tr>
             <?php   } ?>
          </tbody>
           <?php   } ?>
        </table>
        
        
        </div>
            </div>





        </div>
               <?php  include "footer.php";?>