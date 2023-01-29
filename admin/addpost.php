<?php  include "header.php";?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="save-post.php" method="POST" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="post_title" placeholder="Enter Post Title..." class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="postdesc" class="tinymce" rows="5" required></textarea>
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
                                    $conn=mysqli_connect("localhost","root","","lifeproject");
                                    $query="SELECT * FRoM category";
                                    $result=mysqli_query($conn,$query);
                                    if(mysqli_num_rows($result)>0){

                                        while($row=mysqli_fetch_assoc($result)){
                                            echo "<option Value='{$row['category_id']}'> {$row['category_name']}
                                            </option>";
                                        }
                                    }

                ?>
                                           
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="fileToUpload" required/>
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
                    </div>
            </div>
        </div>
                <?php  include "footer.php";?>