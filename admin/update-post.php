<?php  include "header.php";?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Post</h2>
                <div class="block">
        <!-- Form for show edit-->
<?php
include "config.php";

$post_id = $_GET['id'];
//print_r($post_id);


$query="SELECT post.post_id, post.title, post.description, post.post_img, post.category,
category.category_name FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN users ON post.author = users.user_id
WHERE post.post_id = {$post_id}";
//print_r($query);
$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);

if($count>0){
while ($row = mysqli_fetch_assoc($result)) {



?>
<form action="save-update-post.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>" placeholder="">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="post_title" value="<?php echo $row['title']; ?>" placeholder="Enter Post Title..." class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="postdesc" class="tinymce" rows="5" required><?php echo $row['description'];?></textarea>
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="category" required>
                                    <option disabled selected> Select Category</option>
             <?php 
                                    include 'config.php';
                                    $query1="SELECT * FROM category";
                                    $result1=mysqli_query($conn,$query1);
                                    if(mysqli_num_rows($result1)>0){

                                        while($row1=mysqli_fetch_assoc($result1)){
                                            if($row['category']==$row1['category_id']){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            echo "<option {$selected} Value='{$row1['category_id']}'> {$row1['category_name']}
                                            </option>";
                                        }
                                    }

                ?>            
                                </select>
                                 <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['post_img']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }
    
}else{
    echo "Result not found";
}


        ?>
                    </div>
            </div>
        </div>
                <?php  include "footer.php";?>





        