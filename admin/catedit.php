<?php
if(isset($_POST['submit'])){
  include "config.php";


//print_r($_POST['submit']);
$category_id=mysqli_real_escape_string($conn,$_POST['category_id']);
$category_name=mysqli_real_escape_string($conn,$_POST['category_name']);

$query1="UPDATE category SET 

category_name='{$category_name}'
 WHERE category_id ='{$category_id}'";
$result1=mysqli_query($conn,$query1) or die("Query failed.");
if($result1){
  header("location:catlist.php");
}


}
?>

<?php  include "header.php";?>




      
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <?php

$category_id=$_GET['id'];
include 'config.php';
$query="SELECT * FROM category WHERE category_id={$category_id}";
$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);
if($count>0){
while ($row = mysqli_fetch_assoc($result)) { 

 ?>
    
                 <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<?php if(!empty($row['category_id'])) echo $row['category_id']?>">

                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="category_name" value="<?php if(!empty($row['category_name']))echo $row['category_name']?>" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                     <?php
                }
              }
                  ?>
                    </div>
            </div>
        </div>
                <?php  include "footer.php";?>