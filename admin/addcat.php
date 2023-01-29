<?php 
if(isset($_POST['submit'])){
include 'config.php';

$category_name=mysqli_real_escape_string($conn,$_POST['category_name']);
$query="SELECT category_name FROM category WHERE category_name='$category_name'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0){
echo "category already exists.";
}else{
$query1="INSERT INTO category (category_name)
VALUE ('$category_name')";
$result=mysqli_query($conn,$query1);
if($result){
   header ('location:catlist.php');
}
}
}
?>

<?php  include "header.php"; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 




                 <form action="addcat.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name=category_name placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                        
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
            </div>
        </div>
                <?php  include "footer.php";?>